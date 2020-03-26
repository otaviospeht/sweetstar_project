@extends('layouts.default')

@section('content')
    HOME
    <br>
    <form method="POST" action="{{url('/logout')}}">
        <button type="submit" class="btn btn-primary">LOGOUT</button>
    </form>
@endsection