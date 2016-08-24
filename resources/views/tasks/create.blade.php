@extends('layouts.app')

@section('content')

<form action="../tasks" method="POST">
	{{ csrf_field() }}

	<input type="text" placeholder="Give your Task a Name..." name="title" id="inputTitle" class="form-control" required="required">
	
	<button type="submit" class="btn btn-primary">Create Task</button>
</form>

@endsection