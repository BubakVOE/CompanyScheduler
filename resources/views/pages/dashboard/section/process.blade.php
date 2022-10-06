@extends('layouts.universalLayouts')
@section('content')
    <blade-create-process 
        :users = '{{ $users }}'
    >
    <blade-create-process />
    @endsection
