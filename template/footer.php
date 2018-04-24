
    <footer class="footer resetLeft hide-when-print">
        <span class="text-left">
            <!--© <a href="https://gorgia.ge/">BMC Gorgia</a>-->
        </span>
        <span class="float-xs-right">
            <!--Powered by <a href="mailto:shota.noniashvili@gmail.com">Shota Noniashvili</a>-->
        </span>
    </footer>

    <script type="text/javascript" src="template/js/utils.js"></script>
    <script type="text/javascript" src="template/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="template/js/pace.min.js"></script>
    <script type="text/javascript" src="template/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="template/js/snippets.js"></script>
    <script type="text/javascript" src="template/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="template/js/dataTables.bootstrap.min.js"></script>

    <script src="template/js/app.js"></script>
    <script type="text/javascript" src="template/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="template/vendors/chosen_v1.8.2/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>
    <script type="text/javascript" src="template/vendors/bootstrap-datetimepicker-master/src/js/bootstrap-datetimepicker.js"></script>
    <!--<script type="text/javascript" src="template/vendors/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js"></script>-->

    <script type="text/javascript">
        $('.bs-datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.bs-datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY HH:mm:00'
        });

        $(document).ready(function() {

            $('#dataTables').DataTable();
            $(".chosen-select").chosen();

            $('[data-toggle="tooltip"]').tooltip();
        } );
    </script>

</body>

</html>
