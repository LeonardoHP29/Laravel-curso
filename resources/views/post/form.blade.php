<div>
    <x-input-label for="title" :value="__('Title')"/>
    <x-text-input 
        id="title" 
        type="text" 
        name="title" 
        :value="old('title', $post->title)"
        class=" block w-full mt-1"
    />
    <x-input-error
        :messages="$errors->get('title')"
    />
</div>