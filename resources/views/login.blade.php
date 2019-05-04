@extends('layout')

@section('title', 'Login')

@section('main')
<div style="position: absolute; top: 0;
bottom: 0; width: 100%; background-image: url('/cross-xxl.png'); background-size: cover;">

</div>
<div class="modal__overlay">
  <div class="modal__container" role="dialog" aria-modal="true">
  <h1>Login</h1>
  <p>Don't have an account? Please <a href="/signup">Sign Up</a></p>
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" class="form-control">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>
    @isset($message)
      <ul class="login-errors">
        {{$message}}
      </ul>
    @endisset
    <input type="submit" value="Login" class="button submit">
  </form>
</div>
</div>
@endsection
