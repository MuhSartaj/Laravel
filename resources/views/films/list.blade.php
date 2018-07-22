<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Films')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container">
	<p><h1>Films</h1></p>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<table id="example" class="display" width="100%">
			<thead>
		        <tr>
		            <th>Name</th>
		            <th>Description</th>
		            <th>Release Date</th>
		            <th>Rating</th>
		            <th>country</th>
		            <th>Photo</th>
		            <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
			    @foreach($list as $key => $val)
			    <tr>
			    	<td>{{ $val->name }}</td>
			    	<td>{{ $val->description }}</td>
			    	<td>{{ $val->release_date }}</td>
			    	<td>{{ $val->rating }}</td>
			    	<td>{{ strtoupper($val->country) }}</td>
			    	<td><img src="{{ $val->photo }}" height="50px"></td>
			    	<td><a href="{{ url('films/'.str_replace(' ', '_', $val->name)) }}">View</a></td>
			    </tr>
				@endforeach    
			</tbody>
		</table>
<script type="text/javascript">
	var jqury = jQuery.noConflict();
	jqury(document).ready(function() {
	    jqury('#example').DataTable( {
	    	'bLengthChange' : false,
	        "lengthMenu": [[1], [1]]
	    } );
	} );
</script>
</div>
@endsection