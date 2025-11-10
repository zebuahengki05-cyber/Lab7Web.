<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = htmlspecialchars($_POST['nama']);
    $tgl_lahir_str = $_POST['tgl_lahir'];
    $pekerjaan_key = $_POST['pekerjaan'];

    $tanggal_lahir = new DateTime($tgl_lahir_str);
    $hari_ini = new DateTime();
    
    $interval = $hari_ini->diff($tanggal_lahir);
    $umur = $interval->y; 
    
    $gaji = 0;
    $nama_pekerjaan = "";

    switch ($pekerjaan_key) {
        case 'programmer':
            $gaji = 8000000;
            $nama_pekerjaan = "Programmer";
            break;
        case 'designer':
            $gaji = 6500000;
            $nama_pekerjaan = "Designer Grafis";
            break;
        case 'guru':
            $gaji = 4000000;
            $nama_pekerjaan = "Guru Sekolah";
            break;
        case 'driver':
            $gaji = 3500000;
            $nama_pekerjaan = "Driver Online";
            break;
        case 'petani':
            $gaji = 5000000;
            $nama_pekerjaan = "Petani Karet";
            break;
    }

    $gaji_rupiah = "Rp " . number_format($gaji, 0, ',', '.');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Perhitungan</title>
</head>
<body>

    <h2>✅ Hasil Data Diri dan Perhitungan</h2>
    
    <hr>
    
    <p>Halo, **<?php echo $nama; ?>**!</p>

    <ul>
        <li>Nama Lengkap: <?php echo $nama; ?></li>
        <li>Tanggal Lahir: <?php echo date('d F Y', strtotime($tgl_lahir_str)); ?></li>
        <li>Umur Anda:<?php echo $umur; ?> tahun**</li>
        <li>Pekerjaan:<?php echo $nama_pekerjaan; ?></li>
        <li>Estimasi Gaji Bulanan:<?php echo $gaji_rupiah; ?>**</li>
    </ul>

    <br>
    <a href="index.html">Kembali ke Form</a>

</body>
</html>

<?php
} else {
    header('Location: index.html');
    exit;
}
?>