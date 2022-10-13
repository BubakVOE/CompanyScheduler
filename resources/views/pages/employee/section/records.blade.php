@extends('layouts.universalLayouts')
@section('content')

    <blade-records
        :user='{{ $user }}'

        :logged_user='{{ Auth::user()->is_admin }}'

        :active='{{ $active }}'

        :in_year='{{ $year }}'

        :in_month='{{ $month }}'

        :project_data = '{{ $project_data }}'

    >
    </blade-records>

@endsection

