@extends('layouts.master')
@section('title') المدارس @endsection
@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title') المدارس @endslot
        @slot('li_1') Tables @endslot
        @slot('li_2') المدارس @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">المدارس المتاحة</h4>
                    <p class="card-title-desc" style="display:inline-block">إحصائية المدارس المتاحة </p>
                    <a href="{{route('schools.create')}}"> <button type="button" style="float: left; top: -18px;" class="btn btn-primary waves-effect waves-light">إنشاء مدرسة جديدة
                        </button></a>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table">
                                <thead>
                                <tr>

                                    <th data-priority="1">#</th>
                                    <th data-priority="3">اسم المدرسة</th>
                                    <th data-priority="1">العنوان</th>
                                    <th data-priority="3">الحالة</th>
                                    <th data-priority="3">رقم التليفون</th>
                                    <th data-priority="3">الإيميل</th>
                                    <th data-priority="3">عدد الطلاب</th>
                                    <th data-priority="3">تقارير</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schools as $i => $school)
                                    <tr>

                                        <td>{{$i+1}}</td>
                                        <td>{{$school->name}}</td>
                                        <td>{{$school->address}}</td>
                                        <td>{{$school->state}}</td>
                                        <td>{{$school->phone_number}}</td>
                                        <td>{{$school->email}}</td>
                                        <td>{{$school->studentsNumber()}}</td>
                                        <td>
                                            <button type="button" id="financial_button" class="btn btn-info">التقرير المالي</button>
                                        </td>

                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>

                    </div>

{{--                    <div class="table-rep-plugin">--}}
{{--                        <div class="table-responsive mb-0" data-pattern="priority-columns">--}}
{{--                            <table id="tech-companies-1" class="table">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}

{{--                                    <th data-priority="1">#</th>--}}
{{--                                    <th data-priority="3">اسم المدرسة</th>--}}
{{--                                    <th data-priority="1">القيمة المبدئية</th>--}}
{{--                                    <th data-priority="3">القيمة الستحقة</th>--}}


{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @if($re)--}}
{{--                                    <tr>--}}

{{--                                        <td>{{$i+1}}</td>--}}
{{--                                        <td>{{$school->name}}</td>--}}
{{--                                        <td>{{$school->address}}</td>--}}
{{--                                        <td>{{$school->state}}</td>--}}
{{--                                        <td>{{$school->phone_number}}</td>--}}
{{--                                        <td>{{$school->email}}</td>--}}
{{--                                        <td>{{$school->studentsNumber()}}</td>--}}
{{--                                        <td>--}}
{{--                                            <button type="button" id="financial_button" class="btn btn-info">التقرير المالي</button>--}}
{{--                                        </td>--}}

{{--                                    </tr>--}}
{{--                                @endforeach--}}



{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}

{{--                    </div>--}}

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

    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js')}}"></script>

@endsection
