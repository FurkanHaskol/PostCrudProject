<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Create') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('post.add') }}" class="mx-auto mt-6 space-y-6">
                        @csrf

                        <div class="flex items-center justify-center">
                            <div class="max-w-md w-full">
                                <div>
                                    <x-input-label for="post_title" :value="__('Post Title')" />
                                    <x-text-input required id="post_title" name="post_title" type="text" class="mt-1 block w-full"/>
                                    <x-input-error :messages="$errors->postTitle->get('post_title')" class="mt-2" />
                                    <span class="text-sm text-gray-600 dark:text-gray-400">max 150 char</span>
                                </div>

                                <div class="mt-6">
                                    <x-input-label for="post_description" :value="__('Post Description')" />
                                    <textarea required id="post_description" name="post_description" class="mt-1 block w-full resize-none border rounded-md"></textarea>
                                    <x-input-error :messages="$errors->postTitle->get('post_description')" class="mt-2" />
                                    <span class="text-sm text-gray-600 dark:text-gray-400">max 250 char</span>
                                </div>

                                <div class="mt-6">
                                    <x-input-label for="category" :value="__('Category')" />
                                    <select required id="category" name="category" class="mt-1 block w-full">
                                        <option value="" disabled selected>Please Select</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center justify-center mt-6">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </div>

                                @if (session('status') === 'post-saved')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400 mt-2"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
