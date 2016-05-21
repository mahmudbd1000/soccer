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
                <a  href="#">
                    <i class="fa fa-bar-chart"></i>

                </a>
            </li>
            <li>
                <a  href="#">
                    <i class="fa fa-university"></i>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('profile_setting')}}" data-toggle="tooltip" data-placement="bottom" title="Company Profile">
                    <i class="fa fa-cog"></i>
                </a>

            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user"></i>&nbsp;<i class="fa fa-angle-down"></i>
                </a>

                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="icon-user"></i> User Profile </a>
                    </li>
                    <li><a href="#"><i class="icon-gear"></i> Settings </a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="login.html"><i class="icon-signout"></i> Logout </a>
                    </li>
                </ul>

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