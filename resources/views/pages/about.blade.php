@extends('layouts.master')

@section('title', 'About')

@section('content')
<h1>{{ trans('pages/about.about_header') }}</h1>
<p>{{ trans('pages/about.about_page_text_body') }}</p>
@endsection