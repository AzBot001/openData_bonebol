<footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
                &copy; <?= date('Y'); ?> <i class="fas fa-code"></i> With <i class="fas fa-heart"></i> & <i class="fas fa-coffee"></i> By Hectast
            </div>
        </div>
        <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                    <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Diskominfo-Bonebol</a>
                </li>
                <li c <li class="nav-item">
                    <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Hectast</a>
                </li>
                <li class="nav-item">
                    <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
</div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="<?= $base_url ?>public/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="<?= $base_url ?>public/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="<?= $base_url ?>public/assets/js/argon.js?v=1.2.0"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

<script>
    $('#datatable1').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='fas fa-angle-left'></i>",
                "next": "<i class='fas fa-angle-right'></i>"
            }
        }
    });
    

    $('#datatable2').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='fas fa-angle-left'></i>",
                "next": "<i class='fas fa-angle-right'></i>"
            }
        }
    });

    $('#datatable3').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='fas fa-angle-left'></i>",
                "next": "<i class='fas fa-angle-right'></i>"
            }
        }
    });

    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    });

 
</script>

</body>

</html>