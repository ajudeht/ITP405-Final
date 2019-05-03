@extends('layout')

@section('title', 'My Boards')

@section('main')
<div class="intro-bar">
  <div class="body-main">
    <div class="intro-header">
      <div style="padding-bottom: .75em;">Hey {{$user->name}}! All your task boards are saved here.</div>
      <div onclick="MicroModal.show('modal-1')" class="button primary outline">Create New Board</div>
    </div>
  </div>
</div>
<div class="body-main">
  <h1>My Boards</h1>
  <div class="board-holder">
  @forelse($boards as $board)
      <a href="./boards/{{$board->uuid}}/" class="board-card">
        <div class="board-card-inner">
          <div class="board-title">
            {{$board->title}}
          </div>
        </div>
      </a>
      @empty
      <h3>No Boards</h3>
    @endforelse
  </div>
  <h1>Shared Boards</h1>
  <div class="board-holder">
  @forelse($shares as $board)
      <a href="./boards/{{$board->uuid}}/" class="board-card">
        <div class="board-card-inner">
          <div class="board-title">
            {{$board->title}}
          </div>
        </div>
      </a>
      @empty
      <h3>No Shared Boards</h3>
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
@endsection
