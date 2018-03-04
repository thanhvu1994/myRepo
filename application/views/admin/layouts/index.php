<!-- load tag head -->
<?php $this->load->view('admin/layouts/head'); ?>
<!-- load content page -->
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <?php
            if ($this->router->fetch_class() != 'login') {
                $this->load->view('admin/layouts/nav');
                $this->load->view('admin/layouts/sidebar');
            }
        ?>
        <?php $this->load->view($content); ?>

        <!-- /#wrapper -->
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/jquery/dist/jquery.min.js')?>"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('themes/admin/bootstrap/dist/js/bootstrap.min.js')?>"></script>
        <!-- Menu Plugin JavaScript -->
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')?>"></script>
        <!--slimscroll JavaScript -->
        <script src="<?php echo base_url('themes/admin/js/jquery.slimscroll.js')?>"></script>
        <!--Wave Effects -->
        <script src="<?php echo base_url('themes/admin/js/waves.js')?>"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('themes/admin/js/custom.min.js')?>"></script>
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/datatables/jquery.dataTables.min.js')?>"></script>
        <!-- start - This is for export functionality only -->
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        <!-- end - This is for export functionality only -->
        <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;

                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                                );

                                last = group;
                            }
                        });
                    }
                });

                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        // $('#example23').DataTable({
        //     dom: 'Bfrtip',
        //     buttons: [
        //         // 'excel', 'pdf', 'print'
        //     ],
        // });
        </script>
        <!--Style Switcher -->
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')?>"></script>

        <!-- jQuery -->
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js')?>"></script>
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/counterup/jquery.counterup.min.js')?>"></script>
        <?php if ($content == 'admin/site/index'): ?>
            <!--Morris JavaScript -->
            <script src="<?php echo base_url('themes/admin/plugins/bower_components/raphael/raphael-min.js')?>"></script>
            <script src="<?php echo base_url('themes/admin/plugins/bower_components/morrisjs/morris.js')?>"></script>
            <!-- Custom Theme JavaScript -->
            <script src="<?php echo base_url('themes/admin/js/dashboard1.js')?>"></script>
        <?php endif ?>
        
        <!-- Sparkline chart JavaScript -->
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')?>"></script>
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js')?>"></script>
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/toast-master/js/jquery.toast.js')?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.toast({
                    heading: 'Welcome to Agile admin',
                    text: 'Use the predefined ones, or specify a custom position object.',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'info',
                    hideAfter: 3500,
                    stack: 6
                })
            });
        </script>
    </body>

</html>