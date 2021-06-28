<?php
include 'app/token.php';
if (isset($_POST['login'])) {
    if (empty($_POST['user']) && empty($_POST['password'])) {
    ?>
        <script>
            alert('Maaf masukkan Email dan Password terlebih dahulu !');
            document.location.href = '<?= $base_url; ?>';
        </script>
    <?php
        return false;
    }

    $stmt_admin = $mysqli->prepare("SELECT id_organisasi, nama_organisasi, pass FROM organisasi WHERE email = ?");
  
    if ($stmt_admin) {
        $stmt_admin->bind_param('s', $_POST['user']);
        $stmt_admin->execute();
        $stmt_admin->store_result();

        if ($stmt_admin->num_rows > 0) {
            $stmt_admin->bind_result($id, $nama, $pass);
            $stmt_admin->fetch();
            if (password_verify($_POST['password'], $pass)) {
                session_regenerate_id();

                $token = getToken(10);
                $checkToken = "SELECT * FROM token WHERE email='{$_POST['user']}'";
                $toCheckToken = $mysqli->prepare($checkToken);
                $toCheckToken->execute();
                $resultToken = $toCheckToken->get_result();
                $rowToken = mysqli_num_rows($resultToken);

                if ($rowToken > 0) {
                    $stmt_log = $mysqli->prepare("UPDATE token SET token='$token' WHERE email='{$_POST['user']}'");
                    $stmt_log->execute();
                } else {
                    $stmt_log = $mysqli->prepare("INSERT INTO token (email,token) VALUES ('{$_POST['user']}','$token')");
                    $stmt_log->execute();
                }

                $_SESSION['unique_user'] = $_POST['user'];
                $_SESSION['unique_user2'] = $id;
                $_SESSION['nama'] = $nama;
                $_SESSION['token'] = $token;
                $_SESSION['type_user'] = "organisasi";
                ?>
                <script>
                    document.location.href = 'beranda_organisasi';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Password yang anda masukkan salah !');
                    document.location.href = '<?= $base_url ?>';
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert('Email yang anda masukkan salah !');
                document.location.href = '<?= $base_url; ?>';
            </script>
            <?php
        }
        $stmt_admin->close();
    }
}
?>