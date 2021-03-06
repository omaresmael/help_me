@extends('layouts.app-layout')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">الغياب</h4>
                    <div style="position: relative">
                        <p class="card-category" >إضافة غياب للطلبةا</p>

                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{route('absence.update')}}" method="post">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>الاسم</th>
                                <th>الهيئة التعليمية</th>
                                <th>عدد أيام الغيام</th>
                                <th>إضافة أيام غياب</th>
                                <th>عمليات</th>


                            </tr>
                            </thead>
                            <tbody>
                            @forelse($students as $student)

                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$student->name}}</td>
                                    @if($student->school())
                                    <td>{{$student->school()->name}}</td>
                                    @else
                                    <td></td>
                                    @endif	
                                    <td>{{$student->totalAbsenceDays()}}</td>

                                        @csrf
                                        <td><input  class="form-control" type="text" name="days"></td>
                                            <input type="hidden" name="student_id" value="{{$student->id}}">
                                        <td><input class="btn btn-primary" type="submit" value="إضافة أيام الغياب"></td>

                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد طلبة </h3>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('inc-scripts')
    <script>
        $(function() {
            $('#students').addClass('active');
        });
    </script>
@endsection
