@extends('layouts.universalLayouts')
@section('content')

<blade-overall
    :user='{{ $user }}'

    :logged_user= '{{ Auth::user()->is_admin }}'

    :active='{{ json_encode($active) }}'


    :this_yesterday_earns='{{ $this_yesterday_earns }}'
    :this_yesterday_number='{{ $this_yesterday_number }}'

    :last_week_earns='{{ $last_week_earns }}'
    :last_week_number='{{ $last_week_number }}'

    :last_month_earns='{{ $last_month_earns }}'
    :last_month_number='{{ $last_month_number }}'>
</blade-overall>



@endsection

