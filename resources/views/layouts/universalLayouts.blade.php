@extends('layouts.generalLayouts')
@section('layout')
    <div class="py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="navbar-expand-md col-md-3 col-lg-2 d-flex flex-column">
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon me-3 mb-2"><i class="fas fa-bars fa-2x"></i></span>
                    </button>

                    @auth
                        @if (Auth::user()->is_admin == 1)
                            <nav id="sidebarMenu"
                                class="bg-white pb-3 px-2 my-2 d-md-block bg-light sidebar collapse navbar-collapse rounded shadow-lg"
                                style="align-items: start;">
                                <div class="position-sticky pt-3 mx-auto">
                                    <ul class="nav flex-column ">

                                        <h1
                                            class="nav-item border-bottom border-dark text-black text-center text-uppercase fw-bolder fs-5">
                                            Přehled
                                        </h1>


                                        <li class="{{ active('dashboard') }} nav-item mt-2 ">
                                            <a class=" nav-link text-black text-left " href="/dashboard">
                                                <span data-feather="home" class="align-text-bottom"></span>
                                                Dashboard
                                            </a>
                                        </li>
                                    </ul>

                                    <ul class="nav flex-column pt-5 ">
                                        <h1
                                            class="nav-item border-bottom border-dark text-black text-center text-uppercase fw-bolder fs-5">
                                            Vytvořit / edit / delete
                                        </h1>

                                        <div>
                                            <li
                                                class="{{ active(['dashboard/process', 'dashboard/process/*']) }} nav-item mt-2  ">

                                                <a href="/dashboard/process" class="btn btn-success mx-auto w-50 ms-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                                        </path>
                                                    </svg>
                                                    Proces
                                                </a>

                                            </li>

                                            <li
                                                class="{{ active(['dashboard/companies', 'dashboard/companies/*']) }} nav-item mt-2">
                                                <a class="nav-link text-black text-left" href="/dashboard/companies">
                                                    <span class="me-5 pe-2 align-text-bottom">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                                                            <path
                                                                d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                                                        </svg>
                                                    </span>
                                                    Společnosti
                                                </a>
                                            </li>

                                            <li class="{{ active('dashboard/projects') }} nav-item">
                                                <a class="nav-link text-black text-left" href="/dashboard/projects">
                                                    <span class="me-5 pe-2 align-text-bottom">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-card-checklist"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                            <path
                                                                d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                                        </svg>
                                                    </span>
                                                    Projekty
                                                </a>
                                            </li>

                                            <li class="{{ active('dashboard/employees') }} nav-item">
                                                <a class="nav-link text-black text-left" href="/dashboard/employees">
                                                    <span class="me-5 pe-2 align-text-bottom">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                        </svg>
                                                    </span>
                                                    Zaměstnanci
                                                </a>
                                            </li>

                                            <li class="{{ active('dashboard/jobs') }} nav-item">
                                                <a class="nav-link text-black text-left" href="/dashboard/jobs">
                                                    <span class="me-5 pe-2 align-text-bottom">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                                                            <path
                                                                d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                                                        </svg>
                                                    </span>
                                                    Práce
                                                </a>
                                            </li>
                                        </div>
                                    </ul>

                                    <ul class="nav flex-column pt-5">
                                        <h1
                                            class="nav-item border-bottom border-dark text-black text-center text-uppercase fw-bolder fs-5">
                                            Další
                                        </h1>

                                        <div>

                                            <li class="{{ active('dashboard/pdf') }} nav-item ">
                                                <a class="nav-link text-black text-left text-muted " href="/dashboard/pdf">
                                                    PDF
                                                </a>
                                            </li>

                                            <li class="{{ active('dashboard/back_ups') }} nav-item">
                                                <a class="nav-link text-black text-left text-muted " href="/dashboard/back_ups">
                                                    BackUps
                                                </a>
                                            </li>

                                            <li class="{{ active('dashboard/activity') }} nav-item">
                                                <a class="nav-link text-black text-left text-muted " href="/dashboard/activity">
                                                    Záznamy aktivit
                                                </a>
                                            </li>

                                            <li class="{{ active('dashboard/authentication') }} nav-item">
                                                <a class="nav-link text-black text-left text-muted "
                                                    href="/dashboard/authentication">
                                                    Záznamy přihlášení
                                                </a>
                                            </li>

                                            <li class="{{ active('/log-viewer') }} nav-item">
                                                <a class="nav-link text-black text-left text-muted " href="/log-viewer">
                                                    Záznamy laravel.log
                                                </a>
                                            </li>

                                            <li class="{{ active('dashboard/test') }} nav-item">
                                                <a class="nav-link text-black text-left text-muted " href="/dashboard/test">
                                                    test
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </nav>
                        @elseif(Auth::user()->is_admin == 0)
                            <nav id="sidebarMenu"
                                class="bg-white pb-3 px-2 my-2 d-md-block bg-light sidebar collapse navbar-collapse rounded shadow-lg"
                                style="align-items: start;">
                                <div class="position-sticky pt-3 mx-auto">
                                    <ul class="nav flex-column ">
                                        <h1
                                            class="nav-item border-bottom border-dark text-black text-center text-uppercase fw-bolder fs-5">
                                            Přehled
                                        </h1>

                                        <div>
                                            <li class="{{ active('employee/*/overall') }} nav-item mt-2 ">
                                                <a class=" nav-link text-black text-left "
                                                    href="/employee/{{ Auth::user()->id }}/overall">
                                                    <span data-feather="home" class="align-text-bottom"></span>
                                                    Dashboard
                                                </a>
                                            </li>

                                        </div>
                                    </ul>

                                    <ul class="nav flex-column pt-5 ">
                                        <h1
                                            class="nav-item border-bottom border-dark text-black text-center text-uppercase fw-bolder fs-5">
                                            Vytvořit / edit / delete
                                        </h1>

                                        <div>
                                            <li
                                                class="{{ active('employee/*/records') }} {{ active(['employee/*/records', 'employee/*/records/*']) }} nav-item mt-2">
                                                <a class="nav-link text-black text-left"
                                                    href="/employee/{{ Auth::user()->id }}/records">
                                                    <span class="me-5 pe-2 align-text-bottom">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                                                            <path
                                                                d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    Práce
                                                </a>
                                            </li>
                                        </div>
                                    </ul>

                                    <ul class="nav flex-column pt-5">
                                        <h1
                                            class="nav-item border-bottom border-dark text-black text-center text-uppercase fw-bolder fs-5">
                                            Další
                                        </h1>

                                        <div>
                                            <li class="{{ active('employee/*/settings') }} nav-item">
                                                <a class="nav-link text-black text-left text-muted "
                                                    href="/employee/{{ Auth::user()->id }}/settings">
                                                    Změnit údaje
                                                </a>
                                            </li>

                                        </div>
                                    </ul>
                                </div>
                            </nav>
                        @else
                            <h1>
                                jsi pleb
                            </h1>
                        @endif
                    @endauth


                </div>

                {{-- <main class="col-md-9 ms-sm-auto col-lg-9 px-md-3 my-2" id="app"> --}}
                <main class="col-md-9 mx-auto col-lg-10 px-md-3 my-2" id="app">

                    @yield('content')
                </main>
            </div>
        </div>
    </div>
@endsection
