<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts Create') }}
        </h2>
    </x-slot>
    <!-- Your Blade template -->
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Create Post') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Enjoy from create Usefull Post for society') }}
            </p>
        </header>

        <form method="post" action="{{ route('posts.store') }}" class="mt-6 space-y-6" method="Post">
            @csrf
            @method('POST')

            <div>
                <x-input-label :value="__('Post Name')" />
                <x-text-input id="text" name="name" type="text" class="mt-1 block w-full" />
                {{-- <x-input-error  :messages="$errors->updatePassword->get('current_password')" class="mt-2" /> --}}
            </div>
            <div>
                <x-input-label :value="__('Post text')" />
                <textarea cols="53" id='text' name='text'
                    oninput='this.style.height = "auto";this.style.height = this.scrollHeight + "px"'
                    class='border-gray-300 overflow-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'></textarea>
                {{-- <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" /> --}}
            </div>

            <div>
                <x-input-label :value="__('Post Description')" />
                <textarea cols="53" id='description' name='description'
                    oninput='this.style.height = "auto";this.style.height = this.scrollHeight + "px"'
                    class='border-gray-300 overflow-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'></textarea>
                {{-- <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" /> --}}
            </div>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </section>


</x-app-layout>
