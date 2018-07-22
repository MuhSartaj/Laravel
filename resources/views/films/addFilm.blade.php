<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Films')


@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
    
    
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
	<div class="form">
		<p><h1>Add Film</h1></p>
		{{ Form::open(array('url' => 'addFilm','files' => true)) }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', '', ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('description', 'Description') }}
			{{ Form::textarea('description', '', ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('release_date', 'Release Date') }}
			{{ Form::date('release_date', null, ['class'=>'form-control', 'id' => 'release_date']) }}
		</div>
		<div class="form-group">
			{{ Form::label('rating', 'Rating') }}
			{{ Form::select('rating', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'], null, ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('ticket_price', 'Ticket Price') }}
			{{ Form::number('ticket_price', '', ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('country', 'Country') }}
			{{ Form::select('country', ['usa' => 'USA', 'india' => 'INDIA', 'canada' => 'Canada', 'germany' => 'germany', 'turkey' => 'Turkey'], null, ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('genre', 'Genre') }}
			{{ Form::select('genre[]', ['action' => 'Action', 'horror' => 'Horror', 'comedy' => 'Comedy', 'thirller' => 'Thirller', 'romantic' => 'Romantic'], null, ['multiple'=>true, 'class'=>'form-control'] ) }}
		</div>
		<div class="form-group">
			{{ Form::label('photo', 'Photo') }}
			{{ Form::file('photo',['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('ADD',['class'=>'form-control btn btn-info']) }}
		</div>
		{{ Form::close() }}
	</div>
</div>
@endsection