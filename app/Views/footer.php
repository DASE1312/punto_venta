</div>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website<?php echo date('Y'); ?></span>
        </div>
    </div>
</footer>
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>/assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>/assets/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>/assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>/js/demo/datatables-demo.js"></script>

<script>
    $('#modal_confirma').on('show.bs.modal',function(e){
        $(this).find('.btn-ok').attr('href',$(e.relatedTarget).data('href'));
    });
</script>
    </body>
</html>