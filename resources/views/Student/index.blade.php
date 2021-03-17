@extends('layouts.app-layout')
@section('content')
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">الطلاب</h4>
                  <p class="card-category">جميع بيانات طلاب</p>
                  <a href="{{route('students.create')}}" style="top: -107%; left: 0 " class="float-left"><button class="btn btn-warning btn-sm">إضافة طالب </button></a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th class="text-center">اسم الطالب</th>
                              <th class="text-center">رقم القومي</th>
                              <th >الإيميل</th>
                              <th >الهيئة التعليمية</th>

                              <th >البرنامج الملحق به</th>
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
                            <td>{{$student->school()->name}}</td>
                            <td>{{$student->program()[1]->name}}</td>
                            <td>
                                <a href="/students/{{$student->id}}" class='btn btn-info btn-round  btn-sm'> <i class="fas fa-user"></i></a>
                                <a href="/students/{{$student->id}}/edit" class='btn btn-success btn-round btn-sm'> <i class="fas fa-edit"></i></a>
                                <a href="/students/{{$student->id}}/edit" class='btn btn-danger btn-round btn-sm'> <i class="fas fa-trash"></i></a>
                                <a href="/financial_report/{{$student->id}}" id="financial_button" class='btn btn-info btn-sm'>التقرير المالي</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <h3>لا يوجد طلاب  </h3>
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
  $('#students').addClass('active');
});
</script>
@endsection
