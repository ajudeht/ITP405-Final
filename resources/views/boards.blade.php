@extends('layout')

@section('title', 'My Boards')

@section('main')
<div class="intro-bar">
  <div class="body-main">
          <img style="display: block; width: 85%; padding-top: 10em; margin: 0px auto;" src="illust-3.png"/>
    <div class="intro-header">
      <h2 class="animated fadeInUp" style="padding-bottom: .75em;">Hey {{$user->name}}! All your task boards are saved here.</h2>
      <div onclick="MicroModal.show('modal-1')" class="button primary outline">Create New Board</div>
    </div>
  </div>
</div>
<div class="body-main">
        <span onclick="MicroModal.show('modal-1')" class="fab">add</span>
  <h2 class="lined">My Boards</h2>
  <div class="board-holder">
  @forelse($boards as $board)
      <a href="./boards/{{$board->uuid}}/" style="background-color: #{{substr($board->uuid, 0, 6)}}; background-blend-mode: multiply;" class="board-card">
        <div class="board-card-inner">
          <div class="board-title">
            {{$board->title}}
          </div>
        </div>
      </a>
      @empty

    @endforelse
    <div onclick="MicroModal.show('modal-1')" class="board-add-card">
      <div class="mi add-card-icon">
        add
      </div>
    </div>
  </div>
  <h2 class="lined">Shared Boards</h2>
  <div class="board-holder">
  @forelse($shares as $board)
      <a href="./boards/{{$board->uuid}}/" style="background-color: #{{substr($board->uuid, 0, 6)}}; background-blend-mode: multiply;" class="board-card">
        <div class="board-card-inner">
          <div class="board-title">
            {{$board->title}}
          </div>
        </div>
      </a>
      @empty
      <h3 style="text-align: center;
    flex-grow: 1;
    font-weight: 400;
    color: gray;">No Shared Boards</h3>
    @endforelse
  </div>
  <br />

</div>
<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
            Create New Board
          </h2>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="modal-1-content">
                  @include('create-board')
        </main>
      </div>
    </div>
  </div>
  <div class="app-footer">
    <div class="body-main">
      <h3 class="lined">Janice</h3>
      @if (Auth::check())
        <a style="color: grey;" href="/logout">Log Out</a>
      @else
        <!-- <a class="btn btn-light" href="/login">Login</a>
        <a class="btn btn-light" href="/signup">Sign Up</a> -->
      @endif
    </div>
  </div>
@endsection
