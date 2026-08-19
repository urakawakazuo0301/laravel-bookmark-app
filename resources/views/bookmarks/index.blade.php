<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ブックマーク一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 text-sm text-green-700 bg-green-50 border border-green-200 rounded-md p-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('bookmarks.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            新規作成
                        </a>
                    </div>

                    @forelse ($bookmarks as $bookmark)
                        <div class="border-b border-gray-200 py-3">
                            <a href="{{ route('bookmarks.show', $bookmark) }}" class="text-indigo-600 hover:underline font-medium">
                                {{ $bookmark->title }}
                            </a>
                            @foreach ($bookmark->tags as $tag)
                                {{ $tag->name }}
                            @endforeach
                            <p class="text-sm text-gray-500">{{ $bookmark->url }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">まだブックマークがありません。</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
