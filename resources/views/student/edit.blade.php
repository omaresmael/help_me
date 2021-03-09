@extends('layouts.master')
@section('title') الطلاب @endsection
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
        @slot('li_2') الطلاب @endslot
    @endcomponent
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

    <form class="needs-validation" action="{{route('students.update', $student->id)}}" method="post" novalidate>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">برنامج جديد</h4>
                    <p class="card-title-desc">إنشاء برنامج جديد ليتم إسناده لاحقا إلى الهيئات التعليميهالتي ستشترك به </p>

                        @csrf
                        @method('PATCH')
                        <div class="row">
{{--                            <div class="col-md-12">--}}
                                <div class="form-group col-md-6">
                                    <label for="validationCustom01">اسم الطالب</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="اسم الطالب" value="{{$student->name}}" required>

                                    <div class="invalid-feedback">
                                        من فضلك أدخل الإسم
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="validationCustom01">الرقم القومي للطالب</label>
                                    <input type="text" name="national_number" class="form-control" id="validationCustom01" placeholder="الرقم القومي للطالب " value="{{$student->national_number}}" required>

                                    <div class="invalid-feedback">
                                        من فضلك أدخل الرقم القومي للطالب
                                    </div>
                                </div>
{{--                            </div>--}}

                        </div>

                        <div class="row">
                            {{--                            <div class="col-md-12">--}}
                            <div class="form-group col-md-4">
                                <label for="validationCustom01">اسم ولي الأمر</label>
                                <input type="text" name="guardian_name" class="form-control" id="validationCustom01" placeholder="اسم ولي الأمر" value="{{$student->guardian_name}}" required>

                                <div class="invalid-feedback">
                                    من فضلك أدخل اسم ولي الأمر
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="validationCustom01">الرقم القومي لولي الأمر</label>
                                <input type="text" name="guardian_national_number" class="form-control" id="validationCustom01" placeholder="الرقم القومي لولي الأمر" value="{{$student->guardian_national_number}}" required>

                                <div class="invalid-feedback">
                                    من فضلك أدخل الرقم القومي لولي الأمر
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="validationCustom01">الإميل</label>
                                <input type="email" name="email" class="form-control" id="validationCustom01" placeholder="example@gmail.com" value="{{$student->email}}" required>

                                <div class="invalid-feedback">
                                    من فضلك أدخل الإميل
                                </div>
                            </div>
                            {{--                            </div>--}}

                        </div>

                        <div class="row">
                            {{--                            <div class="col-md-12">--}}
                            <div class="form-group col-md-4">
                                <h5 class="font-size-14 mb-4">الترشيحات</h5>
                                <div class="custom-control custom-checkbox mb-3">
                                @if($student->ministry_nomination)
                                    <input type="checkbox" name="ministry_nomination" value="{{$student->ministry_nomination}}" class="custom-control-input" id="customCheck1"  checked>
                                @else
                                    <input type="checkbox" name="ministry_nomination" value="1" class="custom-control-input" id="customCheck1"  >
                                @endif
                                    <label class="custom-control-label" for="customCheck1">ترشيح الوزارة </label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                @if($student->school_nomination)
                                    <input type="checkbox" name="school_nomination" value="{{$student->school_nomination}}"  class="custom-control-input" id="customCheck2" checked>
                                @else
                                <input type="checkbox" name="school_nomination" value="1"  class="custom-control-input" id="customCheck2" >
                                @endif
                                    <label class="custom-control-label" for="customCheck2">ترشيح الهيئه التعليمة</label>
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
                        <h4 class="card-title">مدرسة الطالب وبرنامجه</h4>
                        <p class="card-title-desc" style="display:inline-block">اسناد الطاب إلى الهيئه التعليمة والبرنامج الخاص به </p>

                    <div class="row " id="programContainer">
                        <div class="form-group col-md-6 ">
                            <label class="control-label">اختر مدرسة</label>
                            <select name="school" class="form-control select2" id="school" required>
                                <option value="{{$student->school()->id}}">{{$student->school()->name}}</option>
                                @foreach($schools as $school)
                                    @if($school->id != $student->school()->id)
                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label class="control-label" id='studentProgramId' programId="{{$student->program()[1]->id}}">اختر برنامج</label>
                            <select name="program_school_id" id="program"  class="form-control select2" required>
                                <option value="{{$student->program()[1]->id}}">{{$student->program()[1]->name}}</option>
                            </select>
                        </div>

                    </div>

                    </div>
                </div>
            </div>
        </div>


        <button class="btn btn-primary" type="submit">تحديث الطالب</button>
    </form>
@endsection

@section('script')
    <script>
        $(function(){
            $('#school').trigger( "change" );
        })
        $('#school').change(function(){
            var selected = $( "#school option:selected" ).val();

            let url = "/associated/"+selected,
                studentprogramId = $("#studentProgramId").attr('programId');

            $.post( url, function( data ) {
                $.each(data, function(key,valueObj){
                    if(key != studentprogramId)
                        $('#program').append(' <option value="'+key+'">'+valueObj+'</option>');
                });


            });

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
