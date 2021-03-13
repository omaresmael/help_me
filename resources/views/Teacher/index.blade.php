@extends('layouts.app-layout')
@section('content')
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> المعلمين</h4>
                    <div style="position: relative">
                        <p class="card-category" >احصائية المعلمين والهيئات التعليمية العاملين بها</p>
                        <a href="{{route('teachers.create')}}" style=" position: absolute; top: -107%; left: 0 " class="float-left"><button class="btn btn-info">إضافة معلم</button></a>
                    </div>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                          <tr>
                              <th class="text-center">#</th>
                              <th>الاسم</th>
                              <th>اسم المدرسة</th>
                              <th class="text-left">العمليات</th>
                          </tr>
                      </thead>
                      <tbody>
                      @forelse($teachers as $teacher)
                          <tr>
                              <td class="text-center">{{$loop->iteration}}</td>
                              <td>{{$teacher->name}}</td>
                              <td>{{$teacher->school->name}}</td>
                              <td class="td-actions text-left">
                                <button type="button" rel="tooltip" class="btn btn-info btn-round">
                                    <i class="material-icons">person</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                          </tr>
                          @empty
                          <tr>
                              <h3>لا يوجد معلمين </h3>
                              <p>يمكنك أضافة معلمين من  </p>
                              <a href="{{route('teachers.create')}}"><strong style="font-weight: bold">هنا</strong></a>
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
  $('#teachers').addClass('active');
});
</script>
@endsection
