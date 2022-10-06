@extends('layouts.universalLayouts')
@section('content')
    <projects-of-company
        :company_relations="{{ $company_realations }}"
    >
    </projects-of-company>

    
    @foreach ($projects as $project)
        {{ $project }} <br><br><br>
    @endforeach


@endsection
