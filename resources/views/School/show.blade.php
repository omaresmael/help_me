@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">بينات الهيئة التعليمية: {{$school->name}}</h4>
                    <p class="card-category">احصائية الهئية التعليمية والبرامج المتاحة بها والطلبة المنتسبين إليها</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">الكود</th>
                                <th>الاسم</th>
                                <th>تاريخ الميلاد</th>
                                <th>تاريخ الالتحاق</th>
                                <th class="text-right">البرنامج</th>
                                <th class="text-right">تكلفة البرنامج</th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Andrew Mike</td>
                                <td>5/5/2000</td>
                                <td>5/5/2020</td>
                                <td>الدمج</td>
                                <td class="text-right">&euro; 99,225</td>
                                <td class="td-actions text-right">
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
                            <tr>
                                <td class="text-center">1</td>
                                <td>Andrew Mike</td>
                                <td>5/5/2000</td>
                                <td>5/5/2020</td>
                                <td>الدمج</td>
                                <td class="text-right">&euro; 99,225</td>
                                <td class="td-actions text-right">
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
