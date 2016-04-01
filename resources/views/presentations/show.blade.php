@extends('layouts.master')

@section('title', 'LocWorld Submissions Review')

@section('content')
<div class="page-header">
	<a href="{{ action('PresentationController@edit', $object->id) }}"
		class="btn btn-info pull-right">Edit</a>
	<h1><?php echo $object->presentation_title; ?></h1>
</div>

<p><?php echo $object->synopsis; ?></p>
<p><?php echo $object->conference_track; ?></p>
<p>Presentation submitted at: <?php echo $object->created_at; ?></p>
@endsection