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
                    <li><a href="#">
                            <i class="fas fa-user"></i>
                        </a></li>
                </ul>
            </div>

    </nav>
    <!-- Sidebar  -->

    <nav id="sidebar" style="overflow-y: auto">
        <div class="sidebar-header">
            <img class="logo" src="{{asset('images/logo/incat.png')}}" alt="">
            <strong><img width="100%" src="{{asset('images/logo/incat.png')}}" alt=""></strong>
            <strong>INCAT</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="@yield('dashboard-status')">
                <a href="{{route('admin.dashboard.index')}}">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>

            <li class="@yield('student-status')" >
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user-graduate"></i>
                   Students
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li class="@yield('student-list-status')">
                        <a href="{{route('admin.student.list')}}">All Students</a>
                    </li>
                    <li>
                        <a href="#">Enroll Student</a>
                    </li>
                    <li class="@yield('student-status-enlistment')">
                        <a href="{{route('admin.student.enlistment')}}">Enlistment</a>
                    </li>



                </ul>
            </li>


            <li class="@yield('teacher-status')" >
                <a href="#teacherSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-chalkboard-teacher"></i>
                   Teachers
                </a>
                <ul class="collapse list-unstyled" id="teacherSubmenu">
                    <li class="@yield('teacher-list-status')">
                        <a href="{{route('admin.teacher.list')}}">All Teacher</a>
                    </li>

                    <li class="@yield('teacher-add-status')">
                        <a href="{{route('admin.teacher.add')}}">Add Teacher</a>
                    </li>
                </ul>
            </li>


            <li class="@yield('section-status')" >
                <a href="#sectionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users"></i>
                   Sections/Subjects
                </a>
                <ul class="collapse list-unstyled" id="sectionSubmenu">
                    <li class="@yield('section-list-status')">
                        <a href="{{route('admin.section.list')}}">All Sections</a>
                    </li>

                    <li class="@yield('subject-list-status')">
                        <a href="{{route('admin.subject.list')}}">All Subjects</a>
                    </li>
                    <li class="@yield('subject-schedules-list-status')">
                        <a href="{{route('admin.subject.schedule.list')}}">Subject Schedules</a>
                    </li>

                    <li class="@yield('section-add-status')">
                        <a href="{{route('admin.section.add')}}">Add Section</a>
                    </li>
                    <li class="@yield('subject-add-status')">
                        <a href="{{route('admin.subject.add')}}">Add Subject</a>
                    </li>
                    <li class="@yield('subject-schedules-add-status')">
                        <a href="{{route('admin.subject.schedule.create')}}">Create Subject Schedules</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#">
                    <i class="fas fa-briefcase"></i>
                    About
                </a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    Pages
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
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