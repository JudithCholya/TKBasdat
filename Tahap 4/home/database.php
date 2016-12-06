




<?php
function connectDB(){
    $conn = pg_connect("host=dbpg.cs.ui.ac.id port=5432 user=b06 password=j9qWdf");
    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    }
    return $conn;
}
?>