@extends('layouts.app-layout')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">اضافة مختص</h4>
                        <p class="card-category">ادخال البيانات المطلوبة</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('users.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">أسم المختص</label>
                                        <input type="text" class="form-control" value="{{old('name')}}" name="name" required>
                                        @if($errors->has("name"))
                                            <small style="color: red">{{$errors->first('name')}}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">كلمة المرور </label>
                                        <input type="text" class="form-control" value="{{old('password')}}"name="password" required>
                                        @if($errors->has("password"))
                                            <small style="color: red">{{$errors->first('password')}}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">البريد الاكتروني</label>
                                        <input type="email" class="form-control" value="{{old('email')}}"name="email" required>
                                        @if($errors->has("email"))
                                            <small style="color: red">{{$errors->first('email')}}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الوظيفة</label>
                                        <input type="text" class="form-control" value="{{old('position')}}"name="position" required>
                                        @if($errors->has("position"))
                                            <small style="color: red">{{$errors->first('position')}}</small>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">صلاحيات المختص</h4>
                                            <p class="card-title-desc" style="display:inline-block">إسناد الصلاحيات للمختص </p>
                                            <div class="row " id="programContainer">
                                                <div class="form-group col-md-12 ">
                                                    <label class="control-label">اختر صلاحية</label>
                                                    <select class="select2 form-control select2-multiple" name="abilities[]" multiple="multiple" data-placeholder="اختر صلاحيات">
                                                        <option>اختر صلاحية</option>
                                                        @foreach($abilities as $ability)
                                                            <option value="{{$ability->id}}">{{$ability->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">حفظ المختص</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('inc-scripts')

@endsection
