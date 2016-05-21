<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
        @include('Admin.common.head')

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="padTop53">

        <!-- MAIN WRAPPER -->
        <div id="wrap">

            <div class=" col-lg-4 col-md-4 col-sm-5 col-xs-8 login_form_wrap">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Enter your username and password
                    </div>
                    <div class="panel-body">
                        <form action="{{URL::to('admin_login')}}" method="post">
                            <input type="hidden" value="{{csrf_token()}}" name="_token">

                            <input type="text" name="username" placeholder="Username" class="form-control" />
                            <input type="password" name="password" placeholder="Password" class="form-control" />
                            <button class="btn text-muted text-center btn-danger pull-right" type="submit">Sign in</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

        <!--END MAIN WRAPPER -->

        <!-- FOOTER -->
        @include('Admin.common.footer')
        <!--END FOOTER -->


    </body>

    <!-- END BODY -->
</html>
