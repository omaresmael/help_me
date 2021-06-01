@extends('layouts.app-layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">جميع البرامج</h4>
                <p class="card-category">إحصائية البرامج المتاحة وعدد المدارس والطلاب المشتركين في كل برنامج </p>
                <a href="{{route('programs.create')}}"  style="top: -107%; left: 0 " class="float-left"><button class="btn btn-warning btn-sm">إضافة برنامج</button></a>
            </div>
            <div class="ml-auto mr-3">
                <a href="{{route('programs.exportToExcel')}}" download="" class="btn btn-info">
                    <i class="fas fa-cloud-download-alt"></i>
                    Export To Excel
                </a>
                <form action="{{ route('programs.importFromExcel') }}" class="d-inline-block" method="POST"
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th data-priority="1">#</th>
                                <th data-priority="3">اسم البرنامج</th>
                                <th data-priority="1">عدد الهيئات التعليمية</th>
                                <th data-priority="3">عدد الطلاب</th>
                                <th data-priority="3">عمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($programs as $i => $program)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$program->name}}</td>
                                <td>{{$program->schools->count()}}</td>
                                <td>{{$program->studentsNumber()}}</td>
                                <td>


                                    <a href="/programs/{{$program->id}}/edit" class="btn btn-success btn-round btn-sm"><i class="material-icons">edit</i></a>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <h3>لا يوجد برامج </h3>
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
        $('#programs').addClass('active');
    });
</script>
@endsection
