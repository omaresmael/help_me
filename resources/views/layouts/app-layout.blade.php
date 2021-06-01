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
        <script>
            var options = {
                classname: 'my-class',
                id: 'my-id',
                target: document.getElementById('myDivId')
            };

            var nanobar = new Nanobar( options );

            //move bar
            nanobar.go( 30 ); // size bar 30%
            nanobar.go( 76 ); // size bar 76%

            // size bar 100% and and finish
            nanobar.go(100);
        </script>
    @include('Inc.app-scripts')
    </body>
</html>
