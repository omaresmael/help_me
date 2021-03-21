@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">تعديل برنامج </h4>
                    <p class="card-category">ادخال البيانات المطلوبة</p>
                </div>
                <div class="card-body">
                    <form action="{{route('programs.update', $program->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="اسم البرنامج" value="{{$program->name}}" autocomplete="off" required>
                                    @if($errors->has("name"))
                                        <small style="color: red">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="float: left;">تحديث برنامج</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
