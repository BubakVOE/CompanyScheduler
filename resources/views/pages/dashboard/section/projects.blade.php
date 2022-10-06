@extends('layouts.universalLayouts')
@section('content')

    <blade-projects
        :projects="{{ $projects }}"
        :companies="{{ $companies }}"
        :users="{{ $users }}"
    >

    </blade-projects>

@endsection


