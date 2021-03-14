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
        <form>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الكود</label>
                <input type="text" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الاسم باللغة العربية</label>
                <input type="text" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الاسم باللغة الانجليزية</label>
                <input type="text" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">المرحلة</label>
                <input type="text" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">العنوان</label>
                <input type="text" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">التليفون</label>
                <input type="number" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الفاكس</label>
                <input type="number" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الايميل</label>
                <input type="email" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" tabindex="-98" required>
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
                <input type="text" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <select class="form-control select2" data-style="btn btn-link" id="exampleFormControlSelect1" tabindex="-98">
                <option value="0">اختر البلد</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="col-md-4">
              <select class="form-control select2" data-style="btn btn-link" id="exampleFormControlSelect1" tabindex="-98">
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
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">القطعة</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">الشارع</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">بيانات الموقع الجغرافى</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="class-12" style="margin-top:20px;">
                <select class="form-control select2" data-style="btn btn-link" id="exampleFormControlSelect1" required>
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
                    <div class="form-group col-md-4 ">
                      <label class="control-label">اختر برنامج</label>
                      <select name="programs[]" class="form-control select2" required>
                        <option>Select</option>
                        @foreach($programs as $program)
                        <option value="{{$program->id}}">{{$program->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group mb-0 col-md-4">
                      <label>
                        مدة البرنامج
                      </label>
                      <div>
                        <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
                          <input type="text" class="form-control" placeholder="يبدأ من" name="start_at[]" required />
                          <input type="text" class="form-control" placeholder="ينتهي عند" name="end_at[]" required />
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="validationCustom01">سعر البرنامج</label>
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
  $('#addProgram').click(function() {
    //fix the select search method
    var html = '<div class="form-group col-md-4 ">\n' +
      '                            <label class="control-label">اختر برنامج</label>\n' +
      '                            <select name="programs[]" class="form-control select2" required>\n' +
      '                                <option>Select</option>\n' +
      '                                @foreach($programs as $program)\n' +
      '                                    <option value="{{$program->id}}">{{$program->name}}</option>\n' +
      '                                @endforeach\n' +
      '                            </select>\n' +
      '                        </div>\n' +
      '                        <div class="form-group mb-0 col-md-4">\n' +
      '                            <label>\n' +
      '                                مدة البرنامج\n' +
      '                            </label>\n' +
      '                            <div>\n' +
      '                                <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">\n' +
      '                                    <input type="text" class="form-control" placeholder="يبدأ من" name="start_at[]" required />\n' +
      '                                    <input type="text" class="form-control" placeholder="ينتهي عند" name="end_at[]" required />\n' +
      '                                </div>\n' +
      '                            </div>\n' +
      '                        </div>\n' +
      '\n' +
      '                        <div class="form-group col-md-4">\n' +
      '                            <label for="validationCustom01">سعر البرنامج</label>\n' +
      '                            <input type="text" name="programs_price[]" class="form-control" id="validationCustom01" placeholder="سعر البرنامج" value="" required>\n' +
      '\n' +
      '                            <div class="invalid-feedback">\n' +
      '                                من فضلك أدخل السعر\n' +
      '                            </div>\n' +
      '                        </div>';
    $('#programContainer').append(html);
  });
</script>
@endsection