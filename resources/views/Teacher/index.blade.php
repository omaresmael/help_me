@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> المعلمين</h4>
                    <div style="position: relative">
                        <p class="card-category">احصائية المعلمين والهيئات التعليمية العاملين بها</p>

                        <a href="{{route('teachers.create')}}" style=" top: -107%; left: 0 " class="float-left">
                            <button class="btn btn-warning btn-sm">إضافة معلم</button>
                        </a>
                    </div>

                </div>
                <div class="ml-auto mr-3">
                    <a href="{{route('teachers.exportToExcel')}}" download="" class="btn btn-info">
                        <i class="fas fa-cloud-download-alt"></i>
                        Export To Excel
                    </a>
                    <form action="{{ route('teachers.importFromExcel') }}" class="d-inline-block" method="POST"
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
                                <th class="text-center">#</th>
                                <th>الاسم</th>
                                <th>التخصص</th>
                                <th>المؤهل</th>
                                <th>الوظيفة</th>
                                <th>الجنسية</th>
                                <th>الرقم المدني</th>
                                <th>رقم موافقة الهيئة</th>
                                <th>تاريخ موافقة الهيئة</th>

                                <th>اسم الهيئة التعليمية</th>
                                <th class="text-left">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($teachers as $teacher)

                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->speciality}}</td>
                                    <td>{{$teacher->qualification}}</td>
                                    <td>{{$teacher->job}}</td>
                                    <td>{{$teacher->nationality}}</td>
                                    <td>{{$teacher->national_number}}</td>
                                    <td>{{$teacher->entity_acceptance_number}}</td>
                                    <td>{{$teacher->entity_acceptance_date}}</td>

                                    <td>{{$teacher->school->name}}</td>
                                    <td class="td-actions text-left">
                                        <!-- <button type="button" rel="tooltip" class="btn btn-info btn-round">
                                            <i class="material-icons">person</i>
                                        </button> -->
                                        <a href="/teachers/{{$teacher->id}}/edit"
                                           class='btn btn-success btn-round btn-sm'> <i class="fas fa-edit"></i></a>

                                        <!-- <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                            <i class="material-icons">close</i>
                                        </button> -->
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد معلمين </h3>
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
        $(function () {
            $('#teachers').addClass('active');
        });
    </script>
@endsection
