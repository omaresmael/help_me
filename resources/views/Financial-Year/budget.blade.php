@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> الميزانيات</h4>
                    <p class="card-category">إحصائية الميزانيات للسنة المالية المغلقة</p>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th data-priority="1">#</th>
                                <th data-priority="3">السنة المالية</th>
                                <th data-priority="1">اسم المدرسة</th>
                                <th data-priority="3">رسوم المدرسة</th>
                                <th data-priority="3">الرسوم الفعلية</th>
                                <th data-priority="3">إجمالي المدفوع </th>
                                <th data-priority="3">المتبقي</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($budgets as $i => $budget)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$budget->financialYear->year}}</td>
                                    <td>{{$budget->school_name}}</td>
                                    <td>{{$budget->school_fees}}</td>
                                    <td>{{$budget->actual_fees}}</td>
                                    <td>{{$budget->total}}</td>
                                    <td>{{$budget->remainder}}</td>

                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد ميزانيات  </h3>
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
