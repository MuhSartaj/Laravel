<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Films')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container">
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	@if(session()->has('success'))
	    <div class="alert alert-success">
	        {{ session()->get('success') }}
	    </div>
	@endif
	@if(session()->has('danger'))
	    <div class="alert alert-danger"> 
	    	{{ session()->get('danger') }}
	    </div>
	@endif
	<div class="content">
		<div class="image" style="float: left; width: 40%">
			<img src="{{ $info->photo }}" height="600px">
		</div>
		<div class="content info">
			<h2>{{ $info->name }}</h2>
			<p>{{ $info->description }}</p>
			<p><span>Release Date</span><br>{{ $info->release_date }}</p>
			<p><span>Rating</span><br>{{ $info->rating }}</p>
			<p><span>Ticket Price</span><br>$ {{ $info->ticket_price }}</p>
			<p><span>Country</span><br>{{ strtoupper($info->country) }}</p>
			<p><span>Genre</span><br>{{ strtoupper($info->genre) }}</p>
			<br>
			<div class="form" style="width: 60%;float: left;border: 1px solid #ddd;padding: 20px 15px;"> 
				<p>Submit Comment:</p>
				<hr style="border-top-color: #ddd;">
				{{ Form::open(array('url' => 'addComment', 'class'=>'form')) }}
				<div class="form-group">
					<input type="hidden" name="film_id" value="{{ $info->id }}" /> 
					{{ Form::label('name', 'Name') }}
					{{ Form::text('name', @Auth::user()->name, ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('comment', 'Comment') }}
					{{ Form::textarea('comment', '', ['class'=>'form-control', 'rows' => '5']) }}
				</div>
				<div class="form-group">
					{{ Form::submit('Submit',['class'=>'form-control btn btn-info']) }}
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endsection