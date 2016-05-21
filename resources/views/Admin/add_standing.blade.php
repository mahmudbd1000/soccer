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
                            <h1>Add Standing</h1>
                            <p>Add new standing to view team under these.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                   Add New
                                </div>
                                <div class="panel-body">
                                    {!! Form::open(array('url' => 'save_standing', 'method' => 'post', 'class' => 'form-horizontal bordered-row')) !!}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Standing Name <i class="color_red">*</i></label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Standing Name..." name='standing_name' class="form-control">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Category <i class="color_red">*</i></label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="category">
                                                <option value="">Select A Category</option>
                                                @foreach($category as $cat)
                                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
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




    </body>

    <!-- END BODY -->
</html>
