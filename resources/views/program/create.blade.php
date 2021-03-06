@extends('layouts.master')
@section('title') البرامج @endsection
@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
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

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">برنامج جديد</h4>
                    <p class="card-title-desc">إنشاء برنامج جديد ليتم إسناده لاحقا إلى المدارس التي ستشترك به </p>
                    <form class="needs-validation" action="{{route('programs.store')}}" method="post" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">اسم البرنامج</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="اسم البرنامج" value="" required>

                                    <div class="invalid-feedback">
                                        من فضلك أدخل الإسم
                                    </div>
                                </div>
                            </div>

                        </div>




                        <button class="btn btn-primary" type="submit">حفظ البرنامج</button>
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
@endsection
