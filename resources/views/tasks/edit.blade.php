@extends('layouts.app')

@section('content')

<form action="../{{$task->id}}" method="POST">
	{{ csrf_field() }}

	{{ method_field('PUT') }}

	<input type="text" placeholder="Give your Task a Name..." value="{{$task->title}}" name="title" id="inputTitle" class="form-control" required="required">
	
	<button type="submit" class="btn btn-primary">Update Task</button>
</form>

@endsection