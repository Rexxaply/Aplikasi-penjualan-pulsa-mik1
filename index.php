<?php
include 'config/config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Penjualan Pulsa">
    <meta name="keywords" content="Aplikasi Penjualan">
    <meta name="author" content="Reza">
    <!-- Favicon -->
    <link rel="shortcut icon" href="asset/img/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/plugins/bootstrap-5.2.3/css/bootstrap.min.css">
    <!-- Fontawasome CSS -->
    <link rel="stylesheet" href="asset/plugins/fontawesome/css/all.min.css">
    <!-- Selectize CSS -->
    <link rel="stylesheet" href="asset/plugins/selectize.js/css/selectize.bootstrap5.css">
    <!-- Style CSS -->
    <style>
        * {
            font-family: 'Baloo Bhai 2', sans-serif;
        }
    </style>
    <!-- DataTable css -->
    <link rel="stylesheet" href="asset/plugins/DataTables/datatables.min.css">
    <!-- Bootstrap JS -->
    <script src="asset/plugins/bootstrap-5.2.3/js/bootstrap.bundle.min.js"></script>
    <!-- Fontawasome JS-->
    <script src="asset/plugins/fontawesome/js/all.min.js"></script>
    <!-- Jquery JS -->
    <script src="asset/js/jquery-3.7.0.min.js"></script>
    <!-- Selectize JS -->
    <script src="asset/plugins/selectize.js/js/selectize.min.js"></script>
    <!-- MyStyle CSS -->
    <link rel="stylesheet" href="asset/css/style.css">
    <!-- Title -->
    <title>Dashboard - Aplikasi Penjualan Pulsa</title>
</head>

<body class="d-flex flex-column vh-100">
<?php
include 'navigation.php';
?>

    <main role="main" class="container">
        <?php include 'content.php'; ?>
        
        <!-- Format Masking JS -->
        <script src="asset/js/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
        <!-- Format Angka JS -->
        <script src="asset/js/format-angka-update.js"></script>
        <script>
            $(document).ready(function() {
                // Format nomor HP.
                $('.no_hp').mask('0000 - 0000 - 0000');
            });
        </script>
        <!-- DataTable JS -->
        <script src="asset/plugins/DataTables/datatables.min.js"></script>
        <!-- Format DataTable Main Script JS -->
        <script>
            $(document).ready(function() {
                // DataTable
                let table = $('#dataTable').DataTable ( {
                    pageLength: 5,
                    lengthMenu: [
                        [5, 10, 20, -1],
                        [5, 10, 20, 'ToDos'],
                    ]
                });
            });

            // Selectize
            $(".select").selectize();

            // Function menampilkan nama pelanggan secara otomatis
            function getPelanggan() {
                let id_pelanggan = $('#pelanggan').val();
                $.ajax({
                    type: "GET",
                    url: "modules/penjualan/get_pelanggan.php", // Proses get data pelanggan berdasarkan id_pelanggan
                    data: {
                        id_pelanggan: id_pelanggan
                    },
                    dataType: "JSON",
                    success: function(result) {
                        // Ketika sukses tampilkan data
                        $("#nama_pelanggan"). val(result.nama_pelanggan);
                    }
                });
            }

            function getPulsa() {
                let id_pulsa = $('#no_hp').val();
                $.ajax({
                    type: "GET",
                    url: "modules/penjualan/get_pulsa.php", // Proses get data pelanggan berdasarkan id_pelanggan
                    data: {
                        id_pulsa: id_pulsa
                    },
                    dataType: "JSON",
                    success: function(result) {
                        // Ketika sukses tampilkan data
                        $("#harga"). val(result.harga);
                    }
                });
            }
        </script>
        <!-- Format Angka JS -->
        <script src="asset/js/format-angka.js"></script>

    </main>

    <footer class="container-fluid d-flex flex-wrap justify-content-center align-item-center py-3 my-0 border-top mt-auto">
        <p class="col-md-6 mb-0 text-muted text-center">&copy; 2024 ELTIPONSEL, Inc</p>
    </footer>
</body>

</html>