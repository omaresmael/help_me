@extends('layouts.master')
@section('title') التقرير المالي @endsection
@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title') التقرير المالي للهيئات التعليمية @endslot
        @slot('li_1') Tables @endslot
        @slot('li_2') التقرير المالي للهيئات التعليمية@endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">الهيئات المتاحة</h4>
                    <p class="card-title-desc" style="display:inline-block">إحصائية الهيئات التعليمية المتاحة </p>
                    <button id="print"  style="float: left; top: -18px; position: relative;
    margin-left: 3px;" type="button" class="btn btn-success">طباعة</button>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table">
                                <thead>
                                <tr>


                                    <th data-priority="3">اسم الهيئة التعليمية</th>
                                    <th data-priority="1">عدد الطلاب</th>
                                    <th data-priority="1">عدد البرامج</th>
                                    <th  data-priority="1">رسوم الهيئة التعليمية</th>
                                    <th data-priority="1">الغرامات</th>
                                    <th data-priority="1">المستحق</th>
                                    <th  data-priority="1">المدفوع</th>
                                    <th data-priority="3">المتبقي</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schools as $school)
                                <tr>
                                    <td>{{$school->name}}</td>
                                    <td>{{$school->studentsNumber()}}</td>
                                    <td>{{$school->programs()->count()}}</td>
                                    <td>{{$school->getSchoolTotalRowMoney()}}</td>
                                    <td>{{$school->getSchoolTotalFines()}}</td>
                                    <td>{{$value = $school->getSchoolTotalRowMoney() - $school->getSchoolTotalFines()}}</td>
                                    <td>{{$school->periods()->sum('deserved_value')}}</td>
                                    <td>{{$value - $school->periods()->sum('deserved_value')}}</td>
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
    {{--    <div class="row">--}}
    {{--        <div class="col-12">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-body">--}}

    {{--                    <h4 class="card-title">التقرير المالي</h4>--}}
    {{--                    <p class="card-title-desc" style="display:inline-block"> التقرير المالي للمؤسسة التعليمية: <span style="font-weight: bold">{{$school->name}}</span></p>--}}
    {{--                    <p>رسوم المؤسسة التعليمية الكلية:  <span style="font-weight: bold">{{$rowMoney}}</span></p>--}}

    {{--                        </button></a>--}}
    {{--                    <div class="table-rep-plugin">--}}
    {{--                        <div class="table-responsive mb-0" data-pattern="priority-columns">--}}
    {{--                            <table id="tech-companies-1" class="table">--}}
    {{--                                <thead>--}}
    {{--                                <tr>--}}

    {{--                                    <th data-priority="1">#</th>--}}
    {{--                                    <th data-priority="3">اسم الطالب</th>--}}
    {{--                                    <th data-priority="3">الرقم القومي</th>--}}
    {{--                                    @foreach($periods as $period)--}}
    {{--                                        <th data-priority="1">{{$period->name}}</th>--}}
    {{--                                    @endforeach--}}

    {{--                                    <th data-priority="3">بداية الدوام</th>--}}
    {{--                                    <th data-priority="3">نهاية الدوام</th>--}}
    {{--                                    <th data-priority="3">عدد الأيام</th>--}}
    {{--                                    <th data-priority="3">نوع الإعاقة</th>--}}


    {{--                                </tr>--}}
    {{--                                </thead>--}}
    {{--                                <tbody>--}}
    {{--                                @foreach($students as $i => $student)--}}
    {{--                                    <tr>--}}

    {{--                                        <td>{{$i+1}}</td>--}}
    {{--                                        <td>{{$student->name}}</td>--}}
    {{--                                        <td>{{$student->national_number}}</td>--}}
    {{--                                        @foreach($periods as $period)--}}

    {{--                                            <td data-priority="1">{{$period->pivot->initial_value}}</td>--}}
    {{--                                        @endforeach--}}
    {{--                                        <td>{{$student->program()[0]->pivot->start_at}}</td>--}}
    {{--                                        <td>{{$student->program()[0]->pivot->end_at}}</td>--}}
    {{--                                        <td>{{$student->program()[1]->working_days}}</td>--}}
    {{--                                        <td>{{$student->program()[1]->name}}</td>--}}


    {{--                                    </tr>--}}
    {{--                                @endforeach--}}



    {{--                                </tbody>--}}
    {{--                            </table>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}



    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div> <!-- end col -->--}}
    {{--    </div> <!-- end row -->--}}


@endsection
@section('script')

    <!-- Responsive Table js -->
    <script src="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.js')}}"></script>

    <!-- Init js -->
    <script src="{{ URL::asset('/assets/js/pages/table-responsive.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js')}}"></script>

    <script>
        function printData()
        {
            $('.btn-toolbar').css('display','none');

            $('#print').css('visible','hidden');

            window.print();
            setTimeout(() => {  $('.btn-toolbar').css('display','block');
                $('.waves-effect').css('display','inline-block'); }, 500);

        }

        $('#print').on('click',function(){
            printData();
        })
    </script>

@endsection
