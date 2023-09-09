<x-app-layout> 

    <div class="container  py-8">
        <h1 class='text-center uppercase font-bold mb-4 text-gray-200'> {{$tag->name}}</h1>
        <div class="grid grid-cols-2 gap-6">
            @foreach ($posts as $post )
                <x-card-post :post="$post" />
            @endforeach
        </div>

        <div class="mt-4">
            {{$posts->links()}} 
        </div>
    </div>
</x-app-layout>