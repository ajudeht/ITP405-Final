<form action="/create-task" method="post" >
    @csrf
      <input type="hidden" id="board_uuid" name="board_uuid" value={{$board->uuid}}>
    <div class="form-group">
      <label for="title">Task</label>
      <p>
        Give your task a name so you can find it later
      </p>
      <input placeholder="Task Title" type="text" id="title" name="title" class="form-control">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea placeholder="Describe your task's purpose..." rows=5 id="description" name="description" class="form-control"></textarea>
    </div>
    <input type="submit" value="Add Task" class="button submit">
</form>
