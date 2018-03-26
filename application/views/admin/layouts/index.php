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
                $this->load->view('admin/layouts/sidebar'); ?>
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <?php $this->load->view($template); ?>
                        <!-- .right-sidebar -->
                        <div class="right-sidebar">
                            <div class="slimscrollright">
                                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                                <div class="r-panel-body">
                                    <ul>
                                        <li><b>Layout Options</b></li>
                                        <li>
                                            <div class="checkbox checkbox-info">
                                                <input id="checkbox1" type="checkbox" class="fxhdr">
                                                <label for="checkbox1"> Fix Header </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-warning">
                                                <input id="checkbox2" type="checkbox" checked="" class="fxsdr">
                                                <label for="checkbox2"> Fix Sidebar </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-success">
                                                <input id="checkbox4" type="checkbox" class="open-close">
                                                <label for="checkbox4"> Toggle Sidebar </label>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul id="themecolors" class="m-t-20">
                                        <li><b>With Light sidebar</b></li>
                                        <li><a href="javascript:void(0)" theme="default" class="default-theme working">1</a></li>
                                        <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
                                        <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
                                        <li><a href="javascript:void(0)" theme="blue" class="blue-theme">4</a></li>
                                        <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
                                        <li><a href="javascript:void(0)" theme="megna" class="megna-theme">6</a></li>
                                        <li><b>With Dark sidebar</b></li>
                                        <br/>
                                        <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
                                        <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
                                        <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                        <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme">10</a></li>
                                        <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
                                        <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.right-sidebar -->
                    </div>
                    <footer class="footer text-center"> 2017 &copy; Agile Admin brought to you by wrappixel.com </footer>
                </div>
        <?php } else {
            $this->load->view($template);
        }?>

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
        <!--Money Field -->
        <script src="<?php echo base_url('themes/admin/js/currency.js')?>"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('themes/admin/js/jasny-bootstrap.js')?>"></script>
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
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/switchery/dist/switchery.min.js')?>"></script>
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/colorpicker/bootstrap-colorpicker.js')?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('themes/admin/plugins/bower_components/colorpicker/colorpicker.css')?>">

        <!-- end - This is for export functionality only -->
        <script>
            $('button[type="submit"]').click(function(){
                $.each($('input:required'),function(){
                    if(!$(this).val()){
                        var id = $(this).closest('.tab-pane').attr('id');
                        $('a[href="#'+id+'"]').parent().parent().find('li').removeClass('active');
                        $('#'+id).parent().find('div').removeClass('active').removeClass('in');

                        $('a[href="#'+id+'"]').parent().addClass('active');
                        $('#'+id).addClass('active').addClass('in');

                        $(this).focus();
                    }
                });
            });

        $(document).ready(function() {
            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });
            // $.toast({
            //     heading: 'Welcome to Agile admin',
            //     text: 'Use the predefined ones, or specify a custom position object.',
            //     position: 'top-right',
            //     loaderBg: '#ff6849',
            //     icon: 'info',
            //     hideAfter: 3500,
            //     stack: 6
            // });
            // $('#myTable').DataTable();
            // $(document).ready(function() {
            //     var table = $('#example').DataTable({
            //         "columnDefs": [{
            //             "visible": false,
            //             "targets": 2
            //         }],
            //         "order": [
            //             [2, 'asc']
            //         ],
            //         "displayLength": 25,
            //         "drawCallback": function(settings) {
            //             var api = this.api();
            //             var rows = api.rows({
            //                 page: 'current'
            //             }).nodes();
            //             var last = null;

            //             api.column(2, {
            //                 page: 'current'
            //             }).data().each(function(group, i) {
            //                 if (last !== group) {
            //                     $(rows).eq(i).before(
            //                         '<tr class="group"><td colspan="5">' + group + '</td></tr>'
            //                     );

            //                     last = group;
            //                 }
            //             });
            //         }
            //     });

            //     // Order by the grouping
            //     $('#example tbody').on('click', 'tr.group', function() {
            //         var currentOrder = table.order()[0];
            //         if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            //             table.order([2, 'desc']).draw();
            //         } else {
            //             table.order([2, 'asc']).draw();
            //         }
            //     });
            // });
        });
        // $('#example23').DataTable({
        //     dom: 'Bfrtip',
        //     buttons: [
        //         // 'excel', 'pdf', 'print'
        //     ],
        // });
        </script>

        <!-- jQuery -->
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js')?>"></script>
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/counterup/jquery.counterup.min.js')?>"></script>
        <?php if ($template == 'admin/site/index'): ?>
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
        <!-- jQuery file upload -->
         <script src="<?php echo base_url('themes/admin/plugins/bower_components/dropify/dist/js/dropify.min.js')?>"></script>

         <!--Style Switcher -->
        <script src="<?php echo base_url('themes/admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')?>"></script>
    </body>

</html>