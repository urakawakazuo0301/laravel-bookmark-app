<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $bookmark->title }}
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

                    <div class="mb-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">タイトル</h3>
                            <p class="mt-1 text-lg text-gray-900">{{ $bookmark->title }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">タグ</h3>
                            @foreach ($bookmark->tags as $tag)
                                {{ $tag->name }}
                            @endforeach
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">URL</h3>
                            <a href="{{ $bookmark->url }}" target="_blank" rel="noopener noreferrer" class="text-indigo-600 hover:underline">
                                {{ $bookmark->url }}
                            </a>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">備考</h3>
                            <p class="mt-1 text-gray-900 whitespace-pre-wrap">{{ $bookmark->description }}</p>
                        </div>

                        <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                            <a href="{{ route('bookmarks.edit', $bookmark) }}"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">
                                編集
                            </a>
                            <form action="{{ route('bookmarks.destroy', $bookmark) }}" method="post"
                                onsubmit="return confirm('削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <x-danger-button>削除</x-danger-button>
                            </form>
                            <a href="{{ route('bookmarks.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                                一覧へ戻る
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>