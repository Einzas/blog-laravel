@props(['post'])

<article class="mb-8 bg-gray-200 shadow-2xl overflow-auto rounded-lg ">

    @if ($post->image)
        <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
    @else    
        <img class="w-full h-72 object-center object-fit" src="https://wallpaperaccess.com/full/3595398.jpg" alt="">
    @endif
    
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl text-gray-600 mb-2 ">
            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {!! $post->extract !!}
        </div>
    </div> 
    <div class="px-6 pt-4 pb-2">
        @foreach($post->tags as $tag)
            <a href="{{route('posts.tag',$tag)}}" class="inline-block bg-gray-400 rounded-full px-2 text-sm text-gray-700 mr-2">{{$tag->name}}</a>
        @endforeach
    </div>

</article>   