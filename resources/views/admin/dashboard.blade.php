@extends('layouts.app')

@section('content')
    {{--main--}}


    <div class="block-header">
        <h2>Dashboard</h2>
        <small class="text-muted">Welcome to Arko application</small>
    </div><!-- /.block-header -->

    <div class="row top-report">
        <div class="col-md-3">
            <div class="card card-blue">
                <div class="card-panel">
                    <div class="card-left">
                        <span>New Patient</span>
                        <h3>27/13456</h3>
                    </div>
                    <div class="card-right card-icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div><!-- /.card -->
        </div><!-- /.col-md-3 -->
        <div class="col-md-3">
            <div class="card card-pink">
                <div class="card-panel">
                    <div class="card-left">
                        <span>CPD Patient</span>
                        <h3>22</h3>
                    </div>
                    <div class="card-right card-icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div><!-- /.card -->
        </div><!-- /.col-md-3 -->
        <div class="col-md-3">
            <div class="card card-green">
                <div class="card-panel">
                    <div class="card-left">
                        <span>Today's Appointment</span>
                        <h3>27</h3>
                    </div>
                    <div class="card-right card-icon">
                        <i class="fa fa-bug"></i>
                    </div>
                </div>
            </div><!-- /.card -->
        </div><!-- /.col-md-3 -->
        <div class="col-md-3">
            <div class="card card-orange">
                <div class="card-panel">
                    <div class="card-left">
                        <span>Active Doctors</span>
                        <h3>76</h3>
                    </div>
                    <div class="card-right card-icon">
                        <i class="fa fa-user-md"></i>
                    </div>
                </div>
            </div><!-- /.card -->
        </div><!-- /.col-md-3 -->
    </div><!-- /.top-report -->


    <div class="row report-chart">

        <div class="col-md-12">

            <div class="card">
                <div class="header">
                    <h2>Patient Health Progress Rate</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.header -->
                <div class="body">
                    <canvas id="healthProgress" width="900" height="250"></canvas>
                </div>
            </div><!-- /.card -->

        </div><!-- /.col-md-12 -->

        <div class="col-md-4">

            <div class="card">
                <div class="header">
                    <h2>New Patient <small>18% High Then Last Month</small></h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.header -->
                <div class="body">
                    <div class="stats-report">
                        <div class="stat-item">
                            <h5>Overall</h5>
                            <b class="color-blue">70.40%</b>
                        </div>
                        <div class="stat-item">
                            <h5>Montly</h5>
                            <b class="color-blue">25.80%</b>
                        </div>
                        <div class="stat-item">
                            <h5>Day</h5>
                            <b class="color-blue">12.50%</b>
                        </div>
                    </div>
                    <div id="newPatient" class="sparkline" sparkType="bar" sparkBarColor="green"><!-- 1,2,3,4 --></div>
                </div>
            </div><!-- /.card -->

        </div><!-- /.col-md-4 -->

        <div class="col-md-4">

            <div class="card">
                <div class="header">
                    <h2>Orthopedic Surgeries <small>18% High Then Last Month</small></h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.header -->
                <div class="body">
                    <div class="stats-report">
                        <div class="stat-item">
                            <h5>Overall</h5>
                            <b class="color-blue">70.40%</b>
                        </div>
                        <div class="stat-item">
                            <h5>Montly</h5>
                            <b class="color-blue">25.80%</b>
                        </div>
                        <div class="stat-item">
                            <h5>Day</h5>
                            <b class="color-blue">12.50%</b>
                        </div>
                    </div>
                    <div id="orthoSurgeries" class="sparkline" sparkType="bar" sparkBarColor="blue"><!-- 1,2,3,4 --></div>
                </div>
            </div><!-- /.card -->

        </div><!-- /.col-md-4 -->

        <div class="col-md-4">

            <div class="card">
                <div class="header">
                    <h2>Medical Treatment <small>18% High Then Last Month</small></h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.header -->
                <div class="body">
                    <div class="stats-report">
                        <div class="stat-item">
                            <h5>Overall</h5>
                            <b class="color-blue">70.40%</b>
                        </div>
                        <div class="stat-item">
                            <h5>Montly</h5>
                            <b class="color-blue">25.80%</b>
                        </div>
                        <div class="stat-item">
                            <h5>Day</h5>
                            <b class="color-blue">12.50%</b>
                        </div>
                    </div>
                    <div id="medicalTreatment" class="sparkline" sparkType="bar" sparkBarColor="pink"><!-- 1,2,3,4 --></div>
                </div>
            </div><!-- /.card -->

        </div><!-- /.col-md-4 -->

    </div><!-- /.report-chart -->

    <div class="row patient-list">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>New Patient List <small>18% High then last month</small></h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.header -->
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Diseases</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Virginia</td>
                                <td>Rose</td>
                                <td>@Rose</td>
                                <td><span class="label bg-green">Fever</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Virginia</td>
                                <td>Rose</td>
                                <td>@Rose</td>
                                <td><span class="label bg-blue">Cancer</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Virginia</td>
                                <td>Rose</td>
                                <td>@Rose</td>
                                <td><span class="label bg-pink">Lakva</span></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Virginia</td>
                                <td>Rose</td>
                                <td>@Rose</td>
                                <td><span class="label bg-green">Dental</span></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Virginia</td>
                                <td>Rose</td>
                                <td>@Rose</td>
                                <td><span class="label bg-red">Cancer</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div><!-- /.body -->
            </div>
        </div>
    </div><!-- /.patient-list -->

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h2>Patient Reports</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <table class="table table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Charts</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Dean Otto</td>
                            <td>
                                <span class="sparklines" sparkType="bar"><!-- 5,8,6,3,5,9,2 --></span>
                            </td>
                        </tr>
                        <tr>
                            <td>K. Thornton</td>
                            <td>
                                <span class="sparklines" sparkType="bar"><!-- 5,2,3,1,3,1,3 --></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Kane D.</td>
                            <td>
                                <span class="sparklines" sparkType="bar"><!-- 3,2,3,2,3,5,1 --></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Jack Bird</td>
                            <td>
                                <span class="sparklines" sparkType="bar"><!-- 4,2,1,4,3,2,5 --></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Hughe L.</td>
                            <td>
                                <span class="sparklines" sparkType="bar"><!-- 1,6,3,4,1,2,1 --></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Jack Bird</td>
                            <td>
                                <span class="sparklines" sparkType="bar"><!-- 1,2,3,4,3,2,1 --></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Hughe L.</td>
                            <td>
                                <span class="sparklines" sparkType="bar"><!-- 1,4,3,2,3,1,5 --></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.col-md-4 -->

        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h2>Visits From Countries</h2>
                    <ul class="header-dropdown">
                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <ul class="basic-list">
                        <li>
                            <div><strong>6350</strong></div>
                            <span>From India</span>
                            <span class="pull-right">68%</span>
                            <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="68" type="info">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                            </div>
                        </li>
                        <li>
                            <div><strong>6350</strong></div>
                            <span>From UAE</span>
                            <span class="pull-right">90%</span>
                            <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="90" type="success">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                        </li>
                        <li>
                            <div><strong>6350</strong></div>
                            <span>From Australia</span>
                            <span class="pull-right">70%</span>
                            <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="70" type="info">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                            </div>
                        </li>
                        <li>
                            <div><strong>6350</strong></div>
                            <span>From USA</span>
                            <span class="pull-right">60%</span>
                            <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="60" type="info">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- /.card -->
        </div><!-- /.col-md-4 -->
        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h2>Individual Patient Progress</h2>
                    <ul class="header-dropdown">
                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <ul class="basic-list">
                        <li>Mark Otto <span class="pull-right label-danger label">21%</span></li>
                        <li>Jacob Thornton <span class="pull-right label-purple label">50%</span></li>
                        <li>Jacob Thornton<span class="pull-right label-success label">90%</span></li>
                        <li>M. Arthur <span class="pull-right label-info label">75%</span></li>
                        <li>Jacob Thornton <span class="pull-right label-warning label">60%</span></li>
                        <li>M. Arthur <span class="pull-right label-success label">91%</span></li>
                    </ul>
                </div>
            </div>
        </div><!-- /.col-md-4 -->

    </div>


    {{--main ends--}}


{{--<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Your application's dashboard.
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
