﻿<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    @include('Admin.common.head')
    <link href="{{URL::asset('assets/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="padTop53">

        <!-- MAIN WRAPPER -->
        <div id="wrap">

            <!-- HEADER SECTION -->
            @include('Admin.common.header')
            <!-- END HEADER SECTION -->


            <!-- MENU SECTION -->
            @include('Admin.common.menu')
            <!--END MENU SECTION -->



            <!--PAGE CONTENT -->
            <div id="content">

                <div class="inner">
                    <div class="row">
                        <div class="col-lg-12 page_title_head">
                            <h1>Team List</h1>
                            <p>All Team list is showing by standing</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="teamList">
                                            <thead>
                                                <tr>
                                                    <th>Team</th>
                                                    <th>Standing</th>
                                                    <th>Won</th>
                                                    <th>Lost</th>
                                                    <th>tied</th>
                                                    <th>GF</th>
                                                    <th>GA</th>
                                                    <th>Diff</th>
                                                    <th>Points</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <!--END PAGE CONTENT -->

        </div>

        <!--END MAIN WRAPPER -->

        <!-- FOOTER -->
        @include('Admin.common.footer')
        <!--END FOOTER -->

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="{{URL::asset('assets/plugins/dataTables/jquery.dataTables.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
        {{URL::to('get_team_list_ajax')}}
        <script type="text/javascript">

                    $(function () {
                    $('#teamList').dataTable(
                    {
                            "pageLength": 10,
                            "searchDelay": 1750,
                            "bSort" : false,
                            "processing": true,
                            "serverSide": true,
                            "ajax": {
                            "url": "{{URL::to('get_team_list_ajax')}}",
                                    "type": "POST",
                                    "data": function (d) {
                                    d._token = '{{csrf_token()}}';
                                    }
                            },
                            "columns": [
                            { "data": "team_name" },
                            { "data": "standing" },
                            { "data": "won" },
                            { "data": "lost" },
                            { "data": "tied" },
                            { "data": "gf" },
                            { "data": "ga" },
                            { "data": "diff" },
                            { "data": "points" },
                            { "data": "action" }
                            ]
                    }


                    );
                    });
        </script>
        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

    <!-- END BODY -->
</html>
