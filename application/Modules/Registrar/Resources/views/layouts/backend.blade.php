<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>

  <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="noindex, nofollow">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Icons -->
  <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
  <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

  <!-- Fonts and Styles -->
  @yield('css_before')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" id="css-main" href="{{ url('/css/oneui.css') }}">

    <style>
        /*.tum-logo {*/
        /*    position: relative;*/
        /*    bottom: 8% !important;*/
        /*    left: 0;*/
        /*    right: 0;*/
        /*    text-align: center;*/
        /*}*/

        /* Styles for the parent container */
        .sidebar-o {
            display: flex;
            flex-direction: column;
        }

        /* Styles for the content side (menu) */
        .content-side {
            flex: 1;
            overflow-y: auto; /* To enable scrolling if content overflows */
            padding-bottom: 50px; /* To make space for the .tum-logo */
            position: relative; /* Make the .content-side a positioning context */
        }

        /* Styles for the tum-logo */
        .tum-logo {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            /*background-color: #f8f9fa;*/
            padding: 10px;
            z-index: 99; /* Ensure the logo stays on top of the content */
        }

        /* Responsive styles */
        @media (max-height: 800px) {
            .tum-logo {
                padding: 8px;
            }
        }

        @media (max-height: 600px) {
            .tum-logo {
                padding: 5px;
            }
        }

        /* Add more responsive styles as needed based on your requirements */

        /* Add more responsive styles as needed based on your requirements */
    </style>

  <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/amethyst.css') }}"> -->
  @yield('css_after')

  <!-- Scripts -->
  <script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
  </script>

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>

  <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">

    <nav id="sidebar" aria-label="Main Navigation">
      <!-- Side Header -->
      <div class="content-header">
        <!-- Logo -->
        <a class="font-semibold text-dual" href="#">
          <span class="smini-visible">
            <i class="fa fa-circle-notch text-primary"></i>
          </span>
          <span class="smini-hide fs-5 tracking-wider"><span class="fw-normal">{{ config('app.name') }}</span></span>
        </a>
        <!-- END Logo -->

      </div>
      <!-- END Side Header -->

      <!-- Sidebar Scrolling -->
      <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
          <ul class="nav-main">
            <li class="nav-main-item">
              <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                <i class="nav-main-link-icon fas fa-home-user"></i>
                <span class="nav-main-link-name">
                    @if(auth()->guard('user')->user()->hasRole('REGISTRAR'))
                        Registrar [ {{ auth()->guard('user')->user()->employmentDepartment->first()->dept_code }} ]
                    @endif
                </span>
              </a>
            </li>
            <li class="nav-main-item{{ request()->is('intakes/*') ? ' open' : '' }}">
              <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                <i class="nav-main-link-icon fa fa-cogs"></i>
                <span class="nav-main-link-name">Academics Setup</span>
              </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('school/showSchool') ? ' active' : '' }}" href="{{  route('courses.showSchool') }}">
                            <span class="nav-main-link-name">Schools</span>
                        </a>
                    </li>
                </ul>
              <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                      <a class="nav-main-link{{ request()->is('department/showDepartment') ? ' active' : '' }}" href="{{  route('courses.showDepartment') }}">
                          <span class="nav-main-link-name">Department</span>
                      </a>
                  </li>
              </ul>
              <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                      <a class="nav-main-link{{ request()->is('courses/showCourse') ? ' active' : '' }}" href="{{  route('courses.showCourse') }}">
                          <span class="nav-main-link-name">Courses</span>
                      </a>
                  </li>
              </ul>
              <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                      <a class="nav-main-link{{ request()->is('attendance/index') ? ' active' : '' }}" href="{{ route('courses.showAttendance')}}">
                          <span class="nav-main-link-name">Mode of Study</span>
                      </a>
                  </li>
              </ul>
            </li>
              <li class="nav-main-item{{ request()->is('intakes/*') ? ' open' : '' }}">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                      <i class="nav-main-link-icon fa fa-clock-rotate-left"></i>
                      <span class="nav-main-link-name">Schedules</span>
                  </a>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('intake/showIntake') ? ' active' : '' }}" href="{{ route('courses.academicYear') }}">
                              <span class="nav-main-link-name">Academic Years</span>
                          </a>
                      </li>
                  </ul>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('attendance/index') ? ' active' : '' }}" href="{{ route('courses.showCalenderOfEvents')}}">
                              <span class="nav-main-link-name"> Calender of Events</span>
                          </a>
                      </li>
                  </ul>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('attendance/index') ? ' active' : '' }}" href="{{ route('courses.showEvent')}}">
                              <span class="nav-main-link-name"> Events</span>
                          </a>
                      </li>
                  </ul>
              </li>
            <li class="nav-main-item{{ request()->is('intakes/*') ? ' open' : '' }}">
              <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                <i class="nav-main-link-icon fa fa-list"></i>
                <span class="nav-main-link-name">Applications</span>
              </a>
              <ul class="nav-main-submenu">
                <li class="nav-main-item">
                  <a class="nav-main-link{{ request()->is('applications') ? ' active' : '' }}" href="{{ route('courses.applications') }}">
                    <span class="nav-main-link-name">
                       Self Sponsored
                    </span>

                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link{{ request()->is('showKuccps') ? ' active' : '' }}" href="{{ route('courses.showKuccps') }}">
                    <span class="nav-main-link-name">
                       KUCCPS Applications
                    </span>

                  </a>
                </li>

                <li class="nav-main-item">
                  <a class="nav-main-link{{ request()->is('archived') ? ' active' : '' }}" href="{{ route('courses.archived') }}">
                    <span class="nav-main-link-name">
                       All Applications
                    </span>

                  </a>
                </li>
              </ul>
            </li>
              <li class="nav-main-item{{ request()->is('intakes/*') ? ' open' : '' }}">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                      <i class="nav-main-link-icon fa fa-list-1-2"></i>
                      <span class="nav-main-link-name">Admissions</span>
                  </a>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('applications') ? ' active' : '' }}" href="{{ route('courses.admissions') }}">
                              <span class="nav-main-link-name"> Pending Admissions </span>
                          </a>
                      </li>
                  </ul>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('applications') ? ' active' : '' }}" href="{{ route('courses.admissions') }}">
                              <span class="nav-main-link-name"> Cleared Admissions </span>
                          </a>
                      </li>
                  </ul>
              </li>

            <li class="nav-main-item{{ request()->is('intakes/*') ? ' open' : '' }}">
              <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                  <i class="nav-main-link-icon fa fa-chart-line"></i>
                  <span class="nav-main-link-name"> Student Progression</span>
              </a>
              <ul class="nav-main-submenu">
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('transfer') ? ' active' : '' }}" href="{{ route('courses.yearly') }}">
                        <span class="nav-main-link-name"> Course Transfer </span>
                    </a>
                </li>
            </ul>
              <ul class="nav-main-submenu">

                  <li class="nav-main-item">
                      <a class="nav-main-link{{ request()->is('transfer') ? ' active' : '' }}" href="{{ route('courses.leaves') }}">
                          <span class="nav-main-link-name"> Academic Leave</span>
                      </a>
                  </li>
              </ul>
              <ul class="nav-main-submenu">

                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('transfer') ? ' active' : '' }}" href="{{ route('courses.readmissions') }}">
                        <span class="nav-main-link-name"> Readmission</span>
                    </a>
                </li>
            </ul>
          </li>
          <li class="nav-main-item{{ request()->is('intakes/*') ? ' open' : '' }}">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                <i class="nav-main-link-icon fa fa-tasks"></i>
                <span class="nav-main-link-name">Workloads</span>
            </a>
            <ul class="nav-main-submenu">
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('applications') ? ' active' : '' }}" href="{{ route('courses.workload') }}">
                        <span class="nav-main-link-name"> View Workloads </span>
                    </a>
                </li>
            </ul>
          </li>
          <li class="nav-main-item{{ request()->is('intakes/*') ? ' open' : '' }}">
              <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                  <i class="nav-main-link-icon fa fa-book-open-reader"></i>
                  <span class="nav-main-link-name">Examination</span>
              </a>
              <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                      <a class="nav-main-link{{ request()->is('applications') ? ' active' : '' }}" href="{{ route('courses.yearlyExamMarks') }}">
                          <span class="nav-main-link-name"> View Exams </span>
                      </a>
                  </li>
              </ul>
          </li>

              <li class="nav-main-item{{ request()->is('semFee/*') ? ' open' : '' }}">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                      <i class="nav-main-link-icon fa fa-money-check-dollar"></i>
                      <span class="nav-main-link-name">Student Finance</span>
                  </a>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('attendance/index') ? ' active' : '' }}" href="{{ route('courses.showSemFee')}}">
                              <span class="nav-main-link-name">Fee Structures</span>
                          </a>
                      </li>
                  </ul>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('attendance/index') ? ' active' : '' }}" href="{{ route('courses.showVoteheads')}}">
                              <span class="nav-main-link-name"> Voteheads</span>
                          </a>
                      </li>
                  </ul>
                  <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('attendance/index') ? ' active' : '' }}" href="{{ route('courses.showChargeableVoteheads')}}">
                            <span class="nav-main-link-name"> Chargeable Voteheads</span>
                        </a>
                    </li>
                </ul>
              </li>
              <li class="nav-main-item{{ request()->is('intakes/*') ? ' open' : '' }}">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                      <i class="nav-main-link-icon fa fa-file-import"></i>
                      <span class="nav-main-link-name">Imports</span>
                  </a>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('classes/index') ? ' active' : '' }}" href="{{ route('courses.importUnit')}}">
                              <span class="nav-main-link-name"> Units</span>
                          </a>
                      </li>
                  </ul>
{{--                  <ul class="nav-main-submenu">--}}
{{--                      <li class="nav-main-item">--}}
{{--                          <a class="nav-main-link{{ request()->is('classes/index') ? ' active' : '' }}" href="{{ route('courses.importExportCourses')}}">--}}
{{--                              <span class="nav-main-link-name">Courses</span>--}}
{{--                          </a>--}}
{{--                      </li>--}}
{{--                  </ul>--}}
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('importExportViewkuccps') ? ' active' : '' }}" href="{{ route('courses.importExportViewkuccps') }}">
                    <span class="nav-main-link-name">
                       Import Kuccps Students
                    </span>

                          </a>
                      </li>
                  </ul>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('classes/index') ? ' active' : '' }}" href="{{ route('courses.importExportclusterWeights')}}">
                              <span class="nav-main-link-name"> Cluster Weights</span>
                          </a>
                      </li>
                  </ul>
{{--                  <ul class="nav-main-submenu">--}}
{{--                      <li class="nav-main-item">--}}
{{--                          <a class="nav-main-link{{ request()->is('classes/index') ? ' active' : '' }}" href="{{ route('courses.importUnitProgramms')}}">--}}
{{--                              <span class="nav-main-link-name"> Unit Programs</span>--}}
{{--                          </a>--}}
{{--                      </li>--}}
{{--                  </ul>--}}
              </li>
              <li class="nav-main-item{{ request()->is('intakes/*') ? ' open' : '' }}">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                      <i class="nav-main-link-icon fa fa-user-cog"></i>
                      <span class="nav-main-link-name">Administrator</span>
                  </a>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('applications') ? ' active' : '' }}" href="{{ route('admin.users') }}">
                              <span class="nav-main-link-name"> Users </span>
                          </a>
                      </li>
                  </ul>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('applications') ? ' active' : '' }}" href="{{ route('admin.showDepartment') }}">
                              <span class="nav-main-link-name"> Departments </span>
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>
        </div>
        <!-- END Side Navigation -->

          <div class="tum-logo">
              {{-- <img class="mb-2" src="{{ asset('media/tum-logo/tum-logo.png') }}" alt="TUM Logo" style="height: 90px; width: 120px;"> <br> --}}
              {{-- <img src="{{ asset('media/tum-logo/iso.png') }}" alt="TUM Logo" style="height: 40px; width: 150px;"> --}}
          </div>
      </div>

      <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header" style="background: #d89837 !important">
      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
          <!-- Toggle Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
          </button>
          <!-- END Toggle Sidebar -->

          <!-- Toggle Mini Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-sm btn-alt-dark me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
            <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
          </button>
          <!-- END Toggle Mini Sidebar -->

        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">
          <!-- User Dropdown -->
          <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-dark d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle" src="{{ asset('media/avatars/male.png') }}" alt="Header Avatar" style="width: 21px;">
              <span class="d-none d-sm-inline-block ms-2">
                  @php
                    $user = auth()->guard('user')->user()->staffInfos;
                  @endphp

                  @if(auth()->guard('user')->check())
                      {{ $user->title }} {{ $user->last_name }}
                  @endif
              </span>
              <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
              <div class="p-3 text-center bg-body-dark border-bottom rounded-top">
                <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('media/avatars/male.png') }}" alt="">
                <p class="mt-2 mb-0 fw-medium">
           {{-- {{ Auth::guard('user')->user()->name }}--}}
                    @if(auth()->guard('user')->check())
                        {{ $user->title }} {{ $user->last_name }} {{ $user->first_name }} {{ $user->middle_name }}
                    @endif </p>
                <p class="mb-0 text-muted fs-sm fw-medium">
                    @if(auth()->guard('user')->user()->hasRole('REGISTRAR'))
                        Registrar [ {{ auth()->guard('user')->user()->employmentDepartment->first()->dept_code }} ]
                  @endif
              </div>
              {{-- <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                  <span class="fs-sm fw-medium">Settings</span>
                </a>
              </div> --}}
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('logout') }}">
                  <span class="fs-sm fw-medium">Sign Out</span>
                </a>
              </div>
            </div>
          </div>
          <!-- END User Dropdown -->
{{--
          <!-- Notifications Dropdown -->
          <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
              <span class="text-primary">•</span>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 border-0 fs-sm" aria-labelledby="page-header-notifications-dropdown">
              <div class="p-2 bg-body-light border-bottom text-center rounded-top">
                <h5 class="dropdown-header text-uppercase">Notifications</h5>
              </div>
              <ul class="nav-items mb-0">
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-check-circle text-success"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">You have a new follower</div>
                      <span class="fw-medium text-muted">15 min ago</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-plus-circle text-primary"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">1 new sale, keep it up</div>
                      <span class="fw-medium text-muted">22 min ago</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-times-circle text-danger"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">Update failed, restart server</div>
                      <span class="fw-medium text-muted">26 min ago</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-plus-circle text-primary"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">2 new sales, keep it up</div>
                      <span class="fw-medium text-muted">33 min ago</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-user-plus text-success"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">You have a new subscriber</div>
                      <span class="fw-medium text-muted">41 min ago</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-check-circle text-success"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">You have a new follower</div>
                      <span class="fw-medium text-muted">42 min ago</span>
                    </div>
                  </a>
                </li>
              </ul>
              <div class="p-2 border-top text-center">
                <a class="d-inline-block fw-medium" href="javascript:void(0)">
                  <i class="fa fa-fw fa-arrow-down me-1 opacity-50"></i> Load More..
                </a>
              </div>
            </div>
          </div>
          <!-- END Notifications Dropdown --> --}}
        </div>
        <!-- END Right Section -->
      </div>
      <!-- END Header Content -->

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <form class="w-100" action="/dashboard" method="POST">
            @csrf
            <div class="input-group">
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                <i class="fa fa-fw fa-times-circle"></i>
              </button>
              <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
            </div>
          </form>
        </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <div class="w-100 text-center">
            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
          </div>
        </div>
      </div>
      <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

      @section('css_before')
        <!-- Page JS Plugins CSS -->
            <link rel="stylesheet" href="{{ url('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
            <link rel="stylesheet" href="{{ url('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    @endsection

    @section('js_after')
        <!-- jQuery (required for DataTables plugin) -->
            <script src="{{ url('js/lib/jquery.min.js') }}"></script>

            <!-- Page JS Plugins -->
            <script src="{{ url('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ url('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
            <script src="{{ url('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
            <script src="{{ url('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
            <script src="{{ url('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
            <script src="{{ url('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
            <script src="{{ url('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
            <script src="{{ url('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
             <script src="{{ url('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

            <!-- Page JS Code -->
            <script src="{{ url('js/pages/tables_datatables.js') }}"></script>
        @endsection

      @yield('content')
        @include('application::messages.notification')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="" style="background: rgba(0, 0, 0, 0.7) !important">
      <div class="content py-3">
        <div class="row fs-sm" style="color: white; !mportant">
          <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
            Designed by <a class="fw-semibold"  style="color: gold;" href="https://support.tum.ac.ke/" target="_blank">TUM ICTS</a>
          </div>
          <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
            <a class="fw-semibold" href="https://www.tum.ac.ke/" style="color: gold;" target="_blank">Technical University of Mombasa</a> &copy; <span data-toggle="year-copy"></span>
          </div>
        </div>
      </div>
    </footer>
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->

  <!-- OneUI Core JS -->
  <script src="{{ url('js/oneui.app.js') }}"></script>

  <!-- Laravel Scaffolding JS -->
  <!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->


  @yield('js_after')
</body>

</html>
