@extends('layouts.master')
@section('title') المدارس @endsection
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
        @slot('li_2') المدارس @endslot
    @endcomponent

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session()->pull('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    @if(session()->has('errors'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->pull('errors')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form class="needs-validation" action="{{route('schools.store')}}" method="post" novalidate>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">مدرسة جديدة</h4>
                    <p class="card-title-desc">تسجيل مدرسة جديدة</p>

                        @csrf
                        <div class="row">
{{--                            <div class="col-md-12">--}}
                                <div class="form-group col-md-6">
                                    <label for="validationCustom01">اسم المدرسة بالعربي</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="اسم المدرسة" value="" required>

                                    <div class="invalid-feedback">
                                        من فضلك أدخل الإسم
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="validationCustom01">اسم المدرسة بالإنجليزي</label>
                                    <input type="text" name="name_english" class="form-control" id="validationCustom01" placeholder="School" value="" required>

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
                                <input type="text" name="address" class="form-control" id="validationCustom01" placeholder="العنوان" value="" required>

                                <div class="invalid-feedback">
                                    من فضلك أدخل العنوان
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="validationCustom01">الحالة</label>
                                <input type="text" name="state" class="form-control" id="validationCustom01" placeholder="الحالة" value="" required>

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
                                <input type="text" name="phone_number" class="form-control" id="validationCustom01" placeholder="01099999999" value="" required>

                                <div class="invalid-feedback">
                                    من فضلك أدخل رقم التليفون
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="validationCustom01">الفاكس</label>
                                <input type="text" name="fax_number" class="form-control" id="validationCustom01" placeholder="رقم الفاكس" value="" required>

                                <div class="invalid-feedback">
                                    من فضلك أدخل رفم الفاكس
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="validationCustom01">الإيميل</label>
                                <input type="email" name="email" class="form-control" id="validationCustom01" placeholder="example@gmail.cpm" value="" required>

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
                        <p class="card-title-desc" style="display:inline-block">إسناد البرامج إلى المدرسة </p>
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


        <button class="btn btn-primary mb-2" type="submit">حفظ المدرسة</button>
    </form>
@endsection

@section('script')
    <script>
        $('#addProgram').click(function(){
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
        })
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
