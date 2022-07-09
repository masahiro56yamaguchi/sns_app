@extends('layouts.app')

@section('content')

<section id="shares">

    <div class="post-wrapper">

        <h2>{{ $share->user->name }}</h2>
        <p class="updated_at">公開日:{{ $share['updated_at']; }} </p>

        <div class="post">

            <img class="restaurant-img" src="{{ Storage::url($share['img']) }}">

            <div class="post-info">
                <p class="store-name">{{ $share['store_name']; }} </p>
                <p class="dish-name">{{ $share['dish_name']; }} </p>
                <p class="review">{{ $share['content']; }} </p>
            </div>
        </div>

    </div>
    
    <form action="{{ route('comments.post') }}" method="POST">
    @csrf
        <div class="comment-wrapper">
            <textarea class="comment-form" name="comment" required maxlength="200"></textarea>

            <button class="comment-btn" type="submit">
                <a>コメント</a>
                <input type="hidden" name="postId" value="{{ $share->id }}">
            </button>
         </div>
    </form>

    {{-- コメントゾーン --}}
    @foreach ($comments as $comment)
    @if ($comment['post_id'] == $share->id)

        <p class="comment-text">{{ $comment['comment']}}</p>

    @endif
    @endforeach

</section>
@endsection