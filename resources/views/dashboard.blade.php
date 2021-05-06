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
            <h3 class="card-title">0</h3>
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
            <a href="{{route('schools.finance.report')}}">
                <div class="card card-chart">
                    <div class="card-header card-header-success">
                        <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
                        <img src="../assets/img/payment-method.png" style="width: 45px;">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title card-title-2">التقرير المالي المجمع </h3>
                    </div>
                </div>
            </a>
            </div>
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
