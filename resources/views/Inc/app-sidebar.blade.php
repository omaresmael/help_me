<div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/back.png">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal"></a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="nav-item" id='dashboard'>
            <a class="nav-link" href="{{route('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>الصفحه الرئيسية</p>
            </a>
        </li>
        <li class="nav-item " id='students'>
            <a class="nav-link" href="{{route('students.index')}}">
            <i class="fas fa-users"></i>
            <p>جميع طلاب</p>
            </a>
        </li>
        <li class="nav-item " id='schools'>
            <a class="nav-link" href="{{route('schools.index')}}">
            <i class="fas fa-school"></i>
            <p>الهيئات التعليميه</p>
            </a>
        </li>
        <li class="nav-item " id='programs'>
            <a class="nav-link" href="{{route('programs.index')}}">
            <i class="fas fa-book-reader"></i>
            <p>البرامج</p>
            </a>
        </li>
        <li class="nav-item " id='teachers'>
            <a class="nav-link" href="{{route('teachers.index')}}">
            <i class="fas fa-chalkboard-teacher"></i>
            <p>اعضاء هيئة التدريس</p>
            </a>
        </li>
        <li class="nav-item " >
            <a class="nav-link" href="{{route('programs.index')}}">
            <i class="fas fa-user-graduate"></i>
            <p>الدفعات</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="./tables.html">
            <i class="material-icons">content_paste</i>
            <p>الحسابات</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="./typography.html">
            <i class="material-icons">library_books</i>
            <p>الترشيحات</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
            <i class="material-icons">bubble_chart</i>
            <p>التسجيلات الاونلاين</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="./map.html">
            <i class="material-icons">location_ons</i>
            <p>حول التطبيق</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
            <i class="material-icons">notifications</i>
            <p>تعديل بيانات الحساب</p>
            </a>
        </li>

        </ul>
    </div>
</div>
