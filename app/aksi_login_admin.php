<?php
// session_start();
include 'app/env.php';
include 'app/token.php';
if (isset($_POST['logon'])) {
    if (empty($_POST['user']) && empty($_POST['pass'])) {
    ?>
        <script>
            alert('Maaf masukkan Username dan Password terlebih dahulu !');
            document.location.href = 'login';
        </script>
    <?php
        return false;
    }

    $stmt_admin = $mysqli->prepare("SELECT id_admin, nama, pass FROM admin WHERE username = ?");
  
    if ($stmt_admin) {
        $stmt_admin->bind_param('s', $_POST['user']);
        $stmt_admin->execute();
        $stmt_admin->store_result();

      

        if ($stmt_admin->num_rows > 0) {
            $stmt_admin->bind_result($id_admin, $nama, $pass);
            $stmt_admin->fetch();
            if (md5($_POST['pass'])==$pass) {
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
                $_SESSION['unique_user2'] = $id_admin;
                $_SESSION['nama'] = $nama;
                $_SESSION['token'] = $token;
                $_SESSION['type_user'] = "admin";
                ?>
                <script>
                    document.location.href = '<?= $base_url; ?>beranda_admin';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Password yang anda masukkan salah !');
                    document.location.href = 'login';
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert('Username yang anda masukkan salah !');
                document.location.href = 'login';
            </script>
            <?php
        }
        $stmt_admin->close();
    }
}
?>