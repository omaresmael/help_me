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
                  @if($errors->has("code"))
                      <small style="color: red">{{$errors->first('code')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الاسم باللغة العربية</label>
                <input type="text" class="form-control" name='name' required value='{{$school->name}}'>
                  @if($errors->has("name"))
                      <small style="color: red">{{$errors->first('name')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الاسم باللغة الانجليزية</label>
                <input type="text" class="form-control" name='name_english' required value='{{$school->name_english}}'>
                  @if($errors->has("name_english"))
                      <small style="color: red">{{$errors->first('name_english')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">المرحلة</label>
                <input type="text" class="form-control" name='stage' required value='{{$school->stage}}'>
                  @if($errors->has("stage"))
                      <small style="color: red">{{$errors->first('stage')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">العنوان</label>
                <input type="text" class="form-control" name='address' value="{{$school->address}}" required>
                  @if($errors->has("address"))
                      <small style="color: red">{{$errors->first('address')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">التليفون</label>
                <input type="number" class="form-control" name='phone_number' value="{{$school->phone_number}}" required>
                  @if($errors->has("phone_number"))
                      <small style="color: red">{{$errors->first('phone_number')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الفاكس</label>
                <input type="number" class="form-control" name='fax_number' value='{{$school->fax_number}}' required>
                  @if($errors->has("fax_number"))
                      <small style="color: red">{{$errors->first('fax_number')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الايميل</label>
                <input type="email" class="form-control" name='email' value="{{$school->email}}" required>
                  @if($errors->has("email"))
                      <small style="color: red">{{$errors->first('email')}}</small>
                  @endif
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
                  @if($errors->has("license_type"))
                      <small style="color: red">{{$errors->first('license_type')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
            <label class="bmd-label-floating">البلد</label>
              <select class="form-control select2 country" name='country' >
                <option value={{$school->country}}>{{$school->country}}</option>
                  @foreach($countries as $key => $country)
                      <option data-country="{{$key}}" value="{{$country}}">{{$country}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-4">
            <label class="bmd-label-floating">محافظة</label>
              <select class="form-control select2 cities" name='city' >
                <option value={{$school->city}}>{{$school->city}}</option>
              </select>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">المنطقة</label>
                <input type="text" class="form-control" name='area' value="{{$school->area}}">
                  @if($errors->has("area"))
                      <small style="color: red">{{$errors->first('area')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">القطعة</label>
                <input type="text" class="form-control" name='part' value="{{$school->part}}">
                  @if($errors->has("part"))
                      <small style="color: red">{{$errors->first('part')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الشارع</label>
                <input type="text" class="form-control" name='street' value="{{$school->street}}">
                  @if($errors->has("street"))
                      <small style="color: red">{{$errors->first('street')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">بيانات الموقع الجغرافى</label>
                <input type="text" class="form-control" name='geolocation' value="{{$school->geolocation}}">
                  @if($errors->has("geolocation"))
                      <small style="color: red">{{$errors->first('geolocation')}}</small>
                  @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label class="bmd-label-floating">مدير الإدارة</label>
                  <input type="text" class="form-control" value="{{old('general_manager')}}" name='general_manager'>
                  @if($errors->has("general_manager"))
                      <small style="color: red">{{$errors->first('general_manager')}}</small>
                  @endif
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
                  @if(count($school->programs) > 0)
                        @foreach($school->programs as $schoolProgram)

                        <div class="form-group col-md-3 ">
                          <label class="control-label">اختر برنامج</label>
                          <select name="programs[]" class="form-control select2" required>
                          <option value="{{$schoolProgram->id}}">{{$schoolProgram->name}} </option>
                            @foreach($programsList as $program)
                              @if($program->id !=$schoolProgram->id)
                                <option value="{{$program->id}}">{{$program->name}}</option>
                              @endif
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
                              <input type="text" class="form-control datepicker" placeholder="يبدأ من" name="start_at[]" value='{{$schoolProgram->pivot->start_at}}' required />
                            </div>
                            <div class="col-6">
                              <input type="text" class="form-control datepicker" placeholder="ينتهي عند" name="end_at[]" required value="{{$schoolProgram->pivot->end_at}}" />
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <div class="row">
                            <div class="col-12">
                              <label for="validationCustom01">سعر البرنامج</label>
                            </div>
                            <input type="text" name="programs_price[]" class="form-control" id="validationCustom01" placeholder="سعر البرنامج" value="{{$schoolProgram->pivot->program_price}}" required>
                            <div class="invalid-feedback">
                              من فضلك أدخل السعر
                            </div>
                          </div>
                        </div>
                        @endforeach
                    @else
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
                              <input type="text" class="form-control datepicker" placeholder="يبدأ من" name="start_at[]" value='' autocomplete="off" required />
                              @if($errors->has("start_at"))
                                  <small style="color: red">{{$errors->first('start_at')}}</small>
                              @endif
                          </div>
                          <div class="col-6">
                              <input type="text" class="form-control datepicker" placeholder="ينتهي عند" name="end_at[]" required value="" />
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
                        <input type="text" name="programs_price[]" class="form-control" id="validationCustom01" placeholder="سعر البرنامج" value="" required>
                          @if($errors->has("program_price"))
                              <small style="color: red">{{$errors->first('program_price')}}</small>
                          @endif
                        <div class="invalid-feedback">
                          من فضلك أدخل السعر
                        </div>
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right" style="float: left;">تحديث هيئة تعليمية</button>
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

        let country = $(".country option:selected").data('country'),
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
                          <input type="text" class="form-control datepicker" placeholder="يبدأ من" autocomplete="off" name="start_at[]" required />
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control datepicker" placeholder="ينتهي عند" autocomplete="off" name="end_at[]" required />
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
