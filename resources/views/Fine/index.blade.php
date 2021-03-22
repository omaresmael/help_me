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
{{--                                <th class="text-left">العمليات</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($fines as $fine)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$fine->issuer_name}}</td>
                                    <td>{{$fine->school->name}}</td>
                                    <td>{{$fine->amount}}</td>

{{--                                    <td class="td-actions text-left">--}}
{{--                                        <button type="button" rel="tooltip" class="btn btn-info btn-round">--}}
{{--                                            <i class="material-icons">person</i>--}}
{{--                                        </button>--}}
{{--                                        <button type="button" rel="tooltip" class="btn btn-success btn-round">--}}
{{--                                            <i class="material-icons">edit</i>--}}
{{--                                        </button>--}}
{{--                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round">--}}
{{--                                            <i class="material-icons">close</i>--}}
{{--                                        </button>--}}
{{--                                    </td>--}}
                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد جزاءات </h3>
                                    <p>يمكنك إضافة جزاءات من  </p>
                                    <a href="{{route('fines.create')}}"><strong style="font-weight: bold">هنا</strong></a>
                                </tr>
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
