@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">المختصين</h4>
                    <p class="card-category">جميع بيانات المختصين</p>
                    <a href="{{route('users.create')}}" style="top: -107%; left: 0 " class="float-left"><button class="btn btn-warning btn-sm">إضافة مختص</button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">الاسم</th>
                                <th class="text-center">الإميل</th>
                                <th class="text-center">الوظيفة</th>
                                <th class="text-center">عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $i => $user)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td style="width: 20%">{{$user->email}}</td>
                                    <td>{{$user->position}}</td>

                                    <td>

                                        @if(auth()->user()->can('show',\App\User::class))
                                        <a href="/users/{{$user->id}}" class='btn btn-info btn-round  btn-sm'> <i class="fas fa-user"></i></a>
                                        @endif
                                        @if(auth()->user()->can('update',\App\User::class))
                                            <a href="/users/{{$user->id}}/edit" class='btn btn-success btn-round btn-sm'> <i class="fas fa-edit"></i></a>
                                        @endif
                                        {{--                                <a href="/users/{{$user->id}}/edit" class='btn btn-danger btn-round btn-sm'> <i class="fas fa-trash"></i></a>--}}
                                        @if(auth()->user()->can('delete',\App\User::class) and $user->id != auth()->user()->id)
                                        <form action="{{route('users.destroy',$user->id)}}" method="post"> <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                                                @csrf
                                                @method('DELETE')
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <h3>لا يوجد مختصين </h3>
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
            $('#users').addClass('active');
        });
    </script>
@endsection
