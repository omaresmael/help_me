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
          <form method="POST" action="{{route('students.store')}}">
            @csrf
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">أسم الطالب رباعي</label>
                  <input type="text" class="form-control" value="{{old('name')}}" name="name" required>
                    @if($errors->has("name"))
                        <small style="color: red">{{$errors->first('name')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">رقم المدني للطالب </label>
                  <input type="text" class="form-control" value="{{old('national_number')}}"name="national_number" required>
                    @if($errors->has("national_number"))
                        <small style="color: red">{{$errors->first('national_number')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">البريد الاكتروني للطالب</label>
                  <input type="email" class="form-control" value="{{old('email')}}"name="email" required>
                    @if($errors->has("email"))
                        <small style="color: red">{{$errors->first('email')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-2">
                    <div class="form-group">
                        <label class="bmd-label-floating">تاريخ الميلاد</label>
                        <input type="text" class="form-control datepicker" value="{{old('dateOfBirth')}}" autocomplete="off" name="dateOfBirth" required>
                        @if($errors->has("dateOfBirth"))
                            <small style="color: red">{{$errors->first('dateOfBirth')}}</small>
                        @endif
                    </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating">النوع</label>
                  <select name="gender" class="form-control" required>
                      <option>اختر نوع </option>
                      <option value="ذكر">ذكر</option>
                      <option value="انثى">انثى</option>
                  </select> 
                  @if($errors->has("gender"))
                      <small style="color: red">{{$errors->first('gender')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">اسم ولي الامر </label>
                  <input type="text" class="form-control" value="{{old('guardian_name')}}"name="guardian_name" required>
                    @if($errors->has("guardian_name"))
                        <small style="color: red">{{$errors->first('guardian_name')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">رقم المدني لولي الامر</label>
                  <input type="text" class="form-control" value="{{old('guardian_national_number')}}"name="guardian_national_number" required>
                    @if($errors->has("guardian_national_number"))
                        <small style="color: red">{{$errors->first('guardian_national_number')}}</small>
                    @endif
                </div>
              </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">بداية الدوام</label>
                        <input type="text" class="form-control datepicker" value="{{old('attendance_begin')}}" autocomplete="off" name="attendance_begin" required>
                        @if($errors->has("attendance_begin"))
                            <small style="color: red">{{$errors->first('attendance_begin')}}</small>
                        @endif

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">نهاية الدوام</label>
                        <input type="text" class="form-control datepicker" value="{{old('attendance_end')}}" autocomplete="off" name="attendance_end" required>
                        @if($errors->has("attendance_end"))
                            <small style="color: red">{{$errors->first('attendance_end')}}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">نوع التقرير</label>
                        <input type="text" class="form-control" value="{{old('report_type')}}" name="report_type" required>
                        @if($errors->has("report_type"))
                            <small style="color: red">{{$errors->first('report_type')}}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">الفصل</label>
                        <input type="text" class="form-control" value="{{old('section')}}" name="section" required>
                        @if($errors->has("section"))
                            <small style="color: red">{{$errors->first('section')}}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">نوع الإعاقة</label>
                        <select name="disability_type" class="form-control" required>
                          <option>اختر نوع الإعاقة</option>
                            @foreach($disabilities as $disability)
                              <option value="{{$disability}}">{{$disability}}</option>
                            @endforeach
                          </select>
                        @if($errors->has("disability_type"))
                            <small style="color: red">{{$errors->first('disability_type')}}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">شدة الإعاقة</label>
                        <select name="disability_power"  class="form-control select2" required>
                            <option value="ضعيف">ضعيف</option>
                            <option value="متوسط">متوسط</option>
                            <option value="شديد">شديد</option>
                        </select>

                        @if($errors->has("disability_power"))
                            <small style="color: red">{{$errors->first('disability_power')}}</small>
                        @endif
                    </div>
                </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">ترشيح الوزارة</label>
                  <input type="checkbox" class="form-control" name="ministry_nomination" value="1" checked>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating">ترشيح الهيئة التعليمة</label>
                  <input type="checkbox" class="form-control" name='school_nomination' value="1" checked>
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
                        <select name="school" class="form-control select2" id="school" >
                          <option>اختر هيئة تعليمية</option>
                          @foreach($schools as $school)
                            <option value="{{$school->id}}">{{$school->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-6 ">
                            <label class="control-label" >اختر برنامج</label>
                            <select name="program_school_id" id="program"  class="form-control select2" >
                              <option value="{{null}}">اختر برنامج</option>
                            </select>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">حفظ الطالب</button>
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
    $('#school').change(function() {
      let selected = $("#school option:selected").val(),
          url = "/associated/" + selected;

      $.post(url, function(data) {
        $.each(data, function(key, valueObj) {
            $('#program').append(' <option value="' + key + '">' + valueObj + '</option>');
        });
      });
    });

  });
  $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
  });
</script>
@endsection
