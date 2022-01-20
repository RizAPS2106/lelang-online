<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="600">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""> 

    <title>Lelang Online</title>

    <!-- Head Icon -->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/gavel.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    
    <!-- Bootstrap-select CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap-select/dist/css/bootstrap-select.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fontawesome/css/all.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables/css/dataTables.bootstrap4.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/sidebar-style.css">

</head>

<?php if (empty($this->session->userdata('id_admin'))) { ?>
        <script>
            alert('Harap Login dahulu');
            window.location.assign("<?php echo base_url('auth/index') ?>");
        </script>
<?php } ?>

<?php

    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }

    function rupiah_norp($angka){
        $hasil_rupiah = number_format($angka,2,',','.');
        return $hasil_rupiah;
    }   

?>