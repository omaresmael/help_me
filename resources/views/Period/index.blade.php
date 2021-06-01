@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> الدفعات</h4>
                    <div style="position: relative">
                        <p class="card-category" >احصائية بالدفعات المتاحة</p>

                        <a href="{{route('periods.create')}}" style=" top: -107%; left: 0; position: absolute;" class="float-left"><button class="btn btn-warning btn-sm">إضافة دفعة جديدة</button></a>
                    </div>

                </div>
                <div class="ml-auto mr-3">
                    <a href="{{route('periods.exportToExcel')}}" download=""  class="btn btn-info">
                        <i class="fas fa-cloud-download-alt"></i>
                        Export To Excel
                    </a>
                    <form action="{{ route('periods.importFromExcel') }}" class="d-inline-block" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" onchange="$(this).parent().submit();" class="d-none">
                        <button type="button" onclick="$(this).prev().trigger('click');" class="btn btn-success">
                            <i class="fas fa-cloud-upload-alt"></i>
                            Import From Excel
                        </button>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table">
                            <thead>
                            <tr>

                                <th data-priority="1">#</th>
                                <th data-priority="3">اسم الدفعة</th>
                                <th data-priority="1">النسبة المالية</th>
                                <th data-priority="3">عدد الهيئات التعليمية</th>
                                <th data-priority="3">عمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($periods as $i => $period)
                                <tr>

                                    <td>{{$i+1}}</td>
                                    <td>{{$period->name}}</td>
                                    <td>%{{$period->financial_ratio}}</td>
                                    <td>{{$period->schools->count()}}</td>
                                    <td><a href="/periods/{{$period->id}}/edit" class='btn btn-success btn-round btn-sm'> <i class="fas fa-edit"></i></a></td>


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
            $('#periods').addClass('active');
        });
    </script>
@endsection


<!-- end row -->
