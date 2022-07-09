@extends('layouts.app')
@section('content')
<section id="post">
    <div>
        <form action="{{ route('shares.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <input class="store-form" type="text" name="store_name" placeholder="店名" required>
            <input class="dish-form" type="text" name="dish_name" placeholder="料理名"  required>

            <img id="restaurant-img" >
            <input id="image" type="file" name="image">
            
            <textarea class="body-form" name="body" placeholder="レビューを入力" required maxlength="200" ></textarea>
            <div class="btn">
                <a class="cancel-btn">キャンセル</a>
                <button type="submit" class="post-btn">共有する</button>
            </div>
        </form>
    </div>
</section>
@endsection