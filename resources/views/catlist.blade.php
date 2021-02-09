@extends('layouts.app')

@section('content')

	<h1>Tasks by Category</h1>
	<p><a href="/">Return to add tasks</a></p>

    <div class="panel-body">
    	<ul>
    	@foreach( $cats as $cat )
    		<li>
    			{{$cat->name}}
    			<ol>
    				@foreach( $cat->tasks as $task )
    				<li>{{$task->name}}</li>
    				@endforeach
    			</ol>
    		</li>
    	@endforeach
    	</ul>
    </div>

@endsection
