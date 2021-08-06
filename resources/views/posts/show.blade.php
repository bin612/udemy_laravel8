@extends('layouts.app')

@section('title', $post['title'])

@section('content')
@if ($post['is_new'])
<div>A new blog post! Using if</div>
{{-- @elseif (!$post['is_new']) --}}
@else
<div>Blog post is old! using elseif/else</div>    
@endif

@unless ($post['is_new'])
<div>It is an old post... using unless</div>
@endunless

<h1>{{ $post['title'] }}</h1>
<p>{{ $post['content'] }}</p>

@isset($post['has_comments'])
<div>The post hsd some comments... using isset</div>    
@endisset

@endsection