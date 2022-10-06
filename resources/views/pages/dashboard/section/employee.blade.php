@extends('layouts.universalLayouts')
@section('content')

{{-- 
{{$companies}}
{{$projects}} --}}



    {{-- <blade-employee 
        :companies="{{ $companies }}"
        :projects="{{ $projects }}"
    >

    </blade-employee> --}}

    <blade-employee
    :projects='{{ $projects }}'
    >

    </blade-employee>

    @endsection
