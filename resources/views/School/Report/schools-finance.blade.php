@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "></h4>
                    <p class="card-category">جميع بيانات المعلمين</p>
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
{{--                                <th class="text-center">الفصل</th>--}}
                                <th class="text-center">نوع الإعاقة</th>
                                <th class="text-center">وصف شدة الإعاقة</th>




                            </tr>
                            </thead>
                            <tbody>

                            @foreach($schools as $school)
                                @foreach($school->students as $student)
                                    <tr>

                                        <td>1</td>

                                        <td>{{$student->name}}</td>
                                        <td>{{$student->national_number}}</td>
                                        <td>{{$school->code}}</td>
                                        <td>{{$school->name}}</td>
                                        <td>{{$school->getSchoolEntitlements($school->getSchoolTotalRowMoney())}}</td>
                                        <td>{{$student->program()[0]->pivot->program_price}}</td>
                                        <td>{{$student->program()[0]->pivot->start_at}}</td>
                                        <td>{{$student->program()[0]->pivot->end_at}}</td>
                                        <td>{{$student->program()[1]->working_days}}</td>
                                        @foreach($periods as $period)
                                        <td>{{$school->periods()->where('periods.id',$period->id)->get()[0]->pivot->deserved_value}}</td>
                                        @endforeach
                                        <td>{{$school->periods()->sum('deserved_value')}}</td>
                                        <td>{{$school->getSchoolEntitlements($school->getSchoolTotalRowMoney()) - $school->periods()->sum('deserved_value')}}</td>
                                        <td>{{$student->disability_type}}</td>
                                        <td>{{$student->disability_power}}</td>

                                    </tr>
                                @endforeach
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
