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
        <form action="{{route('schools.store')}}" method='POST' >
          <div class="row">
          @csrf
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الكود</label>
                <input type="text" value="{{old('code')}}" class="form-control" name='code' >
                  @if($errors->has("code"))
                      <small style="color: red">{{$errors->first('code')}}</small>
                  @endif

              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الاسم باللغة العربية</label>
                <input type="text" value="{{old('name')}}" class="form-control" name='name' >
                  @if($errors->has("name"))
                      <small style="color: red">{{$errors->first('name')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الاسم باللغة الانجليزية</label>
                <input type="text" class="form-control" value="{{old('name_english')}}" name='name_english' >
                  @if($errors->has("name_english"))
                      <small style="color: red">{{$errors->first('name_english')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">المرحلة</label>
                <input type="text" class="form-control" value="{{old('stage')}}" name='stage' >
                  @if($errors->has("stage"))
                      <small style="color: red">{{$errors->first('stage')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">العنوان</label>
                <input type="text" class="form-control" value="{{old('address')}}" name='address' >
                  @if($errors->has("address"))
                      <small style="color: red">{{$errors->first('address')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">التليفون</label>
                <input type="number" class="form-control" value="{{old('phone_number')}}" name='phone_number' >
                <small>برحاء كتابه الرقم بدون كتابة البداية برقم صفر</small>
                  @if($errors->has("phone_number"))
                      <small style="color: red">{{$errors->first('phone_number')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الفاكس</label>
                <input type="number" class="form-control" value="{{old('fax_number')}}" name='fax_number' >
                <small>برحاء كتابه الرقم بدون كتابة البداية برقم صفر</small>
                  @if($errors->has("fax_number"))
                      <small style="color: red">{{$errors->first('fax_number')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الايميل</label>
                <input type="email" class="form-control" value="{{old('email')}}" name='email' >
                  @if($errors->has("email"))
                      <small style="color: red">{{$errors->first('email')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <select class="form-control" name='type' data-style="btn btn-link" id="exampleFormControlSelect1" tabindex="-98" >
                <option value="0" selected>اختر نوع المؤسسة التعليمية</option>
                <option value="">حضانة</option>
                <option value="مركز تأهيل">مركز تأهيل</option>
                <option value="مركز إيواء">مركز إيواء</option>
                <option value="مدرسة ثنائية اللغة">مدرسة ثنائية اللغة</option>
                <option value="مدرسة عربية">مدرسة عربية</option>
              </select>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">نوع الترخيص</label>
                <input type="text" class="form-control" value="{{old('license_type')}}" name='license_type' >
              </div>
            </div>
            <div class="col-md-4">
            <label class="bmd-label-floating">البلد</label>
              <select  name='country'  class="form-control select2 country" >
                <option >اختر البلد</option>
                @foreach($countries as $key => $country)
					        <option data-country="{{$key}}" value="{{$country}}">{{$country}}</option>
				        @endforeach
              </select>
            </div>
            <div class="col-md-4">
            <label class="bmd-label-floating">محافظة</label>
              <select  name='city'  class="form-control select2 cities">
                <option disabled>اختر البلد</option>

              </select>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">المنطقة</label>
                <input type="text" class="form-control" value="{{old('area')}}"name='area'>
                  @if($errors->has("area"))
                      <small style="color: red">{{$errors->first('area')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">القطعة</label>
                <input type="text" class="form-control" value="{{old('part')}}" name='part'>
                  @if($errors->has("part"))
                      <small style="color: red">{{$errors->first('part')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الشارع</label>
                <input type="text" class="form-control" value="{{old('street')}}" name='street'>
                  @if($errors->has("street"))
                      <small style="color: red">{{$errors->first('street')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">بيانات الموقع الجغرافى</label>
                <input type="text" class="form-control" value="{{old('geolocation')}}" name='geolocation'>
                  @if($errors->has("geolocation"))
                      <small style="color: red">{{$errors->first('geolocation')}}</small>
                  @endif
              </div>
            </div>
              <div class="form-group">
                  <label class="bmd-label-floating">مدير الإدارة</label>
                  <input type="text" class="form-control" value="{{old('general_manager')}}" name='general_manager'>
                  @if($errors->has("general_manager"))
                      <small style="color: red">{{$errors->first('general_manager')}}</small>
                  @endif
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
                      <select name="programs[]" class="form-control select2" >
                        <option>Select</option>
                        @foreach($programs as $program)
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
                          <input type="text" class="form-control datepicker"  placeholder="يبدأ من" name="start_at[]" autocomplete="off"  />
                            @if($errors->has("start_at"))
                                <small style="color: red">{{$errors->first('start_at')}}</small>
                            @endif
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control datepicker" placeholder="ينتهي عند" name="end_at[]" autocomplete="off"  />
                            @if($errors->has("end_at"))
                                <small style="color: red">{{$errors->first('end_at')}}</small>
                            @endif
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="row">
                        <div class="col-12">
                          <label for="validationCustom01">سعر البرنامج</label>
                        </div>
                        <input type="text" name="programs_price[]" class="form-control" id="validationCustom01" placeholder="سعر البرنامج" value="" >
                          @if($errors->has("program_price"))
                              <small style="color: red">{{$errors->first('program_price')}}</small>
                          @endif
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
	$('.country').change(function() {
      let country = $(".country option:selected").data('country');

          url = '/city/'+country;
      $.get(url, function(data) {
        $('.cities').html(' ');
        $.each(data, function(key, valueObj) {
            $('.cities').append(' <option value="' + valueObj + '">' + valueObj + '</option>');
        });
      });
    });
  $('#addProgram').click(function() {
    event.preventDefault();
    //fix the select search method
    let html = `<div class="form-group col-md-3 ">
                      <label class="control-label">اختر برنامج</label>
                      <select name="programs[]" class="form-control select2" >
                        <option>Select</option>
                        @foreach($programs as $program)
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
                          <input type="text" class="form-control datepicker" placeholder="يبدأ من" name="start_at[]"  />
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control datepicker" placeholder="ينتهي عند" name="end_at[]"  />
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="row">
                        <div class="col-12">
                          <label for="validationCustom01">سعر البرنامج</label>
                        </div>
                        <input type="text" name="programs_price[]" class="form-control" id="validationCustom01" placeholder="سعر البرنامج" value="" >
                        <div class="invalid-feedback">
                          من فضلك أدخل السعر
                        </div>
                      </div>
                    </div>`;
    $('#programContainer').append(html).ready(()=>{
      $('.select2').select2();
      $('.datepicker').daterangepicker({
        autoClose:true,
        singleDatePicker: true,
        locale: {format: 'YYYY-MM-DD'},
        singleDate: true
      });
    });
  });

});

</script>
@endsection
