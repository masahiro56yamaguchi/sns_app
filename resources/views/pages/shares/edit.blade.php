@extends('layouts.app')
@section('content')
<section id="edit">
    <div class="btn-wrapper">
        <p class="updated-at">更新時間</p>
        <div class="btn">
          <form  action="{{ route('shares.destroy', ['id' => $share->id]) }}" method="POST">
            @csrf
            <button type="submit" class="delete-btn">削除する</button>
          </form>
        </div>
    </div>
    <form  action="{{ route('shares.update', ['id' => $share->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input class="store-form" type="text" name="store_name" placeholder="店名" value={{ $share['store_name']; }} required>
      <input class="dish-form" type="text" name="dish_name" placeholder="料理名" value={{ $share['dish_name']; }} required>

      <img id="restaurant-img" src="{{ Storage::url($share['img']) }}">
      <input id="image" type="file" name="image">

      <textarea class="body-form" name="body" placeholder="レビューを入力" maxlength="200">{{ $share['content']; }}</textarea>
      <div class="btn">
          <a class="cancel-btn">キャンセル</a>
          <button type="submit" class="update-btn">更新する</button>
      </div>
    </form>
</section>
@endsection