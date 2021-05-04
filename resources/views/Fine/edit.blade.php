@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">تعديل جزاء</h4>
                    <p class="card-category">ادخال البيانات المطلوبة</p>
                </div>
                <div class="card-body">
                    <form action="{{route('fines.update', $fine->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">قيمة الجزاء</label>
                                    <input type="text" name="amount" value="{{$fine->amount}}" class="form-control" required>
                                    @if($errors->has("amount"))
                                        <small style="color: red">{{$errors->first('amount')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">السبب</label>
                                    <textarea name="reason"  class="form-control" required>{{$fine->reason}}</textarea>
                                    @if($errors->has("reason"))
                                        <small style="color: red">{{$errors->first('reason')}}</small>
                                    @endif
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_label_single">
                                        اختر هيئة تعليمية
                                    </label>
                                    <select class="select2 form-control" id="id_label_single" name="school_id" required>
                                        @if($fine->school)
                                            <option value="{{$fine->school->id}}">{{$fine->school->name}}</option>
                                        @endif
                                        @foreach($schools as $school)
                                            @if($school->id !== $fine->school->id)
                                            <option value="{{$school->id}}">{{$school->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="float: left;">تعديل جزاء</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('inc-scripts')
    <script>

        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    </script>
@endsection
