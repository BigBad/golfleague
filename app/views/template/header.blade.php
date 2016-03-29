<header class="main-header">
        <a href="{{ URL::to('schedule') }}" class="logo"><b>Four Loko</b> League</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
                <a id="leaderboard" data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                  <i class="fa fa-trophy"></i>
                </a>
                <ul class="dropdown-menu ">
                  <li class="header"><h4>Leaderboards</h4>  </li>
                  <li>
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; ">
                                <div class="slimScrollBar" style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                  <div class="box box-success box-solid">
                                <div class="box-header">
                                  <h3 class="box-title">Gross <a class="fa fa-thumbs-o-up"></a></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                        <table id="grossTable" class="display table table-condensed">
                                                <thead>
                                                        <tr>
                                                          <th>Player</th>
                                                          <th style="width: 60px">Score</th>
                                                        </tr>
                                                </thead>
                                                <tbody></tbody>
                                        </table>
                                </div><!-- /.box-body -->
                              </div>
                        </div>

                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; ">
                        <div class="slimScrollBar" style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                        <div class="box box-success box-solid">
                        <div class="box-header">
                          <h3 class="box-title">Net <a class="fa fa-wheelchair"></a></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                                <table id="netTable" class="display table table-condensed">
                                        <thead>
                                                <tr>
                                                  <th>Player</th>
                                                  <th style="width: 60px">Score</th>
                                                </tr>
                                        </thead>
                                        <tbody></tbody>
                                </table>
                        </div><!-- /.box-body -->
                      </div>
                </div>
                   </li>

                </ul>
                </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>