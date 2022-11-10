@props([ 'post'=> $post])
<div class="mb-4">
    <a href="{{ route('users.posts' , $post->user) }}" class="font-bold">{{$post->user->name}}</a>
    <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()
                  }}</span>
    <p class="mb-2">{{ $post->body }}</p>

    @can('delete',$post)
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan


</div>

<div class="flex items-center">
    @auth

        <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>
        <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Unlike</button>
        </form>
    @endauth

    <span>{{ $post->likes->count() }} {{ Str::plural('like',$post->likes->count())}}</span>
</div>
