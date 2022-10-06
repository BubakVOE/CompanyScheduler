@extends('layouts.universalLayouts')
@section('content')


{{-- {{ $user }}
<br>
<br>
<br>
{{ $active }}

<br>
<br>
<br>

<br>
<br>
<br>
{{ $project_data }}
<br>
<br>
<br> --}}



    <blade-records
        :user='{{ $user }}'
        :active='{{ $active }}'

        :in_year='{{ $year }}'

        :in_month='{{ $month }}'
        :logged_user='{{ Auth::user()->is_admin }}'
    >
    </blade-records>

@endsection

