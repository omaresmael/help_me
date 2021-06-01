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
                            <thead class="thead-dark">
                            <tr>
                                <th class="text-center">الرقم المدني</th>
                                <th class="text-center">إسم الطالب</th>
                                <th class="text-center">رقم المدرسة</th>
                                <th class="text-center">إسم المدرسة</th>
                                <th class="text-center">رسوم المدرسة</th>
                                <th class="text-center">رسوم الطالب</th>
                                <th class="text-center">بداية الدوام</th>
                                <th class="text-center">نهاية الدوام</th>
                                <th class="text-center">عدد الأيام</th>
                                <th class="text-center">الدفعة الأولي</th>
                                <th class="text-center">الدفعة الثانية</th>
                                <th class="text-center">الدفعة الثالثة</th>
                                <th class="text-center">الدفعة الرابعة</th>
                                <th class="text-center">إجمالي المدفوع</th>
                                <th class="text-center">المتبقي</th>
                                <th class="text-center">نوع القرار</th>
                                <th class="text-center">الفصل</th>
                                <th class="text-center">نوع الإعاقة</th>
                                <th class="text-center">وصف شدة الإعاقة</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td class="text-center">{{$student->national_number}}</td>
                                    <td class="text-center">{{$student->name}}</td>
                                    <td class="text-center">{{$student->data->school->code}}</td>
                                    <td class="text-center">{{$student->data->school->name}}</td>
                                    <td class="text-center">رسوم المدرسة</td>
                                    <td class="text-center">رسوم الطالب</td>
                                    <td class="text-center">بداية الدوام</td>
                                    <td class="text-center">نهاية الدوام</td>
                                    <td class="text-center">عدد الأيام</td>
                                    <td class="text-center">الدفعة الأولي</td>
                                    <td class="text-center">الدفعة الثانية</td>
                                    <td class="text-center">الدفعة الثالثة</td>
                                    <td class="text-center">الدفعة الرابعة</td>
                                    <td class="text-center">إجمالي المدفوع</td>
                                    <td class="text-center">المتبقي</td>
                                    <td class="text-center">نوع القرار</td>
                                    <td class="text-center">الفصل</td>
                                    <td class="text-center">نوع الإعاقة</td>
                                    <td class="text-center">وصف شدة الإعاقة</td>
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
