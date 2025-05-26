<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ForumTopic;
use App\Models\ForumComment;
use App\Models\ForumLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $topics = ForumTopic::with(['user', 'likes', 'comments'])
            ->withCount(['likes', 'comments'])
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('content', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('user.forum.index', compact('topics', 'search'));
    }


    public function show($id)
    {
        $topic = ForumTopic::with('comments.user')->findOrFail($id);
        return view('user.forum.show', compact('topic'));
    }

    public function create()
    {
        return view('user.forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        ForumTopic::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('forum.index')->with('success', 'Topik berhasil dibuat.');
    }

    public function edit($id)
    {
        $topic = ForumTopic::findOrFail($id);

        if (now()->diffInMinutes($topic->created_at) > 30) {
            return redirect()->route('forum.index')->with('error', 'Batas waktu untuk mengedit postingan telah lewat.');
        }

        return view('user.forum.edit', compact('topic'));
    }

    public function update(Request $request, $id)
    {
        $topic = ForumTopic::findOrFail($id);

        if (now()->diffInMinutes($topic->created_at) > 30) {
            return redirect()->route('forum.show', $topic->id)->with('error', 'Batas waktu untuk mengedit postingan telah lewat.');
        }

        $topic->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('forum.show', $topic->id)->with('success', 'Postingan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $topic = ForumTopic::findOrFail($id);

        if (now()->diffInMinutes($topic->created_at) > 30) {
            return redirect()->route('forum.index')->with('error', 'Batas waktu untuk menghapus postingan telah lewat.');
        }

        $topic->delete();

        return redirect()->route('forum.index')->with('success', 'Postingan berhasil dihapus!');
    }

    public function storeComment(Request $request, $topic_id)
    {
        $request->validate([
            'komentar' => 'required|string',
        ]);

        ForumComment::create([
            'forum_topic_id' => $topic_id, 
            'user_id' => Auth::id(),
            'komentar' => $request->komentar, 
        ]);

        return redirect()->route('forum.show', $topic_id)->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function editComment($id)
    {
        $comment = ForumComment::findOrFail($id);

        if ($comment->user_id != Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }

        if (Carbon::parse($comment->created_at)->diffInMinutes(now()) > 30 && !Auth::user()->is_admin) {
            return redirect()->route('forum.show', $comment->forum_topic_id)->with('error', 'Komentar hanya bisa diedit dalam 30 menit.');
        }

        return view('user.forum.comment-edit', compact('comment'));
    }

    public function updateComment(Request $request, $id)
    {
        $comment = ForumComment::findOrFail($id);

        // Validasi kepemilikan dan waktu edit
        if ($comment->user_id != Auth::id()) {
            abort(403);
        }

        if ($comment->created_at->diffInMinutes(now()) > 30) {
            return response()->json([
                'success' => false,
                'message' => 'Waktu edit sudah habis'
            ], 403);
        }

        $request->validate([
            'komentar' => 'required|string'
        ]);

        $comment->update([
            'komentar' => $request->komentar
        ]);

        return response()->json([
            'success' => true,
            'komentar' => $comment->komentar
        ]);
    }

    public function destroyComment($id)
    {
        $comment = ForumComment::findOrFail($id);

        if ($comment->user_id != Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }

        if (Carbon::parse($comment->created_at)->diffInMinutes(now()) > 30 && !Auth::user()->is_admin) {
            return redirect()->route('forum.show', $comment->forum_topic_id)->with('error', 'Komentar hanya bisa dihapus dalam 30 menit.');
        }

        $topic_id = $comment->forum_topic_id;
        $comment->delete();

        return redirect()->route('forum.show', $topic_id)->with('success', 'Komentar berhasil dihapus.');
    }

    public function like(Request $request, $topic_id)
    {
        $topic = ForumTopic::findOrFail($topic_id);
        $user = Auth::user();

        // Check if user already liked the topic
        $existingLike = $topic->likes()->where('user_id', $user->id)->first();

        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $message = 'Like dihapus';
            $liked = false;
        } else {
            // Like
            $topic->likes()->create(['user_id' => $user->id]);
            $message = 'Berhasil like';
            $liked = true;
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'likes_count' => $topic->likes()->count(),
                'liked' => $liked
            ]);
        }

        return back()->with('success', $message);
    }

    public function unlike(Request $request, $topic_id)
    {
        $topic = ForumTopic::findOrFail($topic_id);
        $user = Auth::user();

        $topic->likes()->where('user_id', $user->id)->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Like dihapus',
                'likes_count' => $topic->likes()->count()
            ]);
        }

        return back()->with('success', 'Like dihapus');
    }

    public function adminIndex()
    {
        $topics = ForumTopic::with('user')->latest()->paginate(10);
        return view('admin.forum.index', compact('topics'));
    }

    public function adminShow($id)
    {
        $topic = ForumTopic::with('comments.user')->findOrFail($id);
        return view('admin.forum.show', compact('topic'));
    }

    public function adminDestroy($id)
    {
        $topic = ForumTopic::findOrFail($id);
        $topic->delete();

        return redirect()->route('admin.forum.index')->with('success', 'Topik berhasil dihapus.');
    }

    public function adminDestroyComment($id)
    {
        $comment = ForumComment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Komentar berhasil dihapus.');
    }
    
}