@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">بينات البرامج للهيئة التعليمية: {{$school->name}}</h4>
                    <p class="card-category">جميع بيانات المعلمين</p>
                    <button class="btn btn-warning btn-sm" id="print">طباعة</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>

                                <th class="text-center">#</th>
                                <th class="text-center">اسم المعلم</th>
                                <th class="text-center">الجنسية</th>
                                <th>الوظيفة</th>
                                <th>عدد الحصص</th>



                            </tr>
                            </thead>
                            <tbody>
                            @forelse($teachers as $i => $teacher)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->nationality}}</td>
                                    <td>{{$teacher->job}}</td>
                                    <td>{{$teacher->sittings()->count()}}</td>




                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد معلمين </h3>
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
        function printData()
        {


            $('#print').css('visible','hidden');

            window.print();


        }

        $('#print').on('click',function(){
            printData();
        })
    </script>
@endsection
