<x-app-layout>
 
<div class="container py-8">
    
    <h1 class="text-4xl font-bold text-gray-100">{{$post->name}}</h1>

    <div class="text-lg text-gray-100 mb-2">
        {!!$post->extract!!}
    </div>

    <div class="grid grid-cols-3 gap-6">

        <div class="col-span-2">
            <figure>
                @if ($post->image)
                    <img src="{{Storage::url($post->image->url)}}" class="w-full h-80 object-cover object-center">
                @else
                    <img src="https://wallpaperaccess.com/full/3595398.jpg" class="w-full h-80 object-cover object-center">
                    
                @endif
            </figure>

            <div class="text-base text-gray-100 mt-4">
                {!! $post->body !!}
            </div>  
        </div>
        
        <aside>
        <h1 class="text-2xl font-bold text-gray-100 mb-4">recomendados {{$post->category->name}}</h1>
            <ul>
                @foreach($similares as $similar)
                    <li class="mb-2">
                    
                        <a class="flex" href="{{route('posts.show',$similar)}}">
                            @if ($similar->image)
                                <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}">
                            @else
                                <img class="w-36 h-20 object-cover object-center" src="https://wallpaperaccess.com/full/3595398.jpg">
                                
                            @endif

                            <span class="text-gray-100 ml-2 ">{{$similar->name}}</span>
                        </a>    
                    </li>
                @endforeach    
            </ul>   
        </aside>
    </div>
</div>   
</x-app-layout>