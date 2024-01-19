<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" href="/">
            <img src='https://www.facebook.com/photo/?fbid=1669646310129689&set=pob.100012530073503' alt=""/>
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow"
                   href="{{ url('/') }}">
                    <i class="nav-icon icon-xs me-2 fa fa-home"></i> Home
                </a>

            </li>


            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading text-white">Main</div>
            </li>

            <!--Nav Bar Hooks - Do not delete!!-->
            @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('teacher')))
                @can('answer-list')
                    <li class="nav-item">
                        <a href="{{ url('answers-list') }}"
                           class="nav-link {{request()->is('answers-list') ? 'active' : ''}}"><i
                                class="nav-icon icon-xs me-2 fa fa-list"></i> {{__('Kiểm Tra Đáp Án')}}</a>
                    </li>
                @endcan

                @can('question-list')
                    <li class="nav-item">
                        <a href="{{ url('questions') }}"
                           class="nav-link {{request()->is('questions') ? 'active' : ''}}"><i
                                class="nav-icon icon-xs me-2 fa fa-list"></i> {{__('Các Câu Hỏi')}}</a>
                    </li>
                @endcan
                @can('quiz-list')
                    <li class="nav-item">
                        <a href="{{ url('quizzes') }}" class="nav-link {{request()->is('quizzes') ? 'active' : ''}}"><i
                                class="nav-icon icon-xs me-2 fa fa-list"></i> {{__(' Các Bài Kiểm Tra')}}</a>
                    </li>
                @endcan
                @can('classroom-list')
                    <li class="nav-item">
                        <a href="{{ url('classrooms') }}"
                           class="nav-link {{request()->is('classrooms') ? 'active' : ''}}"><i
                                class="nav-icon icon-xs me-2 fa fa-list"></i> {{__('Các Lớp Học')}}</a>
                    </li>
                @endcan
                @can('student-list')
                    <li class="nav-item">
                        <a href="{{ url('students') }}"
                           class="nav-link {{request()->is('students') ? 'active' : ''}}"><i
                                class="nav-icon icon-xs me-2 fa fa-list"></i> {{__('Các Học Sinh')}}</a>
                    </li>
                @endcan
            @endif


            @auth
                @if (auth()->user()->hasRole('admin') && (auth()->user()->can('user-list') || auth()->user()->can('role-list')))
                    <li class="nav-item">
                        <a class="nav-link has-arrow collapsed" href="#!" data-bs-toggle="collapse"
                           data-bs-target="#navAuthentication" aria-expanded="false" aria-controls="navAuthentication">
                            <i class="nav-icon icon-xs me-2 fa fa-lock"></i>Quyền Hạn Admin
                        </a>
                        <div id="navAuthentication"
                             class="collapse {{ request()->is('admin/users') || request()->is('admin/roles') ? 'show' : '' }}"
                             data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                @can('user-list')
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/users') }}"
                                           class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                                            <i class="nav-icon fa fa-user icon-xs me-2"></i> Người Dùng
                                        </a>
                                    </li>
                                @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/roles') }}"
                                           class="nav-link {{ request()->is('admin/roles') ? 'active' : '' }}">
                                            <i class="nav-icon fa fa-user-tag icon-xs me-2"></i> Các Vai Trò
                                        </a>
                                    </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="{{ url('/admin/profile') }}"
                                       class="nav-link">
                                        <i class="nav-icon fa fa-user-tag icon-xs me-2"></i> Thông Tin Admin
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            @endauth

        </ul>

    </div>
</nav>
