@extends('layouts.universalLayouts')


@section('content')

    <blade-dashboard
        :companies="{{ $companies }}"
        {{-- :newest_works="{{ $newest_works }}" --}}

        :week_earns = "{{ $week_earns }}"
        :month_earns = "{{ $month_earns }}"
        :year_earns = "{{ $year_earns }}"

        :companies_count = "{{ $companies_count }}"
        :projects_count = "{{ $projects_count }}"
        :users_count = "{{ $users_count }}"
        :works_count = "{{ $works_count }}"
        :db_count = "{{ $db_count }}"

    >
    </blade-dashboard>

@endsection

