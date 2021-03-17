@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">بينات الطلبة للهيئة التعليمية: {{$school->name}}</h4>
                    <p class="card-category">جميع بيانات الطلبة</p>
                    <button class="btn btn-warning btn-sm" id="print">طباعة</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>

                                <th class="text-center">#</th>
                                <th class="text-center">اسم الطالب</th>
                                <th class="text-right">البرنامج المنتسب إليه</th>
                                <th>بداية الدوام</th>
                                <th>نهاية الدوام</th>
                                <th >عدد أيام أيام الغياب </th>
                                <th>نوع الإعاقة </th>
                                <th>شدة الإعاقة</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($students as $i => $student)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->program()[1]->name}}</td>
                                    <td>{{$student->program()[0]->pivot->start_at}}</td>
                                    <td>{{$student->program()[0]->pivot->end_at}}</td>
                                    <td>{{$student->TotalabsenceDays()}}</td>
                                    <td>{{$student->disability_type}}</td>
                                    <td>{{$student->disability_power}}</td>


                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد طلبة </h3>
                                </tr>
                            @endforelse
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
