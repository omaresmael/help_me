@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">جميع الاطفال</h4>
                    <p class="card-category">جميع بيانات الاطفال</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>

                                <th data-priority="1">#</th>
                                <th data-priority="3">اسم البرنامج</th>
                                <th data-priority="1">عدد الهيئات التعليمية</th>
                                <th data-priority="3">عدد الطلاب</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($programs as $i => $program)
                                <tr>

                                    <td>{{$i+1}}</td>
                                    <td>{{$program->name}}</td>
                                    <td>{{$program->schools->count()}}</td>
                                    <td>{{$program->studentsNumber()}}</td>

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
            $('#schools').addClass('active');
        });
    </script>
@endsection
