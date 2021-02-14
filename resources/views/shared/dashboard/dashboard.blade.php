@extends('shared.app')

@section('css')
    <link href="{{ asset('js/sb-admin-2/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('css-dashboard')
@endsection

@section('content')
    <div id="page-top">
        <div id="wrapper">

            @yield('sidebar-dashboard')

            <div id="content-wrapper" class="d-flex flex-column">

                @yield('content-dashboard')

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
        </div>
    </div>
@endsection

@push('myJS')
    <script src="{{ asset('js/sb-admin-2/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2/main/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2/main/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2/main/demo/chart-pie-demo.js') }}"></script>
    @stack('dashboardJS')
@endpush
