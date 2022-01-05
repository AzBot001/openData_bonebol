<footer style="padding: 10px; width:100%; text-align:center;" class="bg-dark text-white">&copy; <?= date('Y'); ?>  OpendataBonebol - <i class="fas fa-code"></i> With <i class="fas fa-coffee"></i> & <i class="fas fa-heart"></i></footer>
<?php $nmafile =  isset($d['judul']) ? $d['judul'] : 'Opendata'; ?>
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
<script src="<?= $base_url ?>public/assets/vendor/select2/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

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

   
       $(document).ready(function() {
        $('#tb_data').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                className: 'btn-light btn-file',
                text: 'Json',
                action: function ( e, dt, button, config ) {
                    var data = dt.buttons.exportData();
 
                    $.fn.dataTable.fileSave(
                        new Blob( [ JSON.stringify( data ) ] ),
                        '<?= $nmafile ?>'
                    );
                }
                
            },
            {
                extend:    'csvHtml5',
                text:      'Csv',
                titleAttr: 'CSV',
                title:     '<?= $nmafile ?>',
                className: 'btn-light btn-file'
            },
            {
                extend:    'excelHtml5',
                text:      'Excel',
                titleAttr: 'Excel',
                title:     '<?= $nmafile ?>',
                className: 'btn-light btn-file'

            }
        ],
        "searching":false,
      
       
       
    } );
} );

$(document).ready(function() {
    $('.selek').select2({
    placeholder: "Organisasi"
    
})
});
$(document).ready(function() {
    $('.selek2').select2({
    placeholder: "Kategori"
    });
});
$(document).ready(function() {
    $('.selek3').select2({
    placeholder: "Organisasi Perangkat Daerah"
    });
});

// if ( window.history.replaceState ) {
//         window.history.replaceState( null, null, window.location.href );
//     }

</script>

<script>
    $(document).ready(function(){

        $(document).on('click', '#load_more', function(event){
            event.preventDefault();

            var id = $('#load_more').data('id');
            $.ajax({
                url : "<?= $base_url ?>app/load_dataset.php",
                type : "post",
                data : {id:id},
                success : function(response){
                    $('#remove').remove();
                    $('#table_data').append(response);

                }
            });

        });

    });
</script>
</body>
</html>