<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新規ブックマーク
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="mb-4 text-sm text-red-700 bg-red-50 border border-red-200 rounded-md p-3">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('bookmarks.store') }}" method="post" class="space-y-6">
                        @csrf
                        
                        <div>
                            <x-input-label for="title" value="タイトル" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                        :value="old('title')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="url" value="URL" />
                            <x-text-input id="url" name="url" type="text" class="mt-1 block w-full"
                                        :value="old('url')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('url')" />
                        </div>

                        <div>
                            <x-input-label for="description" value="備考" />
                            <textarea id="description" name="description" rows="5"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>保存</x-primary-button>
                            <a href="{{ route('bookmarks.index') }}" class="text-sm text-gray-600 hover:text-gray-900">一覧へ戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>