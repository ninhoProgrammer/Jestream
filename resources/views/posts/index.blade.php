<x-app-layout>

	<div class="flex justify-center items-center py-8">
        <div class="grid grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image6) '{{Storage::url($post->image->url)}}' @else '{{ asset('XD.jpg') }}' @endif);"
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.tag', $tag) }}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                                {{ $post->title }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>
	</div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</x-app-layout>