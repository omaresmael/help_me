@extends('layouts.app-layout')
@section('css_includes')
    <style>
        .modal-content{
            margin: 9em auto;
            width: fit-content;
            background-color: white;
        }

        .timepicker_wrapper{
            display: none;
            position: fixed;
            z-index: 99;
            top: 0;
            left: 0;
            background-color: #00000082;
            width: 100%;
            height: 100vh;
            direction: initial;
        }

        .timepicker_hour,
        .timepicker_minute,
        .timepicker_ampm{
            scroll-behavior: smooth;
            -ms-overflow-style: none;
            scrollbar-width: none;
            border: 1px solid #80808080;
            color: #0000009e;
            font-weight: bold;
        }

        .timepicker_hour::-webkit-scrollbar,
        .timepicker_minute::-webkit-scrollbar,
        .timepicker_ampm::-webkit-scrollbar{
            display: none;
        }

        .timepicker_hour option,
        .timepicker_minute option,
        .timepicker_ampm option{
            font-weight: bold;
            padding: 5px 25px;
        }

        .timepicker_control{text-align: end;margin-top: 5px;margin-bottom: 10px;}

        .timepicker_control button{
            padding: 7px 15px;
            border: none;
            font-weight: bold;
            background-color: #46aa4a;
            color: white;
            margin-left: 8px;
        }
        .timepicker_wrapper_main{
            width: fit-content;
            border: 1px solid gray;
            padding: 0px 12px;
        }

        .timepicker_control button:first-child{background-color: #ff0000db;color: white;margin-left: 15px;}

        .timepicker_header{text-align: center;color: #0000008a;margin: 5px 0px;}


    </style>
@endsection
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
                                    @if($errors->has("name"))
                                        <small style="color: red">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">السعر</label>
                                    <input type="text" name="price" class="form-control" required>
                                    @if($errors->has("price"))
                                        <small style="color: red">{{$errors->first('price')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="bmd-label-floating">التاريخ</label>
                                    <input type="text" name="date" value="{{old('date')}}" class="form-control datepicker" required>
                                    @if($errors->has("date"))
                                        <small style="color: red">{{$errors->first('date')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">تبدأ من</label>
                                    <input type="text" name="start_at" onclick="timepicker(this,'a')"  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">تنتهي عند</label>
                                    <input type="text" name="end_at" onclick="timepicker(this,'a')"  class="form-control">
                                </div>
                            </div>
                            <div class="timepicker_wrapper" >
                                <div class="modal-content">
                                    <div class="timepicker_wrapper_main">
                                        <p class="timepicker_header">
                                            <b>12</b>:<b>00</b>
                                            <b>AM</b>
                                        </p>
                                        <div class="timepicker_data_select">
                                            <select onchange="changeTimepickerheader(this,'1')" size="5" class="timepicker_hour"></select>
                                            <select onchange="changeTimepickerheader(this,'2')" size="5"  class="timepicker_minute"></select>
                                            <select onchange="changeTimepickerheader(this,'3')" size="5" class="timepicker_ampm">
                                                <option value="AM">AM</option><option value="PM">PM</option>
                                            </select>
                                        </div>
                                        <div class="timepicker_control">
                                            <button onclick="timepicker(this,'x')">الغاء</button><button onclick="timepicker(this,'c')">مسح</button><button onclick="timepicker(this,'s')">اضافة</button>
                                        </div>
                                    </div>
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
        var c_t = "";
        function timepicker(el,S){
            event.preventDefault();
            var div = document.querySelector('.timepicker_wrapper')
            function pad(n) {
                var len = 2 - (''+n).length;
                return (len > 0 ? new Array(++len).join('0') : '') + n
            }

            if (S == 'a'){
                html = "";
                for(i=1;i<=12;i++){
                    html += '<option value="'+pad(i)+'">'+pad(i)+'</option>'
                }
                document.querySelector('.timepicker_hour').innerHTML = html

                html = "";
                for(i=0;i<=59;i++){
                    html += '<option value="'+pad(i)+'">'+pad(i)+'</option>'
                }
                document.querySelector('.timepicker_minute').innerHTML = html

                c_t = "";
                c_t = el;
                document.querySelector('.timepicker_wrapper').style.display = "block";

            }
            if(S == 'c'){
                document.querySelector('.timepicker_hour').value = "";
                document.querySelector('.timepicker_minute').value = "";
                document.querySelector('.timepicker_ampm').value = "";
                c_t.value = "";
            }
            if(S == 'x'){
                div.style.display = "block";
            }
            if(S == 's'){
                var hr = document.querySelector('.timepicker_hour').value;
                var min = document.querySelector('.timepicker_minute').value;
                var am = document.querySelector('.timepicker_ampm').value;
                if(hr != "" && min != "" && am != ""){
                    c_t.value = hr+":"+min+" "+am;
                    div.style.display = "none";
                }


            }
        }

        function changeTimepickerheader(el ,S){
            var k = document.querySelectorAll('.timepicker_header b')
            if(S == '1'){
                k[0].innerHTML = el.value
            }
            if(S == '2'){
                k[1].innerHTML = el.value
            }
            if(S == '3'){
                k[2].innerHTML = el.value
            }
        }

    </script>
@endsection
