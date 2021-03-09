@extends('layouts.master')
@section('title') الدفعات @endsection
@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title') الدفعات @endslot
        @slot('li_1') Tables @endslot
        @slot('li_2') الدفعات @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">الدفعات المتاحة</h4>
                    <p class="card-title-desc" style="display:inline-block">إحصائية الدفعات المتاحة وعدد الطلاب والهيئات التعليميهالمشتركين بكل دفعة</p>
                    <a href="{{route('periods.create')}}"> <button type="button" style="float: left; top: -18px;" class="btn btn-primary waves-effect waves-light">إنشاء دفعة جديد
                        </button></a>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table">
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
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
@section('script')

    <!-- Responsive Table js -->
    <script src="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.js')}}"></script>

    <!-- Init js -->
    <script src="{{ URL::asset('/assets/js/pages/table-responsive.init.js')}}"></script>

@endsection
