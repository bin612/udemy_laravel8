@extends('layouts.app')

@section('title', ' Blog Posts')

@section('content')

{{-- foreach문 --}}
    {{--  @foreach ( $posts as $key => $post )
        <div>{{ $key }}.{{  $post['title'] }}</div>
    @endforeach  --}}

{{--  @forelse ($posts as $key => $post)  --}}

@each('posts.partials.post', $posts ,'post' )

{{--  include가 있던 곳에서 사용할 수 있었던  모든 변수를 상속합니다.   include를 하게 되면 모든 변수가 상속이되어 사용가능해진다.--}}
        {{--  @include('posts.partials.post')

@empty
    No posts found!
@endforelse      --}}

@endsection