@extends('layouts.universalLayouts')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="display-5 fw-bolder text-uppercase text-center displ">Rozcestník</h1>
                    </div>

                    @isset($message)
                        {{ $message }}
                    @endisset

                    <div class="list-group">
                        @if (Auth::user()->is_admin == 1)
                            <a href="{{ route('dashboard-index') }}"
                                class="list-group-item list-group-item-action text-xl-center">
                                Dashboard
                            </a>
                        @else
                            <a href="" class="list-group-item list-group-item-action text-xl-center">
                                Users
                            </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
