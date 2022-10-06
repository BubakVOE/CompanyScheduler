@extends('layouts.universalLayouts')
@section('content')

<blade-pdf
    :companies= "{{ $companies }}"   
    :years = "{{ $years }}"
    :months = "{{ $months }}" 
    :users = "{{ $users }}" 
>
</blade-pdf>



@endsection