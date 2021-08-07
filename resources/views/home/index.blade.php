{{-- app을 상속 받는다. --}}
@extends('layouts.app') 

{{-- app  title은 Home page 라고 출력 --}}
@section('title', 'Home page')

{{-- 섹션을 열고 app을 통하여 Hello world 출력 --}}
@section('content')
<h1>Hello world!</h1>

<div>
    @for ($i = 0; $i < 10; $i++)
        <div>The current value is {{ $i }}</div>
    @endfor
</div>

<div>
    @php $done = false @endphp
    @while (!$done)
        <div>I'm not done!</div>

        @php
            if (random_int(0, 1) === 1) $done = true
        @endphp
    @endwhile

</div>

{{-- 마지막으로 섹션을 끝내야 한다. endsection --}}
@endsection