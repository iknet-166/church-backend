<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Create a New Post</h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form method="POST" action="/create-post">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-medium">Title</label>
                        <input type="text" name="title" id="title" required
                               class="w-full px-4 py-2 border rounded mt-1 focus:ring focus:border-blue-400">
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-medium">Content</label>
                        <textarea name="content" id="content" rows="5" required
                                  class="w-full px-4 py-2 border rounded mt-1 focus:ring focus:border-blue-400"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
