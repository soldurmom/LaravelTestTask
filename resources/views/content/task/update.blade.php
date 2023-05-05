@extends('../base')

@section('title', 'Update task')

@section('content')
<x-errors />
<form method="post" action="{{ route('task.update', $task->id) }}">
    @csrf
    @method('put')
    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$task->name}}">
    </div>
    <div class="mb-3">
    <label for="user_id">User</label>
    <select class="form-control" id="user_id" name="user_id" value="{{$task->user_id}}">
        <option value="">-</option>
        @foreach ($users as $user)
            @if ($user->id == $task->user_id)
                <option value="{{$user->id}}" selected>{{$user->name}}</option>
            @else
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
        @endforeach
    </select>
    </div>
    <div class="mb-3">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status" default="{{$task->status}}">
        <option value="">-</option>
        <option>срочное</option>
        <option>не срочное</option>
        <option>на будущее</option>
    </select>
    </div>
    <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3">{{$task->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Изменить</button>
</form>
@endsection