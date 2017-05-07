<?php 
$data = json_decode(file_get_contents("php://input"));
// $fname = mysql_real_escape_string($data->fname);
// $lname = mysql_real_escape_string($data->lname);

$fname = $data->fname;
$lname = $data->lname;
$email = $data->email;

require_once('dbconn.php');

$insertdb = "INSERT INTO wp_testtable(fname,lname,email) VALUES('$fname','$lname','$email')";
if($conn->query($insertdb)){
    echo "1";
}
else {
    echo "0";
}
?>