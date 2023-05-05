@extends('../base')

@section('title', 'login')

@section('content')
<x-errors />
<form method="post" action="/login">
    @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection