<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($post->name) }}
        </h2>
    </x-slot>
    <!-- Your Blade template -->
    <div class="flex flex-col justify-between items-center gap-2 mt-6">
        <h1 class="text-gray-100 text-4xl ">{{ $post->name }}</h1>
        <p class="text-orange-400 text-2xl">{{ $post->text }}</p>
        <span class="w-[30%] text-[#6db28c]">{!! $post->description !!}</span>
        <div class="mt-[100px] flex flex-col gap-[30px] border-2 border-gray-700 rounded-2xl p-4">

            @foreach ($post->comment as $comment)
                <div>
                    <p class="text-white">{{ $comment->user->name }}</p>
                    <h1 class="text-blue-400 opacity-50">{{ $comment->text }}</h1>
                    @if (auth()->id() == $comment->user_id)
                        <div>
                            <div id="{{ $comment->id }}comment" class="hidden">
                                <form action="{{ route('comments.edit', ['comment' => $comment->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <x-text-input id="text" value="{{ $comment->text }}" name="text"
                                            type="text" class="mt-1 block w-full" />
                                    </div>
                                    <button type="submit"
                                        class='mt-1 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                                        Edit
                                    </button>
                                </form>
                            </div>
                            <button onclick="toggleDiv('{{ $comment->id }}comment')">Edit</button>
                        </div>
                        <form action="{{ route('comments.dstroy', ['comment' => $comment]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class='mt-1 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                                delete
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .hidden {
            display: none;
        }
    </style>
    <script>
        function toggleDiv(id) {
            var div = document.getElementById(id);
            if (div.style.display === "flex") {
                div.style.display = "none";
            } else {
                div.style.display = "flex";
            }
        }
    </script>

</x-app-layout>
