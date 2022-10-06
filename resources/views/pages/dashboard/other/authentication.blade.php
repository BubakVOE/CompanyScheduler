@extends('layouts.universalLayouts')
@section('content')
    <blade-authentication :users="{{ $users }}">
    </blade-authentication>
@endsection
