<form action="/create-board" method="post" >
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <p>
        Give your board a name so you can find it later
      </p>
      <input placeholder="Board Title" type="text" id="title" name="title" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea placeholder="Describe your board's purpose..." rows=5 id="description" name="description" class="form-control"></textarea>
    </div>
    <input type="submit" value="Create" class="button submit">
</form>
