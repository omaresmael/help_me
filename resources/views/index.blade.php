@extends('layouts.master')
@section('title') الرئيسية @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/jquery-vectormap/jquery-vectormap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') الرئيسية @endslot
    @slot('li_1')  @endslot
    @slot('li_2')  @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                <img style="float: left;" src="{{URL::asset('assets/images/dashboard/children.png')}}"  height="55px">
                                    <p class="text-truncate font-size-14 mb-2">عدد الطلااب</p>
                                    <h4 class="mb-0">{{$students->count()}}</h4>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                <img style="float: left;" src="{{URL::asset('assets/images/dashboard/school.png')}}"  height="55px">
                                    <p class="text-truncate font-size-14 mb-2">عدد الهيئات التعليمية</p>
                                    <h4 class="mb-0">{{$schools->count()}}</h4>
                                </div>
                                <div class="text-primary">
{{--                                    <i class="ri-store-2-line font-size-24"></i>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                <img style="float: left;" src="{{URL::asset('assets/images/dashboard/program.png')}}"  height="55px">
                                    <p class="text-truncate font-size-14 mb-2">عدد البرامج</p>
                                    <h4 class="mb-0">{{$programs->count()}}</h4>
                                </div>
                                <div class="text-primary">
{{--                                    <i class="ri-briefcase-4-line font-size-24"></i>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="card">
                <div class="card-body">
{{--                    <div class="float-right d-none d-md-inline-block">--}}
{{--                        <div class="btn-group mb-2">--}}
{{--                            <button type="button" class="btn btn-sm btn-light">Today</button>--}}
{{--                            <button type="button" class="btn btn-sm btn-light active">Weekly</button>--}}
{{--                            <button type="button" class="btn btn-sm btn-light">Monthly</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <h4 class="card-title mb-4">أفضل الهيئات التعليمية</h4>
                    <div>
                        <div id="line-column-chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>

{{--                <div class="card-body border-top text-center">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-4">--}}
{{--                            <div class="d-inline-flex">--}}
{{--                                <h5 class="mr-2">$12,253</h5>--}}
{{--                                <div class="text-success">--}}
{{--                                    <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <p class="text-muted text-truncate mb-0">This month</p>--}}
{{--                        </div>--}}

{{--                        <div class="col-sm-4">--}}
{{--                            <div class="mt-4 mt-sm-0">--}}
{{--                                <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-primary font-size-10 mr-1"></i> This Year :</p>--}}
{{--                                <div class="d-inline-flex">--}}
{{--                                    <h5 class="mb-0 mr-2">$ 34,254</h5>--}}
{{--                                    <div class="text-success">--}}
{{--                                        <i class="mdi mdi-menu-up font-size-14"> </i>2.1 %--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-4">--}}
{{--                            <div class="mt-4 mt-sm-0">--}}
{{--                                <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-success font-size-10 mr-1"></i> Previous Year :</p>--}}
{{--                                <div class="d-inline-flex">--}}
{{--                                    <h5 class="mb-0">$ 32,695</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>


    </div>
    <!-- end row -->


    <!-- end row -->


    <!-- end row -->
    @endsection

    @section('script')
            <!-- plugin js -->
            <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

            <!-- jquery.vectormap map -->
            <script src="{{ URL::asset('/assets/libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>

            <!-- Responsive examples -->
            <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

            <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js')}}"></script>

    @endsection

