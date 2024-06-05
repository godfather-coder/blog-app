<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <!-- Your Blade template -->
    <div class="w-[70%] flex  flex-col gap-[15px]">
        <a class="text-[#99b485]" href="{{ route('posts.create') }}">Create post</a>
        @foreach ($posts as $post)
            <div class="justify-between flex w-100 border border-gray-300 rounded-lg p-4 bg-gray-800 text-white">
                <!-- Add text-white class here -->
                <div class="flex flex-col">
                    <a href="{{ route('posts.show', ['post' => $post]) }}"
                        class="text-xl font-semibold mb-2">{{ $post['text'] }}</a>
                    <p class="text-gray-600 mb-2 text-xl"> {{ $post['name'] }}</p>
                    <p>{{ $post['description'] }}</p>
                    <div>
                        <p>
                            @if (auth()->check())
                                @if (auth()->user()->likes->contains('id', $post->id))
                                    <form action="{{ route('posts.unlike', ['post' => $post]) }}" method="post">
                                        @csrf
                                        <button type="submit">Unlike {{ $post->likes_count }}</button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.like', ['post' => $post]) }}" method="post">
                                        @csrf
                                        <button type="submit">Like {{ $post->likes_count }}</button>
                                    </form>
                                @endif
                            @endif
                        </p>
                        <form action="{{ route('comments.create', ['post' => $post->id]) }}" method="POST">
                            @csrf
                            <div class="flex gap-[10px]">
                                <x-text-input id="text" name="text" class="mt-1 block w-full" />
                                <button
                                    class='mt-1 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                                    save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @if ($post->user_id == auth()->id())
                    <div class="flex gap-[10px]">
                        <a class=" h-[25px] rounded-[3px] transition duration-500 ease-in-out  hover:bg-[#4e214b] bg-[rgb(48,65,109)]"
                            href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button
                                class="w-[120%] rounded-[3px] transition duration-500 ease-in-out hover:bg-[red] bg-[rgb(32,85,53)]"
                                type="submit">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

</x-app-layout>
