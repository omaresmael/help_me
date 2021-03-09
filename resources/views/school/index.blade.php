@extends('layouts.master')
@section('title') الهيئات التعليميه@endsection
@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title') الهيئات التعليميه@endslot
        @slot('li_1') Tables @endslot
        @slot('li_2') الهيئات التعليميه@endslot
    @endcomponent

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session()->pull('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">الهيئات التعليميه المتاحة</h4>
                    <p class="card-title-desc" style="display:inline-block">إحصائية الهيئات التعليميه المتاحة </p>
                    <a href="{{route('schools.create')}}"> <button type="button" style="float: left; top: -18px;" class="btn btn-primary waves-effect waves-light">إنشاء هيئه التعليميه جديدة
                        </button></a>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table">
                                <thead>
                                <tr>

                                    <th data-priority="1">#</th>
                                    <th data-priority="3">اسم الهيئه التعليمة</th>
                                    <th data-priority="1">العنوان</th>
                                    <th data-priority="3">الحالة</th>
                                    <th data-priority="3">رقم التليفون</th>
                                    <th data-priority="3">الإيميل</th>
                                    <th data-priority="3">عدد الطلاب</th>
                                    <th data-priority="1">عمليات</th>

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
                                            <a href="/schools/{{$school->id}}/edit" class='btn btn-primary btn-sm'>تعديل</a>
                                            <a href="/financial_report/{{$school->id}}" id="financial_button" class='btn btn-info btn-sm'>التقرير المالي</a>
                                        </td>

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

    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js')}}"></script>

@endsection
