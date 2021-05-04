@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> الجزاءات</h4>
                    <div style="position: relative">
                        <p class="card-category" >إحصائية الجزاءات</p>
                            <a href="{{route('fines.create')}}" style=" position: absolute; top: -107%; left: 0 " class="float-left"><button class="btn btn-warning btn-sm">إضافة جزاء جديد</button></a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>اسم المُصدر</th>
                                <th>اسم الهيئة التعليمية</th>
                                <th>قيمة الجزاء</th>
                                <th >العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($fines as $fine)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$fine->issuer_name}}</td>
                                    <td>{{$fine->school->name}}</td>
                                    <td>{{$fine->amount}}</td>

                                    <td >
{{--                                        <button type="button" rel="tooltip" class="btn btn-info btn-round">--}}
{{--                                            <i class="material-icons">person</i>--}}
{{--                                        </button>--}}
                                            <a href="/fines/{{$fine->id}}/edit" class='btn btn-success btn-round btn-sm'> <i class="fas fa-edit"></i></a>
                                
                                            <form action="{{route('fines.destroy',$fine->id)}}" method="post"> <button type="submit" rel="tooltip" class="btn btn-danger btn-round btn-sm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد جزاءات </h3></tr>
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
        $(function() {
            $('#fines').addClass('active');
        });
    </script>
@endsection
