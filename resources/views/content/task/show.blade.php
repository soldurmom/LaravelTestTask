@extends('../../base')

@section('title', $task->name)

@section('content')
<div class="p-2" style="width: 50rem;">
  <div class="card-body">
    <h3 class="card-title">{{ $task->name }}</h3>
    <p class="card-text">Пользователь: <a href="../../?user_id={{$task->user_id}}">{{ $task->user_id }}</a></p>
    <p class="card-text">Статус: {{ $task->status }}</p>
    <p class="card-text">Описание: {{ $task->description }}</p>
    <br>
    @auth
    <form method="post" action="{{ route('task.destroy', $task->id) }}">
      @csrf
      @method('delete')
      <button class="btn btn-warning" type="submit" class="btn btn-primary">Удалить</button>
    </form>
    <a class="btn btn-success" href="{{ route('task.view.update', $task->id) }}">Изменить</a>
    @endauth
  </div>
</div>
@endsection