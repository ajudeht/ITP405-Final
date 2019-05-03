@extends('layout')

@section('title', $board->title)

@section('main')
<div class="intro-bar">
  <div class="body-full">
    <a style="height: 1.5em; display: block;" href="/" class="nostyle"><span class="mi back-arrow">arrow_back</span><span class="back-text">My Boards</span></a>
  </div>
</div>
<div class="head-bar">
  <div class="body-full">
    <span class="head-title">{{$board->title}}</span>
    <span onclick="MicroModal.show('modal-1')" class="button outline" style="font-weight: 700;
    font-family: Space Grotesk;
    font-size: .9em;
    margin-bottom: 0;">Add a Task</span>
    <a onclick="MicroModal.show('modal-2')" class="delete-board-button">delete</a>
    <span onclick="MicroModal.show('modal-3')" class="button blue" style="float:right; font-weight: 700;
    font-family: Space Grotesk;
    font-size: .9em;
    margin-bottom: 0;">Share</span>
  </div>
</div>
<div class="body-full">

  <div class="task-holder">
    <!-- <div class="task-column"> -->

    @forelse($tasks as $task)

      <div class="task-card">
        <div class="task-card-inner">
          <div class="task-title">
            {{$task->title}}
          </div>
          <form onchange="statusChange(event)" name="status">
            @csrf
            <input type="hidden" name="uuid" value="{{$task->uuid}}"/>
            <label class="container r">
              <input type="radio" value="0" {{($task->task_status == 0 ? "checked" : "")}} name="status_{{$task->uuid}}">
              <span class="checkmark"></span>
            </label>
            <label class="container y">
              <input type="radio" value="1" {{($task->task_status == 1 ? "checked" : "")}} name="status_{{$task->uuid}}">
              <span class="checkmark"></span>
            </label>
            <label class="container g">
              <input type="radio" value="2" {{($task->task_status == 2 ? "checked" : "")}} name="status_{{$task->uuid}}">
              <span class="checkmark"></span>
            </label>
          </form>
        </div>
        <div class="task-card-desc">
          {{$task->description}}
        </div>
      </div>

        @empty
        <h3>No Tasks</h3>
      @endforelse
      <!-- </div> -->
  </div>
</div>

<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
            Create New Task
          </h2>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="modal-1-content">
                  @include('create-task')
        </main>
      </div>
    </div>
  </div>
  <div class="modal micromodal-slide" id="modal-2" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
          <header class="modal__header">
            <h2 class="modal__title" id="modal-1-title">
              Delete Board
            </h2>
            <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
          </header>
          <main class="modal__content" id="modal-1-content">
              <h2 style="line-height: 1.2em; margin-bottom:1em;s">Are you sure you want to delete '{{$board->title}}'?</h1>
              <a href="/delete-board/{{$board->uuid}}" class="button blue" style="font-weight: 700;
              font-family: Space Grotesk;
              font-size: .9em;
              margin-bottom: 0; text-decoration:none;">Delete</a>
              <span data-micromodal-close class="button" style="font-weight: 700;
              font-family: Space Grotesk;
              font-size: .9em;
              margin-bottom: 0; text-decoration:none;">Cancel</span>
          </main>
        </div>
      </div>
    </div>
    <div class="modal micromodal-slide" id="modal-3" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
          <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
              <h2 class="modal__title" id="modal-1-title">
                Share Board
              </h2>
              <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-1-content">

              <form action="/share-board" method="post" >
                  @csrf
                    <input type="hidden" id="board_uuid" name="board_uuid" value={{$board->uuid}}>
                  <div class="form-group">
                    <label for="title">Share</label>
                    <input placeholder="example@example.com" type="email" id="email" name="email" class="form-control">
                    <p>
                      <b>Shared With: </b>
                      @forelse($shares as $share)
                          <span>{{$share->email}}, </span>
                          @empty
                          <span>Nobody</span>
                        @endforelse
                    </p>
                  </div>
                  <input type="submit" value="Share" class="button submit">
              </form>

            </main>
          </div>
        </div>
      </div>
@endsection
