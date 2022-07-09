@extends('layouts.app')

@section('content')

<section id="user-update">
    <h2>ユーザー情報の更新</h2>
    <form action="{{ route('email.update') }}" method="POST">
    @csrf
    <input class="email-form" placeholder="メールアドレス" type="email" name="email" required>

    @error('email')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

    <button class="login-btn" type="submit">メールアドレス更新</button>
    </form>

    <form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input class="password-form" placeholder="パスワード" type="password" name="newPassword" required>

    @error('password')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
    
    <input class="verify-form" placeholder="確認のため、旧パスワードを入力" type="password" name="oldPassword" required>

    @error('password')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

    <button class="login-btn" type="submit">パスワード更新</button>
    </form>
</section>
@endsection
