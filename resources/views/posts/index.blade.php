@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                            placeholder="Enter a message"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded font-medium">Post</button>
                    </div>
                </form>
            @endauth

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="" class="font-bold">{{ $post->user->name }}</a>
                        <span class="text-gray-600 text-sm">
                            {{ $post->updated_at->diffForHumans() }}
                        </span>
                        <p class="mb-2">{{ $post->body }}</p>

                        <div class="flex items-center">
                            @if (!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post->id) }}" method="POST" class="mr-2">
                                    @csrf
                                    <button type="submit" class="text-gray-600">
                                        <i class="fas fa-thumbs-up"></i>
                                    </button>
                                    <span>{{ $post->likes->count() }}</span>
                                </form>
                            @else
                                <form action="" method="POST" class="mx-1">
                                    @csrf
                                    <button type="submit" class="text-gray-600">
                                        <i class="far fa-thumbs-down"></i>
                                    </button>
                                </form>
                            @endif
                        </div>

                    </div>
                @endforeach

                {{ $posts->links() }}
            @else
                <p>No posts.</p>
            @endif
        </div>


    </div>
@endsection
