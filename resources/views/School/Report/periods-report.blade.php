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
                                <th class="text-center">اسم الدفعة</th>
                                <th class="text-center">القيمة الأولية</th>
                                <th>الجزاءات</th>
                                <th>تكلفة الغياب</th>
                                <th>القيمة المستحقة</th>
                                <th>تاريخ البداية</th>
                                <th>تاريخ النهاية</th>



                            </tr>
                            </thead>
                            <tbody>
                            @forelse($periods as $i => $period)

                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$period->name}}</td>
                                    <td>{{$period->pivot->initial_value}}</td>
                                    <td>{{isset($fines[$period->id])?$fines[$period->id]:0}}</td>
                                    <td>0</td>
                                    <td>{{$period->pivot->deserved_value}}</td>
                                    <td>{{$period->start_at}}</td>
                                    <td>{{$period->end_at}}</td>





                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد دفعات </h3>
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
