@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "></h4>
                    <p class="card-category">جميع البيانات </p>
                    <button class="btn btn-warning btn-sm" id="print">طباعة</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">رقم الهيئة التعليمية</th>
                                <th class="text-center">اسم الهيئة التعليمية</th>
                                <th class="text-center">رسوم الهيئة التعليمية</th>
                                <th class="text-center">الرسوم الفعلية</th>
                                @foreach($periods as $period)
                                    <th class="text-center">{{$period->name}}</th>
                                @endforeach
                                <th class="text-center">إجمالي المدفوع</th>
                                <th class="text-center">المتبقي</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schools as $school)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$school->code}}</td>
                                        <td>{{$school->name}}</td>
                                        <td>{{$school->getSchoolTotalRowMoney()}}</td>
                                        @php
                                            $actualPeriods = 0;
                                            $totalPeriodMoney = 0;
                                            $totalMoney = 0;
                                        @endphp
                                        @foreach($students as $student)
                                            @php
                                             $totalMoney += ($student->working_days - $student->totalAbsenceDays()) * $student->program()[0]->pivot->program_day_price;
                                            @endphp

                                        @endforeach

                                        <td>{{$totalMoney}}</td>
                                        @foreach($periods as $period)
                                            @foreach($students as $student)
                                                @php
                                                    $actualPeriods += ($student->working_days -$student->absenceDays($period)->pivot->absence_days) * $student->program()[0]->pivot->program_day_price * $period->financial_ratio / 100;
                                                $totalPeriodMoney += ($student->working_days - $student->absenceDays($period)->pivot->absence_days) * $student->program()[0]->pivot->program_day_price * $period->financial_ratio / 100;

                                                @endphp

                                            @endforeach
                                            <td>{{$totalPeriodMoney}}</td>
                                            @php
                                            $totalPeriodMoney = 0;
                                            @endphp

                                        @endforeach
                                        <td>{{$actualPeriods}}</td>
                                        <td>{{$totalMoney - $actualPeriods}}</td>


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
