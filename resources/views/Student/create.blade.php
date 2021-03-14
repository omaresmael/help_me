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
                  <input type="text" class="form-control" name="name" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">رقم القومي للطالب </label>
                  <input type="text" class="form-control" name="national_number" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">البريد الاكتروني للطالب</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">اسم ولي الامر </label>
                  <input type="text" class="form-control" name="guardian_name" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">رقم القومي ولي الامر</label>
                  <input type="text" class="form-control" name="guardian_national_number" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">ترشيح الوزارة</label>
                  <input type="checkbox" class="form-control" name="ministry_nomination" checked>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating">ترشيح الهيئة التعليمة</label>
                  <input type="checkbox" class="form-control" name='school_nomination' checked>
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
                          <option>اختر هيئة تعليمية</option>
                          @foreach($schools as $school)
                            <option value="{{$school->id}}">{{$school->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-6 ">
                            <label class="control-label" >اختر برنامج</label>
                            <select name="program_school_id" id="program"  class="form-control select2" required> 
                              <option>اختر برنامج</option>
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
    })
  });
</script>
@endsection