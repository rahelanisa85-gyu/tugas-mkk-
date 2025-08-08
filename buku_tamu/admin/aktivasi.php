<?php
include '../koneksi.php';

if (isset($_GET['id']) && isset($_GET['level'])) {
    $id = intval($_GET['id']);
    $new_level = ($_GET['level'] === 'on') ? 'on' : 'off';

    $query = "UPDATE admin SET level = '$new_level' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
         $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        header("Location: t_admin.php?page=$page");
        exit;
    } else {
        echo "Gagal mengubah level: " . mysqli_error($conn);
    }
} else {
    echo "Data tidak valid.";
}
?>