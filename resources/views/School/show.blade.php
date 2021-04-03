@extends('layouts.app-layout')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">بيانات المدرسة</h4>
                            <p class="card-category">البيانات المعروضة</p>
                        </div>
                        <div class="card-body">
                            <div class="row" style="justify-content: center;
            margin-bottom: 12px;">
                                <a href="{{route('school.students.report',$school->id)}}"><button class="btn btn-primary">
                                    <i class="fa fa-child"></i> الطلاب
                                </button></a>
                                <a href="{{route('school.teachers.report',$school->id)}}"><button class="btn btn-info">
                                    <i class="material-icons">person</i> المعلمين
                                </button></a>
                                <a href="{{route('school.sittings.report',$school->id)}}"><button class="btn  btn-default">
                                    <i class="fa fa-tasks"></i> الحصص
                                    </button></a>
                                <a href="{{route('school.programs.report',$school->id)}}"><button class="btn btn-warning">
                                    <i class="fa fa-bookmark"></i> البرامج
                                    </button></a>
                                <a href="{{route('school.periods.report',$school->id)}}"><button class="btn btn-danger">
                                        <i class="fa fa-bookmark"></i>الدفعات
                                    </button></a>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-right boxiing-shado">

                                    <label class="bmd-label-floating">الكود</label>
                                    <h4 class="card-title"><strong>{{$school->code}}</strong></h4>

                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الاسم باللغة العربية</label>
                                        <h4 class="card-title"><strong> 	{{$school->name}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الاسم باللغة الانجليزية</label>
                                        <h4 class="card-title"><strong> 	{{$school->name_english}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">المرحلة</label>
                                        <h4 class="card-title"><strong> {{$school->stage}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">العنوان</label>
                                        <h4 class="card-title"><strong> 	{{$school->address}}</strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">التليفون</label>
                                        <h4 class="card-title"><strong> {{$school->phone_number}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الفاكس</label>
                                        <h4 class="card-title"><strong> {{$school->fax_number}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الايميل</label>
                                        <h4 class="card-title"><strong> {{$school->email}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <label class="bmd-label-floating">نوع المدرسة</label>
                                    <h4 class="card-title"><strong> {{$school->type}} </strong></h4>

                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">نوع الترخيص</label>
                                        <h4 class="card-title"><strong>{{$school->licence_type}} </strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <label class="bmd-label-floating">البلد</label>
                                    <h4 class="card-title"><strong>{{$school->country}}</strong></h4>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <label class="bmd-label-floating">المدينة</label>
                                    <h4 class="card-title"><strong> {{$school->city}}</strong></h4>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">المنطقة</label>
                                        <h4 class="card-title"><strong> {{$school->area}}</strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">القطعة</label>
                                        <h4 class="card-title"><strong> {{$school->part}}</strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الشارع</label>
                                        <h4 class="card-title"><strong> {{$school->street}}</strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">بيانات الموقع الجغرافى</label>
                                        <h4 class="card-title"><strong> {{$school->geolocaion}}</strong></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right boxiing-shado">
                                    <label class="bmd-label-floating">مدير الادارة</label>
                                    <h4 class="card-title"><strong>عبد الصمد</strong></h4>
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
            $('#schools').addClass('active');
        });
    </script>
@endsection
