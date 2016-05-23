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
                            <h1>Add Schedule</h1>
                            <p>Add new schedule to view match details.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    Add New Schedule
                                </div>
                                <div class="panel-body">
                                    {!! Form::open(array('url' => 'save_schedule', 'method' => 'post', 'class' => 'form-horizontal bordered-row')) !!}

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Standings <i class="color_red">*</i></label>
                                        <div class="col-sm-4">
                                            <select class="form-control standing_select" name="staning">
                                                <option value="">Select A Standing</option>
                                                @foreach($standings as $stan)
                                                <option value="{{$stan->id}}">{{$stan->standing_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Team <i class="color_red">*</i></label>
                                        <div class="col-sm-4">
                                            <select class="form-control home_team_select" name="homeTeam">
                                                <option value="">Select Home Team</option>

                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control visiting_team_select" name="visitingTeam">
                                                <option value="">Select Visiting Team</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                       
                                        <label class="col-sm-3 control-label">Stadium/Location <i class="color_red">*</i></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="stadium">
                                                <option value="">Stadium/Location</option>
                                                @foreach($stadiums as $stad)
                                                <option value="{{$stad->id}}">{{$stad->stadium_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Match Time <i class="color_red">*</i></label>
                                        <div class="col-sm-4">
                                             <div class="input-group input-append  date" id="dpYears" data-date="12-02-2012"
                                                data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                 <input class="form-control" name="matchDate" type="text" value="dd-mm-yyyy" readonly="" />
                                               <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                                           </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group bootstrap-timepicker">
                                                <input class="form-control timepicker-default" name="matchTime" type="text" />
                                                <span class="input-group-addon add-on"><i class="fa fa-clock-o"></i></span>
                                            </div>
                                        </div>
                                        
                                    </div><br><br><br>

                                    <button type="submit" class="btn btn-info btn-line pull-right">
                                        Submit
                                    </button>
                                    <div class="clearfix"></div>
                                    {{ Form::close() }}

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
        <script src="{{ URL::asset('assets/plugins/datepicker/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/timepicker/js/bootstrap-timepicker.min.js') }}"></script>
        
        <script type="text/javascript">
                    $(function(){
                        
                    //add team list in team select
                    $('.standing_select').on('change', function(){
                        
                    var standingId = $(this).val();
                    if(standingId != ""){
                        show_loader();
                            $.ajax({
                            type:'get',
                            url: "{{URL::to('get_team_name_by_standing')}}/" + standingId,
                            dataType: 'json',
                            success(data){
                                var teams = '';
                                $.each(data, function(k, v){
                                   teams += "<option value='"+v.id+"'>"+ v.team_name +"</option>"; 
                                });
                                
                                var homeTeams = "<option value=''>Select Home Team</option>"+teams;
                                $('.home_team_select').html(homeTeams);
                                
                                var visitingTeams = "<option value=''>Select Visiting Team</option>"+teams;
                                $('.visiting_team_select').html(visitingTeams);
                                hide_loader();
                            }
                            });
                        }
                    });
                    
                    //home team select
                    $('.home_team_select').on('change', function(){
                        var vTeam = $('.visiting_team_select option:selected').val();
                        if($(this).val() == vTeam){
                            alert("Visiting team is same!");
                            $(this).val("");
                        }
                    });
                    //visiting team select
                    $('.visiting_team_select').on('change', function(){
                        var hTeam = $('.home_team_select option:selected').val();
                        if($(this).val() == hTeam){
                            alert("Home team is same!");
                            $(this).val("");
                        }
                    });
                    $('#dpYears').datepicker();
                    $('.timepicker-default').timepicker();
                });
        </script>
        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

    <!-- END BODY -->
</html>
