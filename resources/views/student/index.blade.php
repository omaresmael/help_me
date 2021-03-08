@extends('layouts.master')
@section('title') الطلاب @endsection
@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title') الطلاب @endslot
        @slot('li_1') Tables @endslot
        @slot('li_2') الطلاب @endslot
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

                    <h4 class="card-title">الطلاب المسجلين</h4>
                    <p class="card-title-desc" style="display:inline-block">إحصائية الطلاب المسجلين</p>
                    <a href="{{route('students.create')}}"> <button type="button" style="float: left; top: -18px;" class="btn btn-primary waves-effect waves-light">إضافة طالب جديد
                        </button></a>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table">
                                <thead>
                                <tr>
                                    <th data-priority="1">#</th>
                                    <th data-priority="3">اسم الطالب</th>
                                    <th data-priority="3">الرقم القومي </th>
                                    <th data-priority="1">اسم ولي الأمر</th>
                                    <th data-priority="3">الرقم القومي لولي الأمر</th>
                                    <th data-priority="3">الإيميل </th>
                                    <th data-priority="3">المدرسة</th>
                                    <th data-priority="3">البرنامج</th>
                                    <th data-priority="1">عمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $i => $student)
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->national_number}}</td>
                                        <td>{{$student->guardian_name}}</td>
                                        <td>{{$student->guardian_national_number}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->school()->name}}</td>
                                        <td>{{$student->program()->name}}</td>
                                        <td>
                                            <a href="\students/{{$student->id}}/edit" class='btn btn-primary'>تعديل</a>
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



@endsection
