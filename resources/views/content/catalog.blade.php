@extends('../base')

@section('title', 'Catalog')

@section('content')
<h1>Каталог заданий</h1>
<div class="dropdown" style="margin: 15px 0px 20px">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Users
      </button>
      <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="/">Все</a></li>
      @foreach ($users as $user)
        <li><a class="dropdown-item" href="/?user_id={{ $user->id }}">{{$user->name}}</a></li>
      @endforeach  
      </ul>
</div>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@foreach ($tasks as $task)
    <div class="col">
<div class="card" style="margin:30px 0px;min-width:300px;">
    <div class="card-body" >
        <h4 class="card-title" >{{$task->name}}</h4>
        <p class="card-text" >
            <ul>
                <li>Статус: {{$task->status}}</li>
            </ul>
        </p>
        <a href="{{ route('task.show', $task->id) }}" class="btn btn-outline-primary">Задание</a>
    </div>
</div>
    </div>
@endforeach
</div>
@endsection