@extends('layouts.app-layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">اضافة هيئة تعليمة</h4>
        <p class="card-category">ادخال البيانات المطلوبة</p>
      </div>
      <div class="card-body">
        <form action="{{route('schools.update', $school->id)}}" method='POST'>
          <div class="row">
          @csrf
          @method('PATCH')
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الكود</label>
                <input type="text" class="form-control" name='code' required value="{{$school->code}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الاسم باللغة العربية</label>
                <input type="text" class="form-control" name='name' required value='{{$school->name}}'>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الاسم باللغة الانجليزية</label>
                <input type="text" class="form-control" name='name_english' required value='{{$school->name_english}}'>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">المرحلة</label>
                <input type="text" class="form-control" name='stage' required value='{{$school->stage}}'>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">العنوان</label>
                <input type="text" class="form-control" name='address' value="{{$school->address}}" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">التليفون</label>
                <input type="number" class="form-control" name='phone_number' value="{{$school->phone_number}}" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الفاكس</label>    
                <input type="number" class="form-control" name='fax_number' value='{{$school->fax_number}}' required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الايميل</label>
                <input type="email" class="form-control" name='email' value="{{$school->email}}" required>
              </div>
            </div>
            <div class="col-md-4">
              <select class="form-control" name='type' data-style="btn btn-link" id="exampleFormControlSelect1" tabindex="-98" required>
                <option value="0" select2>اختر نوع المؤسسة التعليمية</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">نوع الترخيص</label>
                <input type="text" class="form-control" name='license_type' value="{{$school->license_type}}" required>
              </div>
            </div>
            <div class="col-md-4">
              <select class="form-control select2" name='country' data-style="btn btn-link" id="exampleFormControlSelect1" tabindex="-98">
                <option value="0">اختر البلد</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="col-md-4">
              <select class="form-control select2" name='city' data-style="btn btn-link" id="exampleFormControlSelect1" tabindex="-98">
                <option value="0">اختر المدينة</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">المنطقة</label>
                <input type="text" class="form-control" name='area' value="{{$school->area}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">القطعة</label>
                <input type="text" class="form-control" name='part' value="{{$school->part}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الشارع</label>
                <input type="text" class="form-control" name='street' value="{{$school->street}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">بيانات الموقع الجغرافى</label>
                <input type="text" class="form-control" name='geolocation' value="{{$school->geolocation}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="class-12" style="margin-top:20px;">
                <select class="form-control select2" data-style="btn btn-link" name='general_manager' id="exampleFormControlSelect1" required>
                  <option value="0">اختر مدير الادارة</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>

            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">إسناد البرامج</h4>
                  <p class="card-title-desc" style="display:inline-block">إسناد البرامج إلى الهيئه التعليمة </p>
                  <button class="btn btn-info" id="addProgram" style="float: left;position: relative; top: -22px;">إسناد برنامج آخر</button>
                  <div class="row " id="programContainer">
                    <div class="form-group col-md-3 ">
                      <label class="control-label">اختر برنامج</label>
                      <select name="programs[]" class="form-control select2" required>
                        <option>Select</option>
                        @foreach($programsList as $program)
                        <option value="{{$program->id}}">{{$program->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group mb-0 col-md-4">
                      <div class="row">
                        <div class="col-12">
                          <label>
                            مدة البرنامج
                          </label>
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control datepicker" placeholder="يبدأ من" name="start_at[]" required />
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control datepicker" placeholder="ينتهي عند" name="end_at[]" required />
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="row">
                        <div class="col-12">
                          <label for="validationCustom01">سعر البرنامج</label>
                        </div>
                        <input type="text" name="programs_price[]" class="form-control" id="validationCustom01" placeholder="سعر البرنامج" value="" required>
                        <div class="invalid-feedback">
                          من فضلك أدخل السعر
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right" style="float: left;">اضافة هيئة تعليمية</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('inc-scripts')
<script>
$(function() {
  $('#addProgram').click(function() {
    //fix the select search method
    let html = `<div class="form-group col-md-3 ">
                      <label class="control-label">اختر برنامج</label>
                      <select name="programs[]" class="form-control select2" required>
                        <option>Select</option>
                        @foreach($programsList as $program)
                        <option value="{{$program->id}}">{{$program->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group mb-0 col-md-4">
                      <div class="row">
                        <div class="col-12">
                          <label>
                            مدة البرنامج
                          </label>
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control datepicker" placeholder="يبدأ من" name="start_at[]" required />
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control datepicker" placeholder="ينتهي عند" name="end_at[]" required />
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="row">
                        <div class="col-12">
                          <label for="validationCustom01">سعر البرنامج</label>
                        </div>
                        <input type="text" name="programs_price[]" class="form-control" id="validationCustom01" placeholder="سعر البرنامج" value="" required>
                        <div class="invalid-feedback">
                          من فضلك أدخل السعر
                        </div>
                      </div>
                    </div>`;
    $('#programContainer').append(html).ready(()=>{
      $('.datepicker').datepicker();
      $('.select2').select2();
    });
  });
}); 
</script>
@endsection