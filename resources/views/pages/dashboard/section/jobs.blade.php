@extends('layouts.universalLayouts')
@section('content')
    <blade-jobs 
        :projects="{{ $projects }}" 
        :users="{{ $users }}"
    >

    </blade-jobs>
@endsection
