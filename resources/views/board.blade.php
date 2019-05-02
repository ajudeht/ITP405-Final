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
@endsection
