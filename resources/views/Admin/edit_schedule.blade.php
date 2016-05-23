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
                            <h1>Edit Schedule</h1>
                            <p>Edit/Update schedule.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    Edit Schedule
                                </div>
                                <div class="panel-body">
                                    {!! Form::open(array('url' => 'update_schedule', 'method' => 'post', 'class' => 'form-horizontal bordered-row')) !!}
                                    <input type="hidden" value="{{ $catId }}" name="catId">
                                    <input type="hidden" value="{{ $schedule->id }}" name="scheduleId">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Standings <i class="color_red">*</i></label>
                                        <div class="col-sm-4">
                                            <select class="form-control standing_select" name="staning">
                                                <option value="">Select A Standing</option>
                                                @foreach($standings as $stan)
                                                <?php
                                                $schSelected = "";
                                                if($schedule->standing_id == $stan->id){
                                                   $schSelected = "selected='selected'"; 
                                                }
                                                ?>
                                                <option {{$schSelected}} value="{{$stan->id}}">{{$stan->standing_name}}</option>
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
                                                <?php
                                                $stdSelected = "";
                                                if($schedule->stadium_id == $stad->id){
                                                   $stdSelected = "selected='selected'"; 
                                                }
                                                ?>
                                                <option {{$stdSelected}} value="{{$stad->id}}">{{$stad->stadium_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Match Time <i class="color_red">*</i></label>
                                        <div class="col-sm-4">
                                             <div class="input-group input-append  date" id="dpYears" data-date="12-02-2012"
                                                data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                 <input class="form-control" name="matchDate" type="text" value="{{date('d-m-Y', strtotime($schedule->match_date))}}" />
                                               <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                                           </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group bootstrap-timepicker">
                                                <input class="form-control timepicker-default" value="{{date('h:i A', strtotime($schedule->match_time))}}" name="matchTime" type="text" />
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
                        var editStandingId = "<?php echo $schedule->standing_id ?>";
                        var editHomeTeam = "<?php echo $schedule->home_team_id ?>";
                        var editVTeam = "<?php echo $schedule->visiting_team_id ?>";
                        get_team_list(editStandingId, editHomeTeam, editVTeam);
                        
                    //add team list in team select
                    $('.standing_select').on('change', function(){
                        
                        var standingId = $(this).val();
                        if(standingId != ""){
                            get_team_list(standingId, editHomeTeam, editVTeam);
                        }
                    });
                    
                    function get_team_list(standingId, editHomeTeam, editVTeam){
                        show_loader();
                        $.ajax({
                        type:'get',
                        url: "{{URL::to('get_team_name_by_standing')}}/" + standingId,
                        dataType: 'json',
                        success(data){
                            var hteams = '';
                            $.each(data, function(k, v){
                                var slt = '';
                                if(v.id == editHomeTeam){
                                    slt = "selected='selected'";
                                }
                               hteams += "<option "+slt+" value='"+v.id+"'>"+ v.team_name +"</option>"; 
                            });
                            
                            var vteams = '';
                            $.each(data, function(k, v){
                                var slt = '';
                                if(v.id == editVTeam){
                                    slt = "selected='selected'";
                                }
                               vteams += "<option "+slt+" value='"+v.id+"'>"+ v.team_name +"</option>"; 
                            });

                            var homeTeams = "<option value=''>Select Home Team</option>"+hteams;
                            $('.home_team_select').html(homeTeams);

                            var visitingTeams = "<option value=''>Select Visiting Team</option>"+vteams;
                            $('.visiting_team_select').html(visitingTeams);
                            hide_loader();
                        }
                        });
                    }
                    
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
