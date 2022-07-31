@include('admin.partials.head')
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('admin.partials.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('admin.partials.main_menu')

    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    {{-- important for layout --}}
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('admin.partials.footer')
    <!-- END: Footer-->

    @yield('page_js')
</body>
<!-- END: Body-->

</html>