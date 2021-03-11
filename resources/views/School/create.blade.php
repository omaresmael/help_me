@extends('layouts.app-layout')
@section('content')
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">اضافة مدرسة</h4>
                  <p class="card-category">ادخال البيانات المطلوبة</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">الكود</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">الاسم باللغة العربية</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">الاسم باللغة الانجليزية</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">المرحلة</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>                              
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">العنوان</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">التليفون</label>
                          <input type="number" class="form-control">
                        </div>         
                    </div>                 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">الفاكس</label>
                          <input type="number" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">الايميل</label>
                          <input type="email" class="form-control">
                        </div>              
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" tabindex="-98">
                        <option value="0">اختر نوع المؤسسة التعليمية</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">نوع الترخيص</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" tabindex="-98">
                        <option value="0">اختر البلد</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" tabindex="-98">
                        <option value="0">اختر المدينة</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">الايميل</label>
                      <input type="email" class="form-control">
                    </div>              
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
                  <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" tabindex="-98">
                    <option value="0">اختر مدير الادارة</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                </div>
                    <button type="submit" class="btn btn-primary pull-right" style="float: left;">اضافة مدرسة</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
      
          </div>
          @endsection