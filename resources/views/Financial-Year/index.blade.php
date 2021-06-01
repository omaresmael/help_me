@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">جميع السنوات المالية</h4>
                    <p class="card-category">إحصائية السنوات المالية وميزانياتها </p>
{{--                    @if(auth()->user()->can('create',\App\Models\Program::class))--}}
                        <a href="{{route('financial_years.create')}}" class="btn btn-warning btn-sm">اضافة سنة مالية</a>
{{--                    @endif--}}
                </div>
                <div class="ml-auto mr-3">
                    <a href="{{route('financial_years.exportToExcel')}}" download=""  class="btn btn-info">
                        <i class="fas fa-cloud-download-alt"></i>
                        Export To Excel
                    </a>
                    <form action="{{ route('financial_years.importFromExcel') }}" class="d-inline-block" method="POST"
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
                                <th data-priority="3">السنة</th>
                                <th data-priority="1">تبدأ من</th>
                                <th data-priority="3">تنتهي عند</th>
                                <th data-priority="3">عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($financialYears as $i => $financialYear)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$financialYear->year}}</td>
                                    <td>{{$financialYear->start_at}}</td>
                                    <td>{{$financialYear->end_at}}</td>
                                    <td>

{{--                                        @if(auth()->user()->can('update',\App\Models\Program::class))--}}

{{--                                        @endif--}}
                                        @if($financialYear->status == 'current')
                                        <form action="{{route('financial_years.update',$financialYear->id)}}" method="post"> <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                                                @csrf
                                                @method('PUT')
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                        @else
                                            <form action="{{route('financial_years.budget',$financialYear->id)}}" method="post"> <button type="submit" rel="tooltip"  class="btn btn-danger btn-round">
                                                    @csrf

                                                    <i class="material-icons">account_balance_wallet</i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد سنوات مالية </h3>
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
            $('#financial_years').addClass('active');
        });
    </script>
@endsection
