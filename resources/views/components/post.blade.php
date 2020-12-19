@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
    <span class="text-gray-600 text-sm">
        {{ $post->updated_at->diffForHumans() }}
    </span>

    <p class="mb-2">{{ $post->body }}</p>


    <div class="flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-2">
                    @csrf
                    <button type="submit" class="text-gray-600">
                        <i class="fas fa-thumbs-up"></i>
                    </button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mx-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-gray-600">
                        <i class="far fa-thumbs-down"></i>
                    </button>
                </form>
            @endif
        @endauth
        <span>Likes: {{ $post->likes->count() }}</span>

    </div>

</div>