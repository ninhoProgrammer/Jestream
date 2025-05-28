<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
        <div class="mb-4">
            @foreach ($post->tags as $tag)
                <span class="inline-block px-3 h-6 bg-{{ $tag->color }}-600 text-white rounded-full">{{ $tag->name }}</span>
            @endforeach
        </div>
        <div class="mb-4 text-gray-700">
            {{ $post->extract }}
        </div>
        <div class="prose">
            {!! $post->body !!}
        </div>
    </div>
</x-app-layout>