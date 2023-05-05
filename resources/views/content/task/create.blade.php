@extends('../base')

@section('title', 'Create task')

@section('content')
<x-errors />
<form method="post" action="{{ route('task.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="mb-3">
    <label for="user">User</label>
    <select class="form-control" id="user" name="user_id">
        <option value="">-</option>
        @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">
        <option value="">-</option>
        <option>срочное</option>
        <option>не срочное</option>
        <option>на будущее</option>
    </select>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>
@endsection