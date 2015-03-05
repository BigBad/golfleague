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
                    <a href="{{ URL::to('leaderboard') }}">
                        <i class="fa fa-money"></i>
                        <span>Leaderboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ URL::to('statistics') }}">
                        <i class="fa fa-pie-chart"></i>
                        <span>Statistics</span>
                    </a>
                </li>
                    <li class="treeview">
                    <a href="">
                        <i class="fa fa-gears"></i>
                        <span>Administration</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ URL::to('matches/create') }}">Create Match</a></li>
                        <li><a href="{{ URL::to('administration') }}">Add Players</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
