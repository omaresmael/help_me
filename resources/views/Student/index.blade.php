@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">الطلاب</h4>
                    <p class="card-category">جميع بيانات طلاب</p>

                    <a href="{{route('students.create')}}" style="top: -107%; left: 0 " class="float-left">
                        <button class="btn btn-warning btn-sm">إضافة طالب</button>
                    </a>
                </div>
                <div class="ml-auto mr-3">
                    <a href="{{route('students.exportToExcel')}}" download=""  class="btn btn-info">
                        <i class="fas fa-cloud-download-alt"></i>
                        Export To Excel
                    </a>
                    <form action="{{ route('students.importFromExcel') }}" class="d-inline-block" method="POST"
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
                                <th class="text-center">اسم الطالب</th>
                                <th class="text-center">رقم المدني</th>
                                <th>الإيميل</th>
                                <th>الهيئة التعليمية</th>
                                <th>البرنامج الملحق به</th>
                                <th>تاريخ الإسناد</th>
                                <th class="text-center">عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($students as $i => $student)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->national_number}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->school()?$student->school()->name:'لم يتم إسناده إلى هيئة تعليمية حتى الآن'}}</td>
                                    <td>{{$student->program()?$student->program()[1]->name:'لم يتم إساناده إلى برنامج حتى الآن'}}</td>
                                    <td>{{$student->date_send}}</td>
                                    <td>

                                        <a href="{{route('students.show',$student->id)}}"
                                           class='btn btn-info btn-round  btn-sm'> <i class="fas fa-user"></i></a>

                                        <a href="/students/{{$student->id}}/edit"
                                           class='btn btn-success btn-round btn-sm'> <i class="fas fa-edit"></i></a>

                                        {{--                                <a href="/students/{{$student->id}}/edit" class='btn btn-danger btn-round btn-sm'> <i class="fas fa-trash"></i></a>--}}
                                        {{--                                <a href="/financial_report/{{$student->id}}" id="financial_button" class='btn btn-info btn-sm'>التقرير المالي</a>--}}
                                        @if(auth()->user()->can('delete',\App\Models\Student::class))
                                            <form action="{{route('students.destroy',$student->id)}}" method="post">
                                                <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                                                    @csrf
                                                    @method('DELETE')
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد طلاب </h3>
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
            $('#students').addClass('active');
        });
    </script>
@endsection
