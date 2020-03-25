@extends('layouts.default')

@section('content')
    HOME
    <br>
    {{Auth::user()->name}}
    <form method="POST" action="{{url('/logout')}}">
        <button type="submit" class="btn btn-primary">LOGOUT</button>
    </form>
@endsection