<div id="left">


    <ul id="menu" class="collapse">


        <li class="active">
            <h3>Overview</h3>
            <a href="{{URL::to('admin_dashboard')}}">
                <i class="fa fa-home"></i>
                <span>
                    Dashboard
                </span>
            </a>
            <hr>
        </li>
        <li class="">
            <h3>Settings</h3>
            <a href="javascript:;" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                <i class="fa fa-group"></i> Standings 

                <span class="pull-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
            <ul class="collapse" id="component-nav">
                <li>
                    <a href="{{ URL::to('standing_list')}}">
                        <i class="fa fa-circle-thin"></i>&nbsp;
                        Standing List
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('add_standing')}}">
                        <i class="fa fa-circle-thin"></i>&nbsp;
                        Add Standing &nbsp;<span class="label label-info">new</span>
                    </a>
                </li>
            </ul>
        </li>



        <li class="">
            <a href="javascript:;" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
                <i class="fa fa-soccer-ball-o"></i> Teams/Clubs

                <span class="pull-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
            <ul class="collapse" id="chart-nav">
                <li>
                    <a href="{{ URL::to('team_list')}}">
                        <i class="fa fa-circle-thin"></i>&nbsp;
                        Team/Club List
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('add_team')}}">
                        <i class="fa fa-plus-circle"></i>&nbsp;
                        Add Team &nbsp;<span class="label label-primary">new</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#stadium-nav">
                <i class="fa fa-map-marker"></i> Location/Stadium

                <span class="pull-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
            <ul class="collapse" id="stadium-nav">
                <li>
                    <a href="{{ URL::to('stadium_list')}}">
                        <i class="fa fa-circle-thin"></i>&nbsp;
                        Stadium/field List
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('add_stadium')}}">
                        <i class="fa fa-plus-circle"></i>&nbsp;
                        Add Stadium &nbsp;<span class="label label-primary">new</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="">
            <h3>Manage</h3>
            <a href="javascript:;" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#schedule-nav">
                <i class="fa fa-calendar"></i> Schedules & Results   

                <span class="pull-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
            <ul class="collapse" id="schedule-nav">
                <li>
                    <a href="{{ URL::to('schedule_list/1')}}">
                        <i class="fa fa-circle-thin"></i>&nbsp;
                       Standings Adultos Schedule
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('schedule_list/2')}}">
                        <i class="fa fa-circle-thin"></i>&nbsp;
                        Standings Infantils Schedule
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('add_schedule')}}">
                        <i class="fa fa-plus-circle"></i>&nbsp;
                        Add Schedule &nbsp;<span class="label label-primary">new</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</div>