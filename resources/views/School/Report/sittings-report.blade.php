@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">بيانات الحصص للهيئة التعليمية: {{$school->name}}</h4>
                    <p class="card-category">جميع بيانات الحصص</p>
                    <button class="btn btn-warning btn-sm" id="print">طباعة</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>

                                <th class="text-center">#</th>
                                <th class="text-center">اسم الحصة</th>
                                <th class="text-center">المعلم</th>
                                <th>عدد الطلبة</th>
                                <th>سعر الحصة</th>
                                <th>تاريخ البداية</th>
                                <th>تاريخ النهاية</th>



                            </tr>
                            </thead>
                            <tbody>
                            @forelse($sittings as $i => $sitting)

                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$sitting->name}}</td>
                                    <td>{{$sitting->teacher->name}}</td>
                                    <td>{{$sitting->student->count()}}</td>
                                    <td>{{$sitting->price}}</td>
                                    <td>{{$sitting->start_at}}</td>
                                    <td>{{$sitting->end_at}}</td>




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
