@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">بيانات الدفعات للهيئة التعليمية: {{$school->name}}</h4>
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
                                <th class="text-center">الجزاءات</th>
                                <th class="text-center">إجمالي المدفوع</th>
                                <th class="text-center">المتبقي</th>
                                {{--                                <th class="text-center">الفصل</th>--}}
                                <th class="text-center">نوع الإعاقة</th>

                                <th class="text-center">وصف شدة الإعاقة</th>




                            </tr>
                            </thead>
                            <tbody>
                            @foreach($school->students as $student)

                                <tr>

                                    <td>{{$loop->iteration}}</td>

                                    <td>{{$student->name}}</td>
                                    <td>{{$student->national_number}}</td>
                                    <td>{{$school->code}}</td>
                                    <td>{{$school->name}}</td>
                                    <td>{{$student->program()[0]->pivot->program_price}}</td>
                                    <td>{{$student->working_days * $student->program()[0]->pivot->program_day_price}}</td>
                                    <td>{{$student->attendance_begin}}</td>
                                    <td>{{$student->attendance_end}}</td>
                                    <td>{{$student->working_days}}</td>
                                    @php
                                        $actualPeriods = 0;
                                    @endphp
                                    @foreach($periods as $period)
                                        @php
                                            $actualPeriods += $student->working_days * $student->program()[0]->pivot->program_day_price * $period->financial_ratio / 100;
                                        @endphp
                                        <td>{{$student->working_days * $student->program()[0]->pivot->program_day_price * $period->financial_ratio / 100}}</td>
                                    @endforeach
                                    <td>{{$school->fines()->sum('amount') / $school->students()->count()}}</td>
                                    <td>{{$school->periods()->sum('deserved_value') / $school->students()->count()}}</td>
                                    <td>{{$student->program()[0]->pivot->program_price - 2 * $school->periods()->sum('deserved_value') / $school->students()->count() + $actualPeriods}}</td>
                                    <td>{{$student->disability_type}}</td>
                                    <td>{{$student->disability_power}}</td>

                                </tr>
                            @endforeach
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
    </script>
@endsection
