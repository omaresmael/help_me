@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> الدفعات</h4>
                    <div style="position: relative">
                        <p class="card-category" >احصائية بالدفعات المتاحة</p>
                        <a href="{{route('periods.create')}}" style=" top: -107%; left: 0; position: absolute;" class="float-left"><button class="btn btn-warning btn-sm">إضافة دفعة جديدة</button></a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table">
                            <thead>
                            <tr>

                                <th data-priority="1">#</th>
                                <th data-priority="3">اسم الدفعة</th>
                                <th data-priority="1">النسبة المالية</th>
                                <th data-priority="3">عدد الهيئات التعليمية</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($periods as $i => $period)
                                <tr>

                                    <td>{{$i+1}}</td>
                                    <td>{{$period->name}}</td>
                                    <td>%{{$period->financial_ratio}}</td>
                                    <td>{{$period->schools->count()}}</td>


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
        $(function() {
            $('#periods').addClass('active');
        });
    </script>
@endsection


<!-- end row -->