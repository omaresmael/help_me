@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">اضافة معلم</h4>
                    <p class="card-category">ادخال البيانات المطلوبة</p>
                </div>
                <div class="card-body">
                    <form action="{{route('teachers.store')}}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">اسم المعلم</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" required>
                                    @if($errors->has("name"))
                                        <small style="color: red">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">التخصص</label>
                                    <input type="text" name="speciality" value="{{old('speciality')}}"class="form-control" required>
                                    @if($errors->has("speciality"))
                                        <small style="color: red">{{$errors->first('speciality')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">المؤهل</label>
                                    <input type="text" name="qualification" value="{{old('qualification')}}" class="form-control" required>
                                    @if($errors->has("qualification"))
                                        <small style="color: red">{{$errors->first('qualification')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">الوظيفة</label>
                                    <input type="text" name="job" value="{{old('job')}}" class="form-control" required>
                                    @if($errors->has("job"))
                                        <small style="color: red">{{$errors->first('job')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">الرقم المدني</label>
                                    <input type="text" name="national_number" value="{{old('national_number')}}" class="form-control" required>
                                    @if($errors->has("national_number"))
                                        <small style="color: red">{{$errors->first('national_number')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">الجنسية</label>
                                    <input type="text" name="nationality" value="{{old('nationality')}}" class="form-control" required>
                                    @if($errors->has("nationality"))
                                        <small style="color: red">{{$errors->first('nationality')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">


                                    <div class="input-group date" data-provide="datepicker">
                                        <label class="bmd-label-floating">تاريخ الميلاد</label>
                                        <input type="text" name="birth_day" value="{{old('birth_day')}}" class="form-control datepicker" required>
                                        @if($errors->has("birth_day"))
                                            <small style="color: red">{{$errors->first('birth_day')}}</small>
                                        @endif
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">رقم موافقة الهيئة</label>
                                    <input type="text" name="entity_acceptance_number" value="{{old('entity_acceptance_number')}}" class="form-control" required>
                                    @if($errors->has("entity_acceptance_number"))
                                        <small style="color: red">{{$errors->first('entity_acceptance_number')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">

                                </div>
                                <div class="input-group date" data-provide="datepicker">
                                    <label class="bmd-label-floating">تاريخ موافقة الهيئة</label>
                                    <input type="text" name="entity_acceptance_date" value="{{old('entity_acceptance_date')}}" class="form-control datepicker" required>
                                    @if($errors->has("entity_acceptance_date"))
                                        <small style="color: red">{{$errors->first('entity_acceptance_date')}}</small>
                                    @endif
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_label_single">
                                        اختر هيئة تعليمية
                                    </label>
                                    <select class="select2 form-control" id="id_label_single" name="school_id" required>
                                        @isset($schools)
                                            <option>اختر هيئة تعليمية</option>
                                        @endisset
                                        @foreach($schools as $school)

                                        <option value="{{$school->id}}">{{$school->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="float: left;">اضافة معلم</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('inc-scripts')
<script>

    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });
</script>
@endsection
