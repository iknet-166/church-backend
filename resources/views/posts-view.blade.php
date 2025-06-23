<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            All Your Posts
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <a href="/create-post" class="inline-block mb-6 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                + Create New Post
            </a>

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="bg-white shadow rounded-lg p-6 mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h3>
                        <p class="text-gray-700 mt-2">{{ Str::limit($post->content, 150) }}</p>
                        <div class="text-sm text-gray-500 mt-4">
                            by {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}
                        </div>
                        <div class="mt-4 flex gap-4">
                            <a href="/edit-post/{{ $post->id }}" class="text-blue-600 hover:underline">Edit</a>
                            <form method="POST" action="/delete-post/{{ $post->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete this post?')">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center text-gray-500 mt-12">
                    <p class="text-lg">No posts found yet.</p>
                    <p><a href="/create-post" class="text-blue-600 hover:underline">Why not write your first one?</a></p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
