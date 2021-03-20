@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">اضافة جلسة</h4>
                    <p class="card-category">ادخال البيانات المطلوبة</p>
                </div>
                <div class="card-body">
                    <form action="{{route('sittings.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">اسم الجلسة</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">السعر</label>
                                    <input type="text" name="price" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="bmd-label-floating">التاريخ</label>
                                    <input type="text" name="date" value="{{old('date')}}" class="form-control datepicker" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_label_single">
                                        اختر المعلم
                                    </label>

                                    <select class="js-example-basic-single js-states form-control" id="id_label_single" name="teacher_id">
                                        @isset($teachers)
                                            <option>اختر معلم</option>
                                        @endisset
                                        @foreach($teachers as $teacher)

                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_label_single">
                                        اختر الطلبة المشتركين في الجلسة
                                    </label>
                                    <select class="js-example-basic-single js-states form-control" id="" name="student_id">
                                        @isset($students)
                                            <option>اختر الطلبة</option>
                                        @endisset
                                        @foreach($students as $student)

                                            <option value="{{$student->id}}">{{$student->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="float: left;">اضافة جلسة</button>
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
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>
@endsection