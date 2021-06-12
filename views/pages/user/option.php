<?php require_once '../../../app/env.php'; ?>
<div class="form-group mt-3" id="option_tujuan">
    <label>Pilih OPD</label>
    <select class="form-control" name="organisasi">
        <option hidden>-Pilih OPD-</option>
        <?php
            $query = $mysqli->query("SELECT * FROM organisasi");
            while($d = $query->fetch_assoc()){
            ?>
            <option value="<?= $d['id_organisasi'] ?>"><?= $d['nama_organisasi'] ?></option>
            <?php
            }
        ?>
       
    </select>
</div>