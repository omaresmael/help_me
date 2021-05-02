@extends('layouts.app-layout')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
            <i class="material-icons">person</i>
            </div>
            <p class="card-category">عدد المعلمين</p>
            <h3 class="card-title">{{$teachers}}
            </h3>
        </div>
        <div class="card-footer">
            <div class="stats">
            <i class="material-icons">update</i> الاجمالى ({{$teachers}})
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
            <i class="material-icons">add_task</i>
            </div>
            <p class="card-category">عدد الجلسات</p>
            <h3 class="card-title">{{$sittings}}</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
            <i class="material-icons">update</i> انجزت  (10)
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
            <i class="fa fa-star"></i>
            </div>
            <p class="card-category">عدد التقيمات</p>
            <h3 class="card-title">75</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
            <i class="material-icons">update</i> الاجمالى (10)
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
            <i class="fa fa-child"></i>
            </div>
            <p class="card-category">عدد الاطفال</p>
            <h3 class="card-title">{{$students}}</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
            <i class="material-icons">update</i> الاجمالى ({{$students}})
            </div>
        </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="{{route('students.create')}}">
            <div class="card card-chart">
            <div class="card-header card-header-success">
                <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
                <img src="../assets/img/children.png">
            </div>
            <div class="card-body">
                <h3 class="card-title"> اضافة طلاب </h3>
            </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{route('schools.create')}}">
            <div class="card card-chart">
            <div class="card-header card-header-danger">
                <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
                <img src="../assets/img/school.png">
            </div>
            <div class="card-body">
                <h3 class="card-title"> اضافه هيئة تعليمية </h3>
            </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{route('programs.create')}}">
            <div class="card card-chart">
            <div class="card-header card-header-warning">
                <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
                <img src="../assets/img/program.png">
            </div>
            <div class="card-body">
                <h3 class="card-title"> اضافة برنامج </h3>
            </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{route('teachers.create')}}">
            <div class="card card-chart">
            <div class="card-header card-header-warning">
                <img src="../assets/img/classroom.png">
            </div>
            <div class="card-body">
                <h3 class="card-title"> اضافة معلم </h3>
            </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{route('periods.create')}}">
        <div class="card card-chart">
        <div class="card-header card-header-success">
            <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
            <img src="../assets/img/payment-method.png">
        </div>
        <div class="card-body">
            <h3 class="card-title"> اضافة دفعات </h3>
        </div>
        </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{route('fines.create')}}">
        <div class="card card-chart">
        <div class="card-header card-header-danger">
            <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
            <img src="../assets/img/taxes.png">
        </div>
        <div class="card-body">
            <h3 class="card-title"> اضافه جزاءات </h3>
        </div>
        </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{route('sittings.create')}}">
        <div class="card card-chart">
        <div class="card-header card-header-danger">
            <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
            <img src="../assets/img/sitting.png" height="130px">
        </div>
        <div class="card-body">
            <h3 class="card-title"> اضافة جلسات </h3>
        </div>
        </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{route('absence.create')}}">

        <div class="card card-chart">
        <div class="card-header card-header-warning">
            <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
            <img src="../assets/img/attendance.png" height="130px">
        </div>
        <div class="card-body">

            <h3 class="card-title"> الحضور والغياب </h3>
        </div>
        </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{route('users.create')}}">
            <div class="card card-chart">
            <div class="card-header card-header-success">
                <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
                <img src="../assets/img/user.png" height="130px">
            </div>
            <div class="card-body">
                <h3 class="card-title"> اضافة مختص</h3>
            </div>
            </div>
        </a>
    </div>
</div>
<div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            جميع التقارير
        </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <a href="Add-children.html">
                    <div class="card card-chart">
                        <div class="card-header card-header-success">
                            <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
                            <img src="../assets/img/children.png" style="width: 45px;">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title card-title-2">تقرير الاطفال </h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="Add-school.html">
                    <div class="card card-chart">
                        <div class="card-header card-header-danger">
                            <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
                            <img src="../assets/img/school.png" style="width: 45px;">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title card-title-2">احصائيات عامة</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="Add-classrom.html">
                    <div class="card card-chart">
                        <div class="card-header card-header-warning">
                            <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
                            <img src="../assets/img/classroom.png" style="width: 45px;">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title card-title-2">تقرير الجلسات </h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <div class="card card-chart">
                    <div class="card-header card-header-success">
                        <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
                        <img src="../assets/img/payment-method.png" style="width: 45px;">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title card-title-2"> تقرير المستخدمين </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title">Tasks:</span>
                <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#profile" data-toggle="tab">
                    <i class="material-icons">bug_report</i> Bugs
                    <div class="ripple-container"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#messages" data-toggle="tab">
                    <i class="material-icons">code</i> Website
                    <div class="ripple-container"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#settings" data-toggle="tab">
                    <i class="material-icons">cloud</i> Server
                    <div class="ripple-container"></div>
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
            <div class="tab-pane active" id="profile">
                <table class="table">
                <tbody>
                    <tr>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </td>
                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                        </button>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </td>
                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                        </button>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </td>
                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                    </td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                        </button>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </td>
                    <td>Create 4 Invisible User Experiences you Never Knew About</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                        </button>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="tab-pane" id="messages">
                <table class="table">
                <tbody>
                    <tr>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </td>
                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                    </td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                        </button>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </td>
                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                        </button>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="tab-pane" id="settings">
                <table class="table">
                <tbody>
                    <tr>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </td>
                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                        </button>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </td>
                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                    </td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                        </button>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                        </div>
                    </td>
                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                        </button>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title">Employees Stats</h4>
            <p class="card-category">New employees on 15th September, 2016</p>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
            <thead class="text-warning">
                <th>ID</th>
                <th>Name</th>
                <th>Salary</th>
                <th>Country</th>
            </thead>
            <tbody>
                <tr>
                <td>1</td>
                <td>Dakota Rice</td>
                <td>$36,738</td>
                <td>Niger</td>
                </tr>
                <tr>
                <td>2</td>
                <td>Minerva Hooper</td>
                <td>$23,789</td>
                <td>Curaçao</td>
                </tr>
                <tr>
                <td>3</td>
                <td>Sage Rodriguez</td>
                <td>$56,142</td>
                <td>Netherlands</td>
                </tr>
                <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>
</div>
@endsection
@section('inc-scripts')
<script>
$(function() {
  $('#dashboard').addClass('active');
});
</script>
@endsection
