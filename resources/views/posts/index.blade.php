@extends('layouts.app')

@section('title', ' Blog Posts')

@section('content')

{{-- foreach문 --}}
    {{-- @foreach ( $posts as $key => $post )
        <div>{{ $key }}.{{  $post['title'] }}</div>
    @endforeach --}}

@forelse ($posts as $key => $post)

{{-- break $key == 2라고 한다면 1을 출력하고 2에서 멈출 것이다. --}}
{{-- @break($key == 2) --}}

{{-- @continue 반복문을 멈추지 않고 현재 부분을 건너뛰고 다음 단계로 진행  --}}
{{-- @continue($key == 1) --}}
@if ($loop->even)
    <div>{{ $key }}.{{ $post['title'] }}</div>
@else
    <div style="background-color: silver">{{ $key }}.{{  $post['title'] }}</div>
@endif

@empty
    No posts found!
@endforelse    

@endsection