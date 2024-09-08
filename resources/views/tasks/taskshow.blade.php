@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h1>Completed Tasks</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Completion Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($completedTasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->completed_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>  
@endsection