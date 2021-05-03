@extends('layouts.app-layout')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">بيانات الطالب</h4>
                            <p class="card-category">البيانات المعروضة</p>
                        </div>
                        <div class="card-body">
                            <div class="row" style="justify-content: center;
            margin-bottom: 12px;">
                                @if($student->school())
                                <a href="{{route('school.show',$student->school()->id)}}"><button class="btn btn-primary">
                                        <i class="fa fa-child"></i>الهيئة التعليمية
                                    </button></a>
                                @endif
{{--                                add the relation in the model / add the view --}}
                                <a href="{{route('school.sittings.report',$student->id)}}"><button class="btn  btn-default">
                                        <i class="fa fa-tasks"></i> الحصص
                                    </button></a>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-right boxiing-shado">

                                    <label class="bmd-label-floating">الاسم</label>
                                    <h4 class="card-title"><strong>{{$student->name}}</strong></h4>

                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الرقم المدني</label>
                                        <h4 class="card-title"><strong> 	{{$student->national_number}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-2 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">تاريخ الميلاد</label>
                                        <h4 class="card-title"><strong> 	{{$student->dateOfBirth}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-2 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">النوع</label>
                                        <h4 class="card-title"><strong> 	{{$student->gender}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">اسم ولي الأمر</label>
                                        <h4 class="card-title"><strong> 	{{$student->guardian_name}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الرقم المدني لولي الأمر</label>
                                        <h4 class="card-title"><strong> {{$student->guardian_national_number}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الإميل</label>
                                        <h4 class="card-title"><strong> 	{{$student->email}}</strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">اسم الهيئة التعليمية</label>
                                        <h4 class="card-title"><strong> {{$student->school()?$student->school()->name:'لم يتم إسناده إلى هيئة تعليمية حتى الآن'}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">البرنامج</label>
                                        <h4 class="card-title"><strong> {{$student->school()?$student->program()[1]->name:'لم يتم إسناده إلى برنامج حتى الآن'}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">بداية الدوام</label>
                                        <h4 class="card-title"><strong> {{$student->attendance_begin}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <label class="bmd-label-floating">نهاية الدوام</label>
                                    <h4 class="card-title"><strong> {{$student->attendance_end}} </strong></h4>

                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">نوع الإعاقة</label>
                                        <h4 class="card-title"><strong>{{$student->disability_type}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <label class="bmd-label-floating">شدة الإعاقة</label>
                                    <h4 class="card-title"><strong>{{$student->disability_power}}</strong></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('inc-scripts')
    <script>
        $(function() {
            $('#students').addClass('active');
        });
    </script>
@endsection
