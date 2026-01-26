<x-app-layout meta-title="Create New Post" meta-description="Form to Create a New Post">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new Post') }}
        </h2>
    </x-slot>
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <form action= "{{route('post.store')}}" 
                        method="POST"
                        class="space-y-4 max-w-xl"
                   >
                        @include('post.form')
                        <x-primary-button type="submit">{{__('Save')}}</x-primary-button>
                         @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>