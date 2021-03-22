@extends('layouts.app-layout')
@section('content')
<div class="container">
  <div class="row ">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">اضافة طالب</h4>
          <p class="card-category">ادخال البيانات المطلوبة</p>
        </div>
        <div class="card-body">
          <form method="POST" action="{{route('students.update', $student->id)}}">
            @csrf
            @method('PATCH')
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">أسم الطالب رباعي</label>
                  <input type="text" class="form-control" name="name" value='{{$student->name}}' required>
                    @if($errors->has("name"))
                        <small style="color: red">{{$errors->first('name')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">رقم القومي للطالب </label>
                  <input type="text" class="form-control" name="national_number" value='{{$student->national_number}}' required>
                    @if($errors->has("national_number"))
                        <small style="color: red">{{$errors->first('national_number')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">البريد الاكتروني للطالب</label>
                  <input type="email" class="form-control" name="email" value="{{$student->email}}" required>
                    @if($errors->has("email"))
                        <small style="color: red">{{$errors->first('email')}}</small>
                    @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">اسم ولي الامر </label>
                  <input type="text" class="form-control" name="guardian_name" value='{{$student->guardian_name}}' required>
                    @if($errors->has("guardian_name"))
                        <small style="color: red">{{$errors->first('guardian_name')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">رقم القومي ولي الامر</label>
                  <input type="text" class="form-control" name="guardian_national_number" value="{{$student->guardian_national_number}}" required>
                    @if($errors->has("guardian_national_number"))
                        <small style="color: red">{{$errors->first('guardian_national_number')}}</small>
                    @endif
                </div>
              </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">بداية الدوام</label>
                        <input type="text" class="form-control datepicker" value="{{$student->attendance_begin}}" name="attendance_begin" required>
                        @if($errors->has("attendance_begin"))
                            <small style="color: red">{{$errors->first('attendance_begin')}}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">نهاية الدوام</label>
                        <input type="text" class="form-control datepicker" value="{{$student->attendance_end}}" name="attendance_end" required>
                        @if($errors->has("attendance_end"))
                            <small style="color: red">{{$errors->first('attendance_end')}}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">نوع الإعاقة</label>
                        <input type="text" class="form-control" name="disability_type" value='{{$student->disability_type}}' required>
                        @if($errors->has("disability_type"))
                            <small style="color: red">{{$errors->first('disability_type')}}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">شدة الإعاقة</label>
                        <input type="text" class="form-control" name="disability_power" value='{{$student->disability_power}}' required>
                        @if($errors->has("disability_power"))
                            <small style="color: red">{{$errors->first('disability_power')}}</small>
                        @endif
                    </div>
                </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">ترشيح الوزارة</label>
                  <input type="checkbox" class="form-control" name="ministry_nomination" value="1" checked="{{$student->ministry_nomination}}" >
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating">ترشيح الهيئة التعليمة</label>
                  <input type="checkbox" class="form-control" name='school_nomination' value="1" checked="{{$student->ministry_nomination}}" >
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">مدرسة الطالب وبرنامجه</h4>
                    <p class="card-title-desc" style="display:inline-block">اسناد الطاب إلى المدرسة والبرنامج الخاص به </p>
                    <div class="row " id="programContainer">
                      <div class="form-group col-md-6 ">
                        <label class="control-label">اختر هيئة تعليمية</label>
                        <select name="school" class="form-control select2" id="school" required>
                          <option value="{{$student->school()->id}}">{{$student->school()->name}}</option>
                          @foreach($schools as $school)
                            @if($school->id != $student->school()->id)
                              <option value="{{$school->id}}">{{$school->name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group col-md-6 ">
                            <label class="control-label" id='studentProgramId' programId="{{$student->program()[1]->id}}">اختر برنامج</label>
                            <select name="program_school_id" id="program"  class="form-control select2" required>
                            <option value="{{$student->program_school_id}}">{{$student->program()[1]->name}}</option>
                            </select>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">تحديث الطالب</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('inc-scripts')
<script>
  $(function() {
    $('#school').trigger( "change" );
    $('#school').change(function() {
      let selected = $("#school option:selected").val(),
          url = "/associated/" + selected,
          studentprogramId = $("#studentProgramId").attr('programId');

      $.post(url, function(data) {
        $.each(data, function(key, valueObj) {
          if(key != studentprogramId)
            $('#program').append(' <option value="' + key + '">' + valueObj + '</option>');
        });
      });
    })
  });
  $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
  });
</script>
@endsection
