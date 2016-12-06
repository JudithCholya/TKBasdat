<!DOCTYPE html>
<html lang="en">

<?php
    include "database.php";
    $resp = "";
    ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Jadwal Sidang MKS</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">SISIDANG</a>
            </div>

            <ul class="nav navbar-right top-nav">

                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i> Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>

            </ul>
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   
                    
                    <li>
                        <a href="pemesanan.html"><i class="fa fa-fw fa-plus-square"></i>Tambah Peserta MKS</a>
                    </li>

            

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-pencil-square"></i>Buat Jadwal<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li class="active">
                                <a href="daftarJadwalNonSidangNonDosen.html"><i class="fa fa-fw fa-university"></i>Buat Jadwal Sidang MKS</a>
                            </li>
                            <li>
                                <a href="daftarJadwalNonSidangNonDosen.html"><i class="fa fa-fw fa-university"></i>Buat Jadwal Non Sidang Dosen</a>
                            </li>

                        </ul>
                    </li>

                 

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-table"></i>Lihat Jadwal<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="daftarJadwalNonSidangNonDosen.html"><i class="fa fa-fw fa-university"></i>Lihat Jadwal Sidang</a>
                            </li>
                            <li>
                                <a href="daftarJadwalNonSidangNonDosen.html"><i class="fa fa-fw fa-university"></i>Lihat Daftar MKS</a>
                            </li>

                        </ul>
                    </li>
                    
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tambah Data MKS
                        </h1>
                        <ol class="breadcrumb">
                        <button type="button" class="btn btn-sm btn-success">Simpan</button>
                        <button type="button" class="btn btn-sm btn-danger">Batal</button>
                        </ol>
                    </div>
                </div>


                <div class="row">

                    <div class="col-lg-12">
    
                        <form>
                            <div class="form-group">
                              <label for="sel1">Term:</label>
                              <select class="form-control" id="sel1">
                                <option>
                                   <?php
                                    $conn = connectDB();
                                    pg_query($conn, "SET search_path TO SISIDANG");
                                    $result = pg_query($conn, "SELECT * FROM Term") or die("Cannot execute query : " . pg_last_error());
                                    while ($row = pg_fetch_assoc($result)) {
                                      echo "<option>" . $row['tahun'] . "</option>";
                                    }
                                     $term = test_input($_POST["term"]);
                                    pg_close;
                                  ?>
                              </select>
                             </div>

                             <div class="form-group">
                              <label for="sel2">Jenis MKS:</label>
                              <select class="form-control" id="sel2">
                                <option><?php
                $conn = connectDB();
                pg_query($conn, "SET search_path TO SISIDANG");
                $result = pg_query($conn, "SELECT * FROM jenismks") or die("Cannot execute query : " . pg_last_error());
                while ($row = pg_fetch_assoc($result)) {
                  echo "<option>" . $row['namamks'] . "</option>";
                }
                $jenis_mks = test_input($_POST["jenis_mks"]);
                pg_close;
               ?>
                              </select>
                             </div>

                             <div class="form-group">
                              <label for="sel1">Mahasiswa:</label>
                              <select class="form-control" id="sel1">
                                <option><?php
                $conn = connectDB();
                pg_query($conn, "SET search_path TO SISIDANG");
                $result = pg_query($conn, "SELECT * FROM mahasiswa") or die("Cannot execute query : " . pg_last_error());
                while ($row = pg_fetch_assoc($result)) {
                  echo "<option>" . $row['nama'] . "</option>";
                }
                $mahasiswa = test_input($_POST["mahasiswa"]);
                pg_close;
               ?>
                              </select>
                            
                            
                             </div>
                              
                           <label>Judul MKS:</label>
                            <div class="input-group">
                                
                              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                              <input id="judul" type="text" class="form-control" name="text" placeholder="Judul MKS">
                            </div>
                            
                            <div class="form-group">
                                
                              <label for="sel2">Pembimbing 1:</label>
                              <select class="form-control" id="sel2">
                                <option><?php
                $conn = connectDB();
                pg_query($conn, "SET search_path TO SISIDANG");
                $result = pg_query($conn, "SELECT * FROM dosen") or die("Cannot execute query : " . pg_last_error());
                while ($row = pg_fetch_assoc($result)) {
                  echo "<option>" . $row['nama'] . "</option>";
                }
                $pembimbing1 = test_input($_POST["pembimbing1"]);
                pg_close;
               ?>>
                              </select>
                             </div>

                            <div class="form-group">
                                
                              <label for="sel2">Pembimbing 2:</label>
                              <select class="form-control" id="sel2">
                                <option><?php
                $conn = connectDB();
                pg_query($conn, "SET search_path TO SISIDANG");
                $result = pg_query($conn, "SELECT * FROM dosen") or die("Cannot execute query : " . pg_last_error());
                while ($row = pg_fetch_assoc($result)) {
                  echo "<option>" . $row['nama'] . "</option>";
                }
                 $pembimbing2 = test_input($_POST["pembimbing2"]);
                pg_close;
               ?>
                              </select>
                             </div>

                            <div class="form-group">
                                
                              <label for="sel2">Pembimbing 3:</label>
                              <select class="form-control" id="sel2">
                                <option><?php
                $conn = connectDB();
                pg_query($conn, "SET search_path TO SISIDANG");
                $result = pg_query($conn, "SELECT * FROM dosen") or die("Cannot execute query : " . pg_last_error());
                while ($row = pg_fetch_assoc($result)) {
                  echo "<option>" . $row['nama'] . "</option>";
                }
                 $pembimbing3 = test_input($_POST["pembimbing3"]);
                pg_close;
               ?>
                              </select>
                             </div>

                             <div class="form-group">
                                
                              <label for="sel2">Penguji 1:</label>
                              <select class="form-control" id="sel2">
                                <?php
                $conn = connectDB();
                pg_query($conn, "SET search_path TO SISIDANG");
                $result = pg_query($conn, "SELECT * FROM dosen") or die("Cannot execute query : " . pg_last_error());
                while ($row = pg_fetch_assoc($result)) {
                  echo "<option>" . $row['nama'] . "</option>";
                }
                 $penguji1 = test_input($_POST["penguji1"]);
                pg_close;
               ?>
                              </select>
                             </div>

                            <button type="button" class="btn btn-sm btn-primary">Tambah Penguji +</button>
                        </form>
  
                    </div>
                </div>

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
