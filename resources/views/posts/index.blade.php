<x-app-layout>
    
    {{-- Se establece la visualizacion de los post --}}
    <div class="container py-8 bg-gray-700">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if ($post->image){{Storage::url($post->image->url)}}@else https://wallpaperaccess.com/full/3595398.jpg @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        {{-- Muestra los tags --}}
                        <div class="">
                            @foreach ($post->tags as $tag)
                                <a href="{{route('posts.tag',$tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 bg-gray-600 text-white rounded-full">{{$tag->name}}</a>    
                            @endforeach
                        </div>
                        {{-- Muestra los nombre de los post --}}
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
    <div class="mt-4 text-white bg-gray-900 center">
        
            {{$posts->links()}}
    
    </div>
</x-app-layout>