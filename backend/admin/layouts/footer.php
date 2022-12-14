

<!-- Required Js -->
<script src="../../assets/js/vendor-all.min.js"></script>
<script src="../../assets/js/plugins/bootstrap.min.js"></script>
<script src="../../assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="../../assets/js/plugins/apexcharts.min.js"></script>

<!-- js modules -->
<!-- <script src="../../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script> -->
<script type="text/javascript" src="../../assets/js/dt-1.10.25datatables.min.js"></script>

<!-- custom-chart js -->
<script src="../../assets/js/pages/dashboard-main.js"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('#example').DataTable({
            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                $(nRow).attr('id', aData[0]);
            },
        });
    });
    </script>

<!-- reload problem solve start-->
<script type="text/javascript">
	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<!-- reload problem solve end--> 

<!-- datepicker start -->
<script src="../../assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../../assets/modules/summernote/summernote-bs4.js"></script>



<script>
 $('#summernote').summernote({
        placeholder: 'Put Your Text Here',
        tabsize: 2,
        height: 300
      });
</script>

<!-- datepicker end -->

</body>

</html>