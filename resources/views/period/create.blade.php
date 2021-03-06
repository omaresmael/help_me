@extends('layouts.master')
@section('title') الدفعات @endsection
@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title')  @endslot
        @slot('li_1')  @endslot
        @slot('li_2') البرامج @endslot
    @endcomponent

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session()->get('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    @if(session()->has('errors'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->pull('errors')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">دفعة جديد</h4>
                    <p class="card-title-desc">إنشاء دفعة جديد ليتم إسناده لاحقا إلى المدارس التي ستشترك به </p>
                    <form class="needs-validation" action="{{route('periods.store')}}" method="post" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">اسم الدفعة</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="اسم الدفعة" value="" required>

                                    <div class="invalid-feedback">
                                        من فضلك أدخل الإسم
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">النسبة المالية</label>
                                    <input type="text" name="financial_ratio" class="form-control" id="validationCustom01" placeholder="النسبة المالية" value="" required>

                                    <div class="invalid-feedback">
                                        من فضلك أدخل النسبة المالية
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 col-md-4">
                                <label>
                                    مدة الدفعة
                                </label>
                                <div>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
                                        <input type="text" class="form-control" placeholder="يبدأ من" name="start_at" required />
                                        <input type="text" class="form-control" placeholder="ينتهي عند" name="end_at" required />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="control-label">أضف المدارس</label>

                                    <select class="select2 form-control select2-multiple" name="schools[]" multiple="multiple" data-placeholder="اختر المدارس">
                                        @foreach($schools as $i => $school)
                                            <option value="{{$school->id}}">{{$school->name}}</option>

                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>




                        <button class="btn btn-primary" type="submit">حفظ الدفعة</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->


    </div>
@endsection

@section('script')

    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js')}}"></script>
@endsection
