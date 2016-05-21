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
                            <h1>Standing List</h1>
                            <p>All standing list is showing by category</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    List of Standings Adultos
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Standing Name</th>
                                                    <th>Total Team</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($standingsAdultos as $key => $aduVal)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$aduVal->standing_name}}</td>
                                                    <td>10</td>
                                                    <td class="tooltip_notifications">

                                                        @if($aduVal->status == 1)
                                                        <a data-placement="top" data-toggle="tooltip" title="Active" class="color_green" href="{{URL::to('inactive_standing/'.$aduVal->id)}}">
                                                            <i class="fa fa-check"></i>
                                                        </a> &nbsp; | &nbsp;
                                                        @else
                                                        <a data-placement="top" data-toggle="tooltip" title="Inactive" class="color_gray" href="{{URL::to('active_standing/'.$aduVal->id)}}">
                                                            <i class="fa fa-square"></i>
                                                        </a> &nbsp; | &nbsp;
                                                        @endif
                                                        <a data-placement="top" data-toggle="tooltip" title="Edit" href="{{URL::to('edit_standing/'.$aduVal->id)}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a> &nbsp; | &nbsp;
                                                        <a data-placement="top" data-toggle="tooltip" title="Delete"  class="color_red" href="{{URL::to('delete_standing/'.$aduVal->id)}}">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    List of Standings Infantils
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Standing Name</th>
                                                    <th>Total Team</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($standingsInfantils as $key => $InfVal)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$InfVal->standing_name}}</td>
                                                    <td>10</td>
                                                    <td class="tooltip_notifications">

                                                        @if($InfVal->status == 1)
                                                        <a data-placement="top" data-toggle="tooltip" title="Active" class="color_green" href="{{URL::to('inactive_standing/'.$InfVal->id)}}">
                                                            <i class="fa fa-check"></i>
                                                        </a> &nbsp; | &nbsp;
                                                        @else
                                                        <a data-placement="top" data-toggle="tooltip" title="Inactive" class="color_gray" href="{{URL::to('active_standing/'.$InfVal->id)}}">
                                                            <i class="fa fa-square"></i>
                                                        </a> &nbsp; | &nbsp;
                                                        @endif
                                                        <a data-placement="top" data-toggle="tooltip" title="Edit" href="{{URL::to('edit_standing/'.$InfVal->id)}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a> &nbsp; | &nbsp;
                                                        <a data-placement="top" data-toggle="tooltip" title="Delete"  class="color_red" href="{{URL::to('delete_standing/'.$InfVal->id)}}">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
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

    </body>

    <!-- END BODY -->
</html>
