@php
    $hello = ["ram","shyam","hari"];
@endphp

<ul>
@foreach ($hello as $h)
<li>{{$loop->count." "}} {{$loop->index}}{{$h}}</li>

@if($loop->last)
<li style="background-color:red">{{$h}}</li>
@endif

@endforeach
@{{$name}}

</ul>
{{-- {!!<h1>hello this is h1 in blade template</h1>!!} --}}
<h1>hello this is h1 in blade template</h1>