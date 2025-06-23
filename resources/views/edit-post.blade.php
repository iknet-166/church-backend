<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Edit Post
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 p-4 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/edit-post/{{ $post->id }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-medium">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                               class="w-full px-4 py-2 border rounded mt-1 focus:ring focus:border-blue-400" required>
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-medium">Content</label>
                        <textarea name="content" id="content" rows="5" required
                                  class="w-full px-4 py-2 border rounded mt-1 focus:ring focus:border-blue-400">{{ old('content', $post->content) }}</textarea>
                    </div>

                    <div class="flex justify-between">
                        <a href="/posts-view" class="text-gray-600 hover:underline">← Back to Posts</a>
                        <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                            Update Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
