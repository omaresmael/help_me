@extends('layouts.app-layout')
@section('content')
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> الحصص</h4>
                    <div style="position: relative">
                        <p class="card-category" >احضائية الحصص المتاحة والعلمين وعدد الطلاب المنتسبين لكل حصةا</p>
                        <a href="{{route('sittings.create')}}" style=" position: absolute; top: -107%; left: 0 " class="float-left"><button class="btn btn-warning btn-sm">إضافة حصة</button></a>
                    </div>

                </div>
                  <div class="ml-auto mr-3">
                      <a href="{{route('sittings.exportToExcel')}}" download=""  class="btn btn-info">
                          <i class="fas fa-cloud-download-alt"></i>
                          Export To Excel
                      </a>
                      <form action="{{ route('sittings.importFromExcel') }}" class="d-inline-block" method="POST"
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
                              <th>اسم المعلم</th>
                              <th>اسم المدرسة</th>
                              <th>سعر الحصة</th>
                              <th>اسم الطالب</th>
                              <th class="text-left">العمليات</th>
                          </tr>
                      </thead>
                      <tbody>
                      @forelse($sittings as $sitting)
                          <tr>
                              <td class="text-center">{{$loop->iteration}}</td>
                              <td>{{$sitting->name}}</td>
                              <td>{{$sitting->teacher->name}}</td>
                              <td>{{$sitting->teacher->school->name}}</td>
                              <td>{{$sitting->price}}</td>
                              <td>{{$sitting->student->name}}</td>
                              <td class="td-actions text-left">
{{--                                <button type="button" rel="tooltip" class="btn btn-info btn-round">--}}
{{--                                    <i class="material-icons">person</i>--}}
{{--                                </button>--}}
{{--                                <button type="button" rel="tooltip" class="btn btn-success btn-round">--}}
{{--                                    <i class="material-icons">edit</i>--}}
{{--                                </button>--}}

                               <form action="{{route('sittings.destroy',$sitting->id)}}" method="post"> <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                                       @csrf
                                       @method('DELETE')
                                    <i class="material-icons">close</i>
                                </button>
                               </form>
                            </td>
                          </tr>
                          @empty
                          <tr>
                              <h3>لا يوجد حصص </h3>
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
  $('#sittings').addClass('active');
});
</script>
@endsection
