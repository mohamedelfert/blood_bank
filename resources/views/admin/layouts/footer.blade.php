            <footer class="main-footer">
                <strong>Copyright &copy; 2021-2022 <a href="#">{{ trans('main.brand') }}</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{ url('/design/admin/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('/design/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('/design/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ url('/design/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ url('/design/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('/vendor/datatables/buttons.server-side.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ url('/design/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        @if(appDirection() == 'ltr')
            <script src="{{ url('/design/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @else
            <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
        @endif
        <!-- ChartJS -->
        <script src="{{ url('/design/admin/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ url('/design/admin/plugins/sparklines/sparkline.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ url('/design/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ url('/design/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ url('/design/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ url('/design/admin/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ url('/design/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ url('/design/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- Internal Modal js-->
        <script src="{{ url('design/admin/dist/js/modal.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ url('/design/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ url('/design/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ url('/design/admin/dist/js/adminlte.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ url('/design/admin/dist/js/demo.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ url('/design/admin/dist/js/pages/dashboard.js') }}"></script>

        @stack('js')
        @stack('css')
        <!-- Toastr -->
        @jquery
        @toastr_js
        @toastr_render
    </body>
</html>
