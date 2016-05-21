<!DOCTYPE html>
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
                            <h1>Schedule of {{$category}}</h1>
                            <p>Schedule and result by standing's category</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong class="color_bluegreen">
                                        Upcoming Match Schedule
                                    </strong>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Match time</th>
                                                    <th>Teams</th>
                                                    <th>Stadium/Location</th>
                                                    <th>Home team goals</th>
                                                    <th>Visiting team goals</th>
                                                    <th>Result Update</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            
                            
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong class="color_bluegreen">
                                        Completed Match Schedule
                                    </strong>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTableCompleted">
                                            <thead>
                                                <tr>
                                                    <th>Match time</th>
                                                    <th>Teams</th>
                                                    <th>Stadium/Location</th>
                                                    <th>Home team goals</th>
                                                    <th>Visiting team goals</th>
                                                    <th>Result Update</th>
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
        <script type="text/javascript">

                    $(function () {
                    $('#dataTable').dataTable(
                    {
                            "pageLength": 25,
                            "searchDelay": 1750,
                            "bSort" : false,
                            "processing": true,
                            "serverSide": true,
                            "ajax": {
                            "url": "{{URL::to('get_schedule_list_ajax/1/'.$categoryId)}}",
                                    "type": "POST",
                                    "data": function (d) {
                                    d._token = '{{csrf_token()}}';
                                    }
                            },
                            "columns": [
                            { "data": "dateTime" },
                            { "data": "TeamInfo" },
                            { "data": "stadium" },
                            { "data": "homeRes" },
                            { "data": "visitingRes" },
                            { "data": "update" },
                            { "data": "action" }
                            ]
                    }


                    );
                    $('#dataTableCompleted').dataTable(
                    {
                            "pageLength": 25,
                            "searchDelay": 1750,
                            "bSort" : false,
                            "processing": true,
                            "serverSide": true,
                            "ajax": {
                            "url": "{{URL::to('get_schedule_list_ajax/2/'.$categoryId)}}",
                                    "type": "POST",
                                    "data": function (d) {
                                    d._token = '{{csrf_token()}}';
                                    }
                            },
                            "columns": [
                            { "data": "dateTime" },
                            { "data": "TeamInfo" },
                            { "data": "stadium" },
                            { "data": "homeRes" },
                            { "data": "visitingRes" },
                            { "data": "update" },
                            { "data": "action" }
                            ]
                    }


                    );
            $('.table-responsive table').on('click', '.update_match_result', function(){
                
               var scheduleId = $(this).addClass("save_match_result").html('Save');
              $(this).parents('tr').find('.home_goal_input').removeAttr('disabled');
               $(this).parents('tr').find('.visiting_goal_input').removeAttr('disabled');
               return false;
            });
            $('.table-responsive table').on('click', '.save_match_result', function(){
                show_loader();
               $(this).removeClass("save_match_result").html('Update');
               var scheduleId = $(this).attr('href');
               
               var hGoalInput = $(this).parents('tr').find('.home_goal_input');
               var hGoal = hGoalInput.val();
               hGoalInput.attr('disabled', 'disabled');
               
               var vGoalInput = $(this).parents('tr').find('.visiting_goal_input');
               var vGoal = vGoalInput.val();
               vGoalInput.attr('disabled', 'disabled');
               $.ajax({
                    type:'post',
                    url: "{{URL::to('save_schedule_result_ajax')}}",
                    dataType: 'json',
                    data: {
                       "_token": "{{csrf_token()}}",
                       "hGoal": hGoal,
                       "vGoal": vGoal,
                       "scheduleId": scheduleId
                    },
                    success(data){
                        hide_loader();
                    }
                });
               return false;
            });
    });
        </script>
        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

    <!-- END BODY -->
</html>
