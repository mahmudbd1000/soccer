<div id="loader">
    <div class="spin"></div> 
    <div class="logo">Loading...</div>
</div>
<div id="top">

    <nav class="navbar navbar-inverse">
        <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
            <i class="icon-align-justify"></i>
        </a>
        <!-- LOGO SECTION -->
        <header class="navbar-header">

            <a href="{{URL::to('admin_dashboard')}}">
                <img src="{{URL::asset('assets/img/Logo.png')}}">
                <strong class="hidden-md hidden-sm hidden-xs">
                    Admin
                    <span>
                        Application management system
                    </span>
                </strong>
            </a>
        </header>
        <!-- END LOGO SECTION -->
        <ul class="nav navbar-top-links navbar-right tooltip_notifications" >



            <!--ADMIN SETTINGS SECTIONS -->

           
            <li>
                <a  href="{{ URL::to('schedule_list/1')}}" data-toggle="tooltip" data-placement="bottom" title="Schedule of Adultos">
                    <i class="fa fa-calendar"></i>
                </a>
            </li>
            <li>
                <a  href="{{ URL::to('schedule_list/2')}}" data-toggle="tooltip" data-placement="bottom" title="Schedule of Infantils">
                    <i class="fa fa-calendar-o"></i>
                </a>
            </li>
            <li>
                <a  href="{{ URL::to('team_list')}}" data-toggle="tooltip" data-placement="bottom" title="Team list">
                    <i class="fa fa-soccer-ball-o"></i>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('standing_list')}}" data-toggle="tooltip" data-placement="bottom" title="Standing list">
                    <i class="fa fa-group"></i>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('news_list')}}" data-toggle="tooltip" data-placement="bottom" title="News">
                    <i class="fa fa-newspaper-o"></i>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin_logout')}}" data-toggle="tooltip" data-placement="bottom" title="Logout">
                    <i class="fa fa-sign-out"></i>
                </a>
            </li>
            <!--END ADMIN SETTINGS -->
        </ul>

    </nav>

</div>
@if(Session::get('error_msg'))
<script type="text/javascript">
    var msg = "{{Session::get('error_msg')}}";
    var title = "<span class='color_red'>Error in you process</span>";
    get_notification(title, msg);
</script>
@endif
@if(Session::get('success_msg'))
<script type="text/javascript">
    var msg = "{{Session::get('success_msg')}}";
    var title = "<span class='color_green'>Process success</span>";
    get_notification(title, msg);
</script>
@endif