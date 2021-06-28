<footer style="padding: 10px; width:100%; text-align:center;" class="bg-dark text-white">&copy; <?= date('Y'); ?>  Hectast</footer>

<script src="<?= $base_url ?>public/assets2/js/jquery-3.5.1.min.js"></script>

<script src="<?= $base_url ?>public/assets2/js/bootstrap.bundle.min.js"></script>

<script src="<?= $base_url ?>public/assets2/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="<?= $base_url ?>public/assets2/vendor/wow/wow.min.js"></script>

<script src="<?= $base_url ?>public/assets2/js/mobster.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<script>
 $('#pilihan').change(function() {
        $('#option_tujuan').remove();
        if ($('#pilihan').val() == 'Ya') {
            $.get('views/pages/user/option.php', {
                    pilihan: $('#pilihan').val()
                })
                .done(function(data) {
                    $('#pilihgr').after(data);
                })
        }
    });
    $('#pilihan2').change(function() {
        if ($('#pilihan2').val() == 'Tidak') {
            $('#option_tujuan').remove();
        }
    });
  
       $('#datatable1').DataTable({
           "ordering":false,
           "info":false,
           "paging":false,
           "language": {
            "search": "Cari Dataset:",
            "zeroRecords":    "Dataset / Infografik tidak ditemukan",
        }
       });
</script>
</body>
</html>