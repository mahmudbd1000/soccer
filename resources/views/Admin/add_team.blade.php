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
                            <h1>Add Team</h1>
                            <p>Add new team to view schedules and results.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    Add New
                                </div>
                                <div class="panel-body">
                                    {!! Form::open(array('url' => 'save_team', 'method' => 'post', 'class' => 'form-horizontal bordered-row')) !!}
                                    <div class="form-group team_name">
                                        <label class="col-sm-3 control-label">Team Name <i class="color_red">*</i></label>
                                        <div class="col-sm-6 input_wrap">
                                            <div class="name_wrap">
                                                <input type="text" placeholder="Team Name..." name='team_name[]' class="form-control">
                                                <span class="pull-right">
                                                    <a href="javascript:;" class="add_team_name color_green">
                                                        <i class="fa fa-plus-square-o"></i>
                                                    </a>   
                                                </span>

                                            </div>

                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Category <i class="color_red">*</i></label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="standings">
                                                <option value="">Select A Group</option>
                                                <?php
                                                $category = 0;
                                                $catName = array(1 => 'Standings Adultos', 2 => 'Standings Infantils');
                                                ?>
                                                @foreach($standings as $key => $cat)
                                                <?php
                                                if($category != $cat->category_id){
                                                    if($key != 0){
                                                        echo "</optgroup>";
                                                    }
                                                    echo "<optgroup label='".$catName[$cat->category_id]."'>";
                                                    
                                                }
                                               
                                                ?>
                                                <option value="{{$cat->id}}">&nbsp;&nbsp;{{$cat->standing_name}}</option>
                                                
                                                <?php
                                                 $category = $cat->category_id;
                                                ?>
                                                


                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Status <i class="color_red">*</i></label>
                                        <div class="col-sm-6">
                                            <label class="radio-inline">
                                                <input checked="checked" type="radio" value="1" name="status">
                                                Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" value="0" name="status">
                                                Inactive
                                            </label>


                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-line pull-right">
                                        Submit
                                    </button>
                                    <div class="clearfix"></div>
                                    {{ Form::close() }}
                                    
                                    <div class="team_name_input hidden">
                                        <div class="name_wrap">
                                            <input type="text" placeholder="Team Name..." name='team_name[]' class="form-control">
                                            <span class="pull-right">
                                                <a href="javascript:;" class="add_team_name color_green">
                                                    <i class="fa fa-plus-square-o"></i>
                                                </a>
                                                <a href="javascript:;" class="remove_team_name color_red">
                                                    <i class="fa fa-minus-square-o"></i>
                                                </a>
                                            </span>

                                        </div>
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
        <script type="text/javascript">
                    $(function(){
                    $('.team_name').on('click', '.add_team_name', function(){
                    var input = $('.team_name_input').html();
                            $('.team_name .input_wrap').append(input);
                            return false;
                    });
                            $('.team_name').on('click', '.remove_team_name', function(){
                    $(this).parents('.name_wrap').remove();
                            return false;
                    });
                    })
        </script>
        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

    <!-- END BODY -->
</html>
