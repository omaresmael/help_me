@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">تعديل معلم</h4>
                    <p class="card-category">ادخال البيانات المطلوبة</p>
                </div>
                <div class="card-body">
                    <form action="{{route('teachers.update', $teacher->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">اسم المعلم</label>
                                    <input type="text" name="name" value="{{$teacher->name}}" class="form-control" required>
                                    @if($errors->has("name"))
                                        <small style="color: red">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">التخصص</label>
                                    <input type="text" name="speciality" value="{{$teacher->speciality}}"class="form-control" required>
                                    @if($errors->has("speciality"))
                                        <small style="color: red">{{$errors->first('speciality')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">المؤهل</label>
                                    <input type="text" name="qualification" value="{{$teacher->qualification}}" class="form-control" required>
                                    @if($errors->has("qualification"))
                                        <small style="color: red">{{$errors->first('qualification')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">الوظيفة</label>
                                    <input type="text" name="job" value="{{$teacher->job}}" class="form-control" required>
                                    @if($errors->has("job"))
                                        <small style="color: red">{{$errors->first('job')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">الرقم المدني</label>
                                    <input type="text" name="national_number" value="{{$teacher->national_number}}" class="form-control" required>
                                    @if($errors->has("national_number"))
                                        <small style="color: red">{{$errors->first('national_number')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">الجنسية</label>
                                    <input type="text" name="nationality" value="{{$teacher->nationality}}" class="form-control" required>
                                    @if($errors->has("nationality"))
                                        <small style="color: red">{{$errors->first('nationality')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                        <label class="bmd-label-floating">تاريخ الميلاد</label>
                                        <input type="text" name="birth_day" value="{{$teacher->birth_day}}" class="form-control datepicker" required>
                                        @if($errors->has("birth_day"))
                                            <small style="color: red">{{$errors->first('birth_day')}}</small>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">رقم موافقة الهيئة</label>
                                    <input type="text" name="entity_acceptance_number" value="{{$teacher->entity_acceptance_number}}" class="form-control " required>
                                    @if($errors->has("entity_acceptance_number"))
                                        <small style="color: red">{{$errors->first('entity_acceptance_number')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" >
                                    <label class="bmd-label-floating">تاريخ موافقة الهيئة</label>
                                    <input type="text" name="entity_acceptance_date" value="{{$teacher->entity_acceptance_date}}" class="form-control datepicker" required>
                                    @if($errors->has("entity_acceptance_date"))
                                        <small style="color: red">{{$errors->first('entity_acceptance_date')}}</small>
                                    @endif
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
                                        @if($teacher->school)
                                            <option value="{{$teacher->school->id}}">{{$teacher->school->name}}</option>
                                        @endif
                                        @foreach($schools as $school)
                                            @if($school->id !== $teacher->school->id)
                                            <option value="{{$school->id}}">{{$school->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="float: left;">تحديث المعلم</button>
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
