<footer style="padding: 10px; width:100%; text-align:center;" class="bg-dark text-white">&copy; <?= date('Y'); ?>  Hectast</footer>

<script src="public/assets2/js/jquery-3.5.1.min.js"></script>

<script src="public/assets2/js/bootstrap.bundle.min.js"></script>

<script src="public/assets2/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="public/assets2/vendor/wow/wow.min.js"></script>

<script src="public/assets2/js/mobster.js"></script>
<script src="public/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="public/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="public/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="public/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="public/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="public/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="public/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="public/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<script>
       $('#datatable1').DataTable({
           "ordering":false,
           "info":false,
           "paging":false,
           "language": {
            "search": "Cari Dataset:",
            "zeroRecords":    "Dataset tidak ditemukan",
        }
       });
</script>
</body>
</html>