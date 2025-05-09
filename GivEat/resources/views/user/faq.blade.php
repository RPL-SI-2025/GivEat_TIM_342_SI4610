<x-app-layout>
    <x-slot name="title">FAQ</x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section with Icon -->
            <div class="text-center mb-8">
                <div class="inline-block p-4 bg-[#00843D]/10 rounded-full mb-4">
                    <svg class="w-10 h-10 text-[#00843D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-[#1A1A1A] mb-2">Frequently Asked Questions</h2>
                <p class="text-gray-600">Find answers to common questions about GivEat</p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach ($faqs as $faq)
                            <div class="border border-gray-200 rounded-lg overflow-hidden hover:border-[#00843D]/30 transition-colors duration-300">
                                <details class="group">
                                    <summary class="flex items-center justify-between px-6 py-4 cursor-pointer bg-white hover:bg-[#00843D]/5 transition-all duration-300">
                                        <h3 class="text-lg font-medium text-[#1A1A1A] group-open:text-[#00843D] transition-colors duration-300">
                                            {{ $faq->question }}
                                        </h3>
                                        <span class="ml-6 flex-shrink-0">
                                            <svg class="w-5 h-5 text-gray-500 group-open:text-[#00843D] transition-all duration-300" 
                                                fill="none" 
                                                viewBox="0 0 24 24" 
                                                stroke="currentColor">
                                                <path stroke-linecap="round" 
                                                    stroke-linejoin="round" 
                                                    stroke-width="2" 
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                    </summary>
                                    <div class="overflow-hidden transition-all duration-300">
                                        <div class="px-6 py-4 bg-[#00843D]/5">
                                            <div class="prose max-w-none text-gray-600">
                                                {!! nl2br(e($faq->answer)) !!}
                                            </div>
                                        </div>
                                    </div>
                                </details>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        details > summary {
            list-style: none;
        }
        details > summary::-webkit-details-marker {
            display: none;
        }
        details[open] > summary svg {
            transform: rotate(180deg);
        }
        .group-open\:text-primary[open] > summary h3 {
            color: #00843D;
        }
        .group-open\:text-primary[open] > summary svg {
            color: #00843D;
        }
        
        /* Animation styles remain the same */
    </style>
</x-app-layout>
