@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">بينات البرامج للهيئة التعليمية: {{$school->name}}</h4>
                    <p class="card-category">جميع بيانات البرامج</p>
                    <button class="btn btn-warning btn-sm" id="print">طباعة</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>

                                <th class="text-center">#</th>
                                <th class="text-center">اسم البرانامج</th>
                                <th class="text-center">عدد الطلبة</th>
                                <th>بداية الدوام</th>
                                <th>نهاية الدوام</th>
                                <th>سعر البرنامج </th>


                            </tr>
                            </thead>
                            <tbody>
                            @forelse($programs as $i => $program)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$program->name}}</td>
                                    <td>{{$program->studentsNumberPerSchool($school)}}</td>
                                    <td>{{$program->pivot->start_at}}</td>
                                    <td>{{$program->pivot->end_at}}</td>
                                    <td>{{$program->pivot->program_price}}</td>



                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد برامج </h3>
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
