<!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">

                <li class="treeview">
                    <a href="{{ URL::to('schedule') }}">
                        <i class="fa fa-calendar"></i> <span>Schedule</span>
                    </a>
                </li>
				<li class="treeview">
                    <a href="{{ URL::to('results') }}">
                        <i class="fa fa-flag-checkered"></i> <span>Results</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ URL::to('leaderboard') }}">
                        <i class="fa fa-usd"></i>
                        <span>Leaderboard</span>
                    </a>
                </li>
                <li class="treeview" id="sidenav-statistics">
                    <a href="{{ URL::to('statistics') }}">
                        <i class="fa fa-bar-chart"></i>
                        <span>Statistics</span>
						<i class="fa fa-angle-left pull-right"></i>
                    </a>
					<ul class="treeview-menu" >
                        <li>
                            <a href="{{ URL::to('statistics/league') }}" style="margin-left: 10px;">
                                <i class="fa fa-users"></i>
                                <span>League</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('statistics/individual') }}" style="margin-left: 10px;">
                                <i class="fa fa-user"></i>
                                <span>Individual</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('statistics/course') }}" style="margin-left: 10px;">
                                <i class="fa fa-flag"></i>
                                <span>Course</span>
                            </a>
                        </li>
                    </ul>
                </li>
                    <li class="treeview">
                    <a href="">
                        <i class="fa fa-gears"></i>
                        <span>Administration</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu" >
                        <li>
                            <a href="{{ URL::to('matches/create') }}" style="margin-left: 10px;">
                                <i class="fa fa-save"></i>
                                <span>Create Match</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('matchEdit/create') }}" style="margin-left: 10px;">
                                <i class="fa fa-pencil"></i>
                                <span>Edit Match</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('finalize/create') }}" style="margin-left: 10px;">
                                <i class="fa fa-calculator"></i>
                                <span>Finalize Match</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('administration') }}" style="margin-left: 10px;">
                                <i class="fa fa-user-plus"></i>
                                <span>Players/Courses</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
