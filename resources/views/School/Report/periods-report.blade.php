@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">بيانات الدفعات للهيئة التعليمية: {{$school->name}}</h4>
                    <p class="card-category"> {{$school->address}} </p>
                    <p class="card-category">جميع بيانات الدفعات</p>
                    <button class="btn btn-warning btn-sm" id="print">طباعة</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>

                                <th class="text-center">#</th>
                                <th class="text-center">اسم الطالب</th>
                                <th class="text-center">الرقم المدني</th>
                                <th class="text-center">رقم الهيئة التعليمية</th>
                                <th class="text-center">اسم الهيئة التعليمية</th>
                                <th class="text-center">رسوم الهيئة التعليمية</th>
                                <th class="text-center">رسوم الطالب</th>
                                <th class="text-center">بداية الدوام</th>
                                <th class="text-center">نهاية الدوام</th>
                                <th class="text-center">عدد الأيام</th>
                                @foreach($periods as $period)
                                    <th class="text-center">{{$period->name}}</th>
                                @endforeach
                                <th class="text-center">إجمالي المدفوع</th>
                                <th class="text-center">المتبقي</th>
                                <th class="text-center">الفصل</th>
                                <th class="text-center">نوع التقرير</th>
                                <th class="text-center">نوع الإعاقة</th>

                                <th class="text-center">وصف شدة الإعاقة</th>




                            </tr>
                            </thead>
                            <tbody>
                            @foreach($school->students as $student)
{{--                                @dd($student->program()[0]->pivot->program_day_price)--}}
                                <tr>

                                    <td>{{$loop->iteration}}</td>

                                    <td>{{$student->name}}</td>
                                    <td>{{$student->national_number}}</td>
                                    <td>{{$school->code}}</td>
                                    <td>{{$school->name}}</td>
                                    <td>{{$student->program()[0]->pivot->program_price}}</td>
                                    <td>{{($student->working_days- $student->absenceDays($period)->pivot->absence_days) * $student->program()[0]->pivot->program_day_price}}</td>
                                    <td>{{$student->attendance_begin}}</td>
                                    <td>{{$student->attendance_end}}</td>
                                    <td>{{$student->working_days - $student->absenceDays($period)->pivot->absence_days}}</td>
                                    @php
                                        $actualPeriods = 0;
                                    @endphp
                                    @foreach($periods as $period)
                                        @php

                                            $actualPeriods += ($student->working_days - $student->absenceDays($period)->pivot->absence_days) * $student->program()[0]->pivot->program_day_price * $period->financial_ratio / 100;
                                        @endphp
                                        <td>{{($student->working_days - $student->absenceDays($period)->pivot->absence_days) * $student->program()[0]->pivot->program_day_price * $period->financial_ratio / 100}}</td>
                                    @endforeach
{{--                                    <td>{{$school->fines()->sum('amount') / $school->students()->count()}}</td>--}}
                                    <td class="total">{{$actualPeriods}}</td>
                                    <td class="remainder">{{($student->working_days - $student->totalabsenceDays()) * $student->program()[0]->pivot->program_day_price - $actualPeriods}}</td>
                                    <td>{{$student->section}}</td>
                                    <td>{{$student->report_type}}</td>
                                    <td>{{$student->disability_type}}</td>
                                    <td>{{$student->disability_power}}</td>

                                </tr>
                            @endforeach
                                <tr>
                                    <td>المجموع</td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @foreach($periods as $period)
                                        <td></td>
                                    @endforeach


                                    <td></td>
                                    <td></td>
                                    <td id="totTotal"></td>
                                    <td id="totRemainder"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>



                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('inc-scripts')
    <script>
        function printData()
        {


            $('#print').css('visible','hidden');

            window.print();


        }

        $('#print').on('click',function(){
            printData();
        })
        $(document).ready(function(){
            var total = 0;
            var remainder = 0;
            $('.total').each(function(key,item){
                 total +=  parseFloat(item.innerText);
            })
            $('.remainder').each(function(key,item){

                remainder +=  parseFloat(item.innerText);
            })
            console.log(remainder)

            var totTotal = $('#totTotal').text(total);
            var totRemainder = $('#totRemainder').text(remainder);

        })
    </script>
@endsection
