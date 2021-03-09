@extends('layouts.master')
@section('title') الهيئات التعليميه@endsection
@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title')  @endslot
        @slot('li_1')  @endslot
        @slot('li_2') الهيئات التعليميه@endslot
    @endcomponent

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session()->pull('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif
    <form class="needs-validation" action="{{route('schools.update', $school->id)}}" method="post" novalidate>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">هيئة تعليمية جديدة</h4>
                    <p class="card-title-desc">تسجيل هيئة تعليمية جديدة</p>

                        @csrf
                        @method('PATCH')
                        <div class="row">
{{--                            <div class="col-md-12">--}}
                                <div class="form-group col-md-6">
                                    <label for="validationCustom01">اسم الهيئه التعليمة بالعربي</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="اسم الهيئه التعليمة" value="{{$school->name}}" required>

                                    <div class="invalid-feedback">
                                        من فضلك أدخل الإسم
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="validationCustom01">اسم الهيئه التعليمة بالإنجليزي</label>
                                    <input type="text" name="name_english" class="form-control" id="validationCustom01" placeholder="School" value="{{$school->name_english}}" required>

                                    <div class="invalid-feedback">
                                        من فضلك أدخل الإسم
                                    </div>
                                </div>
{{--                            </div>--}}

                        </div>

                        <div class="row">
                            {{--                            <div class="col-md-12">--}}
                            <div class="form-group col-md-8">
                                <label for="validationCustom01">العنوان</label>
                                <input type="text" name="address" class="form-control" id="validationCustom01" placeholder="العنوان" value="{{$school->address}}" required>

                                <div class="invalid-feedback">
                                    من فضلك أدخل العنوان
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="validationCustom01">الحالة</label>
                                <input type="text" name="state" class="form-control" id="validationCustom01" placeholder="الحالة" value="{{$school->state}}" required>

                                <div class="invalid-feedback">
                                    من فضلك أدخل الحالة
                                </div>
                            </div>
                            {{--                            </div>--}}

                        </div>

                        <div class="row">
                            {{--                            <div class="col-md-12">--}}
                            <div class="form-group col-md-4">
                                <label for="validationCustom01">رقم التليفون</label>
                                <input type="text" name="phone_number" class="form-control" id="validationCustom01" placeholder="01099999999" value="{{$school->phone_number}}" required>

                                <div class="invalid-feedback">
                                    من فضلك أدخل رقم التليفون
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="validationCustom01">الفاكس</label>
                                <input type="text" name="fax_number" class="form-control" id="validationCustom01" placeholder="رقم الفاكس" value="{{$school->fax_number}}" required>

                                <div class="invalid-feedback">
                                    من فضلك أدخل رفم الفاكس
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="validationCustom01">الإيميل</label>
                                <input type="email" name="email" class="form-control" id="validationCustom01" placeholder="example@gmail.cpm" value="{{$school->email}}" required>

                                <div class="invalid-feedback">
                                    من فضلك أدخل الإيميل
                                </div>
                            </div>
                            {{--                            </div>--}}

                        </div>





                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->


    </div>
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
                            <div class="form-group col-md-4 ">
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
                            <label>
                                مدة البرنامج
                            </label>
                            <div>
                                <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
                                    <input type="text" class="form-control start" placeholder="يبدأ من" name="start_at[]" value="{{$schoolProgram->pivot->start_at}}" required />
                                    <input type="text" class="form-control end" placeholder="ينتهي عند" name="end_at[]" value="{{$schoolProgram->pivot->end_at}}" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="validationCustom01">سعر البرنامج</label>
                                <input type="text" name="programs_price[]" class="form-control" id="validationCustom01" placeholder="سعر البرنامج" value="{{$schoolProgram->pivot->program_price}}" required>
                                <div class="invalid-feedback">
                                    من فضلك أدخل السعر
                                </div>
                        </div>
                        @endforeach
                    @else
                        <div class="form-group col-md-4 ">
                            <label class="control-label">اختر برنامج</label>
                            <select name="programs[]" class="form-control select2" required>
                                <option>Select</option>
                                @foreach($programsList as $program)
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
                    @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>


        <button class="btn btn-primary mb-2" type="submit">تحديث الهيئه التعليمة</button>
    </form>
@endsection

@section('script')
    <script>
    $(function(){
        $('#addProgram').click(function(){
            //fix the select search method
            var html = '<div class="form-group col-md-4 ">\n' +
                '                            <label class="control-label">اختر برنامج</label>\n' +
                '                            <select name="programs[]" class="form-control select2" required>\n' +
                '                                <option>Select</option>\n' +
                '                                @foreach($programsList as $program)\n' +
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
        })
    });
    </script>
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js')}}"></script>



@endsection
