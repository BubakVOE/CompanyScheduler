@extends('layouts.universalLayouts')
@section('content')
    <blade-process 
        :users = '{{ $users }}'
    >
    <blade-process />
    @endsection
