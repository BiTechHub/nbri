  <footer class="main-footer">
	  &copy; 2025 <a href="#">Business Innovations</a>. All Rights Reserved.
  </footer>
  <div class="control-sidebar-bg"></div>

</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!-- jQuery (required by Bootstrap and DataTables) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Popper.js (required for Bootstrap) -->
<script src="{{url('/')}}/admin/assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap JS (required for modals and other Bootstrap components) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>

<!-- Slimscroll (if you need scrollable content) -->
<script src="{{url('/')}}/admin/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Moment.js (used for time-related functions, like in date pickers) -->
<script src="{{url('/')}}/admin/assets/vendor_components/moment/min/moment.min.js"></script>

<!-- Bootstrap Date Range Picker (if you're using it in your project) -->
<script src="{{url('/')}}/admin/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Raphael.js (for creating vector graphics, e.g., in charts) -->
<script src="{{url('/')}}/admin/assets/vendor_components/raphael/raphael.min.js"></script>

<!-- Morris.js (for charting) -->
<script src="{{url('/')}}/admin/assets/vendor_components/morris.js/morris.min.js"></script>

<!-- jQuery Sparkline (for creating sparklines in charts) -->
<script src="{{url('/')}}/admin/assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- FullCalendar (if you're using a calendar view) -->
<script src="{{url('/')}}/admin/assets/vendor_components/fullcalendar/fullcalendar.js"></script>
<script src="{{url('/')}}/admin/js/pages/calendar.js"></script>

<!-- C3.js and D3.js (for charts, if you're using them) -->
<script src="{{url('/')}}/admin/assets/vendor_components/c3/d3.min.js"></script>
<script src="{{url('/')}}/admin/assets/vendor_components/c3/c3.min.js"></script>

<!-- ECharts (if you're using charts with ECharts) -->
<script src="{{url('/')}}/admin/assets/vendor_components/echarts/dist/echarts-en.min.js"></script>

<!-- FastClick (to eliminate click delays on browsers with touch interfaces) -->
<script src="{{url('/')}}/admin/assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- Your Template JS (main script to handle page and template logic) -->
<script src="{{url('/')}}/admin/js/template.js"></script>

<!-- Dashboard Script -->
<script src="{{url('/')}}/admin/js/pages/dashboard4.js"></script>

<!-- Demo Script (if needed for testing or demo purposes) -->
<script src="{{url('/')}}/admin/js/demo.js"></script>

<!-- CKEditor (for rich text editor) -->
<script src="{{url('/')}}/admin/assets/vendor_components/ckeditor/ckeditor.js"></script>

<!-- Bootstrap WYSIHTML5 (rich text editor plugin) -->
<script src="{{url('/')}}/admin/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>

<!-- Editor Initialization Script -->
<script src="{{url('/')}}/admin/js/pages/editor.js"></script>
@if(session('status'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('status') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif


</body>

</html>
