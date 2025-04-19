<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        Faq::create($request->all());
        return redirect()->route('admin.faq.index')->with('success', 'FAQ created successfully');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        // Log data before update
        \Log::info('Updating FAQ:', $faq->toArray());

        // Update FAQ
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save(); // Use save() instead of update()

        // Log data after update
        \Log::info('Updated FAQ:', $faq->toArray());

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        // Log data before delete
        \Log::info('Deleting FAQ with ID:', [$faq->id]);

        $faq->delete();

        // Log data after delete
        \Log::info('Deleted FAQ with ID:', [$faq->id]);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
