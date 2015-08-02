@extends('app')

@section('content')
	<div class="container">

		<h1 class="text-center">Forum</h1>
        <hr/>

        <a href="{{ url('posts/create') }}" class="btn btn-primary btn-block" style="margin-bottom:15px">
            Create a New Post!
        </a>

		@include('errors.list')

        <div class="row">
    		{!! Form::open(['url' => 'forumSearchBar']) !!}
    		    <div class="form-group col-sm-10">
    				{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Post Title']) !!}
    			</div>

    			<div class="form-group col-sm-2">
    				{!! Form::submit('Submit', ['class' => 'btn btn-default form-control']) !!}
    			</div>
    		{!! Form::close() !!}
        </div>

        
		<table class="table table-striped" style="width:100%">
		  <tr>
		   <th>Username</th>
		    <th>Title
		    	<a href="{{ url('forumTitleAsc') }}">
		    		<span class="glyphicon glyphicon-arrow-up"></span>
                    
		    	</a>
		    	<a href="{{ url('forumTitleDesc')}}" >
                    <span class="glyphicon glyphicon-arrow-down"></span>
		    	</a>
		    </th>
		    <th>Topic
		    	<a href="{{ url('forumTopicAsc') }}">
		    		<span class="glyphicon glyphicon-arrow-up"></span>
		    	</a>
		    	<a href="{{ url('forumTopicDesc') }}">
		    		<span class="glyphicon glyphicon-arrow-down"></span>
		    	</a>
		    </th>
		    <th>Publish Date
		    	<a href="{{ url('forumPublishDateAsc') }}">
		    		<span class="glyphicon glyphicon-arrow-up"></span>
		    	</a>
		    	<a href="{{ url('forumPublishDateDesc') }}">
		    		<span class="glyphicon glyphicon-arrow-down"></span>
		    	</a>
		    </th>

		    <th>Score
                <a href="{{ url('forumScoreAsc') }}">
                     <span class="glyphicon glyphicon-arrow-up"></span>
                </a>
                <a href="{{ url('forumScoreDesc') }}">
                     <span class="glyphicon glyphicon-arrow-down"></span>
                </a>
            </th>
            <th># Comments</th>
 		  </tr>
         
         @foreach ($posts as $post)
			<tr>
				<td>{{ $post->user->name }}</td>
				<td><a href="{{ url('showProtectedPost', [$post->id]) }}">{{ $post->title }}</a></td>
				<td>{{ $post->topic }}</td>
				<td>{{ date('n/j/y g:i a', strtotime($post->published_at)) }}</td>
				<td>{{ $post->score}}</td>
				<td>{{ $post->comments->count() }}
			</tr>
         @endforeach
         
         
        </table>

        <div class="text-center">{!! $posts->render() !!}
        
	</div>
@stop