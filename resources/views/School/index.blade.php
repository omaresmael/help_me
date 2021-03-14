@extends('layouts.app-layout')
@section('content')
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">هيئات تعليمة</h4>
                  <p class="card-category">جميع بيانات هيئات تعليمة</p>
                  <a href="{{route('schools.create')}}" style="top: -107%; left: 0 " class="float-left"><button class="btn btn-warning btn-sm">إضافة هيئة تعليمة</button></a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th class="text-center">الكود</th>
                              <th class="text-center">اسم الهيئة التعليمية</th>
                              <th class="text-right"></th>
                              <th class="text-right">العنوان</th>
                              <th >الحالة</th>
                              <th >رقم التليفون</th>
                              <th >الإيميل</th>
                              <th >عدد الطلاب</th>
                              <th class="text-center">عمليات</th>
                          </tr>
                      </thead>
                      <tbody>
                      @forelse($schools as $i => $school)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$school->name}}</td>
                            <td>{{$school->address}}</td>
                            <td>{{$school->state}}</td>
                            <td>{{$school->phone_number}}</td>
                            <td>{{$school->email}}</td>
                            <td>{{$school->studentsNumber()}}</td>
                            <td>
                                <a href="/schools/{{$school->id}}/edit" class='btn btn-success btn-round btn-sm'>تعديل</a>
                                <a href="/financial_report/{{$school->id}}" id="financial_button" class='btn btn-info btn-sm'>التقرير المالي</a>
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
$(function() {
  $('#schools').addClass('active');
}); 
</script>
@endsection