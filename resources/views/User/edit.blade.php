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
                        <form method="POST" action="{{route('users.update', $user->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الاسم</label>
                                        <input type="text" class="form-control" name="name" value='{{$user->name}}' required>
                                        @if($errors->has("name"))
                                            <small style="color: red">{{$errors->first('name')}}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">الوظيفة </label>
                                        <input type="text" class="form-control" name="position" value='{{$user->position}}' required>
                                        @if($errors->has("position"))
                                            <small style="color: red">{{$errors->first('position')}}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">البريد الاكتروني</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                                        @if($errors->has("email"))
                                            <small style="color: red">{{$errors->first('email')}}</small>
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
                                                        @if($user->abilities)
                                                            @foreach($user->abilities as $ability)
                                                                <option value="{{$ability->id}}" selected>{{$ability->name}}</option>
                                                            @endforeach
                                                        @endif
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
                            <button type="submit" class="btn btn-primary pull-right">تحديث المختص</button>
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
                    userprogramId = $("#userProgramId").attr('programId');

                $.post(url, function(data) {
                    $.each(data, function(key, valueObj) {
                        if(key != userprogramId)
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
