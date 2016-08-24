@extends('layouts.app')

@section('content')

	<h1>TASKS TEST</h1>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Task</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tasks as $task)
				<tr>
				    <td>{{ $task->id }}</td>
					<td>
						@if ($task->completed) 
							<strike>{{ $task->title }}</strike>
						@else 
							{{ $task->title }}
						@endif
					</td>
					<td>
						{{-- Delete Task --}}
						<form action="../tasks/{{$task->id}}" method="post">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-xs btn-danger">Delete</button>
						</form>

						{{-- Edit Task --}}
						<a href="tasks/{{$task->id}}/edit">
							<button type="button" class="btn btn-xs btn-warning">Edit</button>
						</a>
						
						{{-- Toggle Task Completion --}}
						<form action="../tasks/{{$task->id}}/toggleTaskCompletion" method="post">
							{{ csrf_field() }}

							@if ($task->completed) 
								<button type="submit" class="btn btn-xs btn-default">Uncomplete Task</button>
							@else 
								<button type="submit" class="btn btn-xs btn-success">Complete Task</button>
							@endif
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection