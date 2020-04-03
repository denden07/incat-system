<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    @yield('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">


</head>
<body>

<div class="wrapper admin-wrapper">
    <!-- Topbar  -->
    <nav id="top-bar">

        <div class="top-menu">
            <div class="hamburger">
                <i id="sidebarCollapse" class="fas fa-bars"></i>
            </div>
            <ul>
                <li><a href="#">
                        <i class="fas fa-search"></i></a></li>
                <li><a href="#">
                        <i class="fas fa-bell"></i>
                    </a></li>
                <div class="teacher-drop-down">
                <li><button>
                        <i class="fas fa-user"></i>
                    </button>

                </li>
                    <div class="teacher-drop-down-content">
                        <a href="#">Edit Profile</a>
                        <a href="{{route('logout')}}">Logout</a>

                    </div>
                </div>

            </ul>
        </div>

    </nav>
    <!-- Sidebar  -->

    <nav id="sidebar">
        <div class="sidebar-header">
            <img class="logo" src="{{asset('images/logo/incat.png')}}" alt="">
            <strong><img width="100%" src="{{asset('images/logo/incat.png')}}" alt=""></strong>
            <strong>INCAT</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="@yield('dashboard-status')">
                <a href="{{route('teacher.dashboard')}}">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>

            <li class="@yield('mySubject-status')" >
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-book-open"></i>
                    My Subjects
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li class="@yield('mySubject-list-status')">
                        <a href="{{route('teacher.mysubject.all')}}">All Subjects</a>
                    </li>
                    <li>
                        <a href="{{route('teacher.mysubject.active.all')}}">Active Subjects</a>
                    </li>

                </ul>
            </li>


            <li class="@yield('mySection-status')" >
                <a href="#teacherSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users"></i>
                    My Sections
                </a>
                <ul class="collapse list-unstyled" id="teacherSubmenu">
                    <li class="@yield('mySection-status-all')">
                        <a href="{{route('teacher.mysection.all')}}">All Section</a>
                    </li>

                    <li class="@yield('mySection-status-active')">
                        <a href="{{route('teacher.mysection.active')}}">Active Section</a>
                    </li>
                </ul>
            </li>


        </ul>

    </nav>

    <!-- Page Content  -->
    <div id="main-content">
        <div class="content">

            @yield('contents')


        </div>
    </div>




</div>



</body>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
@yield('scripts')
<script>
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('#top-bar').toggleClass('resize');
            $('.content').toggleClass('content-resize');
        });

    });
</script>
</html>