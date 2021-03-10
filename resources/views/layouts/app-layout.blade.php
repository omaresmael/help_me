<!DOCTYPE html>
<html lang="en">
    @include('Inc.app-head')
    <body class="">
        <div class="wrapper ">
            @include('Inc.app-sidebar')
            @include('Inc.app-navbar')
            <div class="main-panel">      
                <div class="content">
                    <div class="container-fluid">
                    @include('Inc.messages')
                    @yield('content')
                    </div>
                </div>
            </div>
        </div>
    @include('Inc.app-scripts')
    </body>
</html>