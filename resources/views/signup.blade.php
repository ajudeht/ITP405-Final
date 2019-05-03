@extends('layout')

@section('title', 'Sign Up')

@section('main')

<div class="modal__overlay">
  <div class="modal__container" role="dialog" aria-modal="true">
  <h1>Sign Up</h1>
  <p>Already have an account? Please <a href="/login">Login</a></p>
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="name">Username</label>
      <input type="text" id="name" name="name" class="form-control">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" class="form-control">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>
    @isset($messages)
      <ul class="login-errors">
        @foreach ($messages as $message)
            <li>{{array_values((array)$message)[0]}}</li>
        @endforeach
      </ul>
    @endisset
    <input type="submit" value="Sign Up" class="button submit">
  </form>

  </div>
</div>
@endsection
