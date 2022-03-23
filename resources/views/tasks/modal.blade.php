<div class="modal fade" id="add_task" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
        <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Name</label>
    
                    <div class="col-sm-12">
                        <input type="text" name="name" id="task-name" class="form-control" placeholder="Add Task Name" required />
                    </div>
                    <label for="user" class="col-sm-3 control-label">User</label>
                    <div class="col-sm-12">
                        <select name="user" class="form-control bg-white"  placeholder="Select User" required >
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <label for="deadline" class="col-sm-3 control-label">Deadline</label>
                    <div class="col-sm-12">
                    <input type="text" name="deadline" class="form-control bg-white" id="datetime" placeholder="Choose Date and Time" required />
                    </div>
                    <input type="hidden" name="timezone">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>