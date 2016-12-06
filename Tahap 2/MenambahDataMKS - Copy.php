<?php
    include "database.php";
    $resp = "";
    ?>

		<head>
			<!-- <link rel = "stylesheet" href = "tambahdata.css" type = "text/css">
		 -->	<link rel = "stylesheet" href = "css/bootstrap.min.css" type = "text/css">

		</head>
			
			<title>Menambah Jadwal Sidang MKS</title>

			<body>
			

					<h2>Tambah Jadwal Sidang MKS</h2>
					<br>
					<br>
					<div class="container col-md-4">
  <table class="table">
    <thead>
      <tr class="info">
        <th>Mahasiswa</th>
        <th><div class="form-group">
	  <select class="form-control" id="sel1">
	    <option>
	    <?php
                $conn = connectDB();
                pg_query($conn, "SET search_path TO SISIDANG");
                $result = pg_query($conn, "SELECT * FROM Mahasiswa") or die("Cannot execute query : " . pg_last_error());
                while ($row = pg_fetch_assoc($result)) {
                  echo "<option>" . $row['nama'] . "</option>";
                }
                 $term = test_input($_POST["mahasiswa"]);
                pg_close;
               ?>
	  </select>
	</div></th>
      </tr>
    </thead>
    <tbody>
      <tr class="active">
        <td>Jenis MKS</td>
        <td><div class="form-group">
	  <select class="form-control" id="sel1">
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
	 
	</div></td>
      </tr>      
      <tr class="info">
        <td>Mahasiswa</td>
        <td><div class="form-group">
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
	    </td>
	     </select>
	</div>
      </tr>
      <tr class="active">
        <td>Judul MKS </td>
       <td><input type="text" name="Judul MKS"></td>
       <?php
        //$judul_mks = test_input($_POST["judul_mks"]);
        ?>
      </tr>
      <tr class="info">
        <td>Pembimbing 1</td>
        <td><div class="form-group">
	  <select class="form-control" id="sel1">
	    <option><?php
                $conn = connectDB();
                pg_query($conn, "SET search_path TO SISIDANG");
                $result = pg_query($conn, "SELECT * FROM dosen") or die("Cannot execute query : " . pg_last_error());
                while ($row = pg_fetch_assoc($result)) {
                  echo "<option>" . $row['nama'] . "</option>";
                }
                $pembimbing1 = test_input($_POST["pembimbing1"]);
                pg_close;
               ?></td>
	     </select>
	</div></td>
        </tr>
      <tr class="active">
        <td>Pembimbing 2</td>
        <td><div class="form-group">
	  <select class="form-control" id="sel1">
	  <option></option>
	    <option><?php
                $conn = connectDB();
                pg_query($conn, "SET search_path TO SISIDANG");
                $result = pg_query($conn, "SELECT * FROM dosen") or die("Cannot execute query : " . pg_last_error());
                while ($row = pg_fetch_assoc($result)) {
                  echo "<option>" . $row['nama'] . "</option>";
                }
                 $pembimbing2 = test_input($_POST["pembimbing2"]);
                pg_close;
               ?></td>
	     </select>
	</div></td>
      </tr>
      <tr class="info">
        <td>Pembimbing 3</td>
        <td><div class="form-group">
	  <select class="form-control" id="sel1">
	  <option></option>
	    <option><?php
                $conn = connectDB();
                pg_query($conn, "SET search_path TO SISIDANG");
                $result = pg_query($conn, "SELECT * FROM dosen") or die("Cannot execute query : " . pg_last_error());
                while ($row = pg_fetch_assoc($result)) {
                  echo "<option>" . $row['nama'] . "</option>";
                }
                 $pembimbing3 = test_input($_POST["pembimbing3"]);
                pg_close;
               ?></td>
	     </select>
	</div></td>

      </tr>
      <tr class="active">
        <td>Penguji 1</td>
        <td><div class="form-group">
	  <select class="form-control" id="sel1">
	    <option>A<?php
                $conn = connectDB();
                pg_query($conn, "SET search_path TO SISIDANG");
                $result = pg_query($conn, "SELECT * FROM dosen") or die("Cannot execute query : " . pg_last_error());
                while ($row = pg_fetch_assoc($result)) {
                  echo "<option>" . $row['nama'] . "</option>";
                }
                 $penguji1 = test_input($_POST["penguji1"]);
                pg_close;
               ?></td>
	     </select>
	</div></td>

      </tr>
      <tr class="info">
        <td></td>
        <td><button type="button" class="btn btn-success">+ Tambah Penguji</button></td>

      </tr>
      <tr class="active">
        <td><button type="button" class="btn btn-success"> <a href = adminhome.php>Simpan</a></button></td>
        <td><button type="button" class="btn btn-success">Batal</button></td>

      </tr>
    </tbody>
  </table>
</div>

	</body>

<?php
	function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

	$conn = connectDB();
    $sql  = "INSERT into tambah_data_mks (term,jenis_mks,mahasiswa,pembimbing1,pembimbing2,pembimbing3,penguji1,penguji2) values('$term','jenis_mks','$mahasiswa','$pembimbing1','$pembimbing2','$pembimbing3','$penguji1')";
    
    // if ($conn->query($sql) === TRUE) {
    //     echo "";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
?>