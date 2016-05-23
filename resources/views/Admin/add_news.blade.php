<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    @include('Admin.common.head')
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css') }}" />

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
                            <h1>Add News</h1>
                            <p>Add latest match's and player's news.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    Add New News
                                </div>
                                <div class="panel-body">
                                    {!! Form::open(array('url' => 'save_news', 'files' => true, 'method' => 'post', 'class' => 'form-horizontal bordered-row')) !!}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Headline: <i class="color_red">*</i></label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Headline..." name='headline' class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Posted By : <i class="color_red">&nbsp;</i></label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Reporter Name..." name='posted_by' class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">News Photo : <i class="color_red">*</i></label>
                                        <div class="col-sm-6">
                                            <input type="file" name='photo' class="form-control">
                                            <i>Photo standard size is width: 800px and height: 600px</i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">News Details : <i class="color_red">*</i></label>
                                        <div class="col-sm-9">
                                            <textarea id="newsDetails" name="newsDetails" class="form-control" rows="10"></textarea>
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

<script src="{{ URL::asset('assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/bootstrap-wysihtml5-hack.js') }}"></script>

    <script>
            $(function() {
                $('#newsDetails').wysihtml5();
            });
        </script>
    </body>

    <!-- END BODY -->
</html>
