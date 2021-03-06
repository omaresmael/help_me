@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">هيئات تعليمة</h4>
                    <p class="card-category">جميع بيانات هيئات تعليمة</p>

                    <a href="{{route('schools.create')}}" style="top: -107%; left: 0 " class="float-left">
                        <button class="btn btn-warning btn-sm">إضافة هيئة تعليمة</button>
                    </a>
                </div>
                <div class="ml-auto mr-3">
                    <a href="{{route('schools.exportToExcel')}}" download="" class="btn btn-info">
                        <i class="fas fa-cloud-download-alt"></i>
                        Export To Excel
                    </a>
                    <form action="{{ route('schools.importFromExcel') }}" class="d-inline-block" method="POST"
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
                                <th>#</th>
                                <th class="text-center">الكود</th>
                                <th class="text-center">اسم الهيئة التعليمية</th>
                                <th class="text-center">العنوان</th>
                                <th>رقم التليفون</th>
                                <th>الإيميل</th>
                                <th>عدد الطلاب</th>
                                <th class="text-center">عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($schools as $i => $school)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$school->code}}</td>
                                    <td>{{$school->name}}</td>
                                    <td style="width: 20%">{{$school->address}}</td>
                                    <td>{{$school->phone_number}}</td>
                                    <td>{{$school->email}}</td>
                                    <td>{{$school->studentsNumber()}}</td>
                                    <td>

                                        <a href="/schools/{{$school->id}}" class='btn btn-info btn-round  btn-sm'> <i
                                                class="fas fa-school"></i></a>

                                        <a href="/schools/{{$school->id}}/edit"
                                           class='btn btn-success btn-round btn-sm'> <i class="fas fa-edit"></i></a>

                                        {{--                                <a href="/schools/{{$school->id}}/edit" class='btn btn-danger btn-round btn-sm'> <i class="fas fa-trash"></i></a>--}}

                                        <form action="{{route('schools.destroy',$school->id)}}" method="post">
                                            <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                                                @csrf
                                                @method('DELETE')
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد هيئات تعليمة </h3>
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
            $('#schools').addClass('active');
        });
    </script>
@endsection
