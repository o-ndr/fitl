@extends('layouts.master')

@section('title', 'LocWorld Submissions Review')

@section('content')
<h1><?php echo $object->presentation_title; ?></h1>
<p><?php echo $object->synopsis; ?></p>
<p><?php echo $object->conference_track; ?></p>
<p>Presentation submitted at: <?php echo $object->created_at; ?></p>
@endsection