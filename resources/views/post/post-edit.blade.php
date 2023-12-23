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
                    <div class="flex justify-between">
                    <form method="post" action="{{ route('post.update', ['id' => $post->id]) }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="post_title" :value="__('Post Title')" />
            <x-text-input required id="post_title" name="post_title" type="text" :value="$post->title ?? null" class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->postTitle->get('post_title')" class="mt-2" />
            <span class="text-sm text-gray-600 dark:text-gray-400">max 150 char</span>
        </div>

        <div>
            <x-input-label for="post_description" :value="__('Post Description')" />
            <x-text-input required id="post_description" name="post_description" type="text" :value="$post->description ?? null" class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->postTitle->get('post_description')" class="mt-2" />
            <span class="text-sm text-gray-600 dark:text-gray-400">max 250 char</span>
        </div>

        <div>
            <x-input-label for="category" :value="__('Category')" />
            <select required id="category" name="category" class="mt-1 block w-full">
            <option value="" disabled selected>Please Select</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($post->category_id == $category->id)selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('update') }}</x-primary-button>

            @if (session('status') === 'post-saved')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

