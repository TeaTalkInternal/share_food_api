<?php require 'db_connect_host_credentials.php';

$conn = mysqli_connect( $host_name, $db_user_name, $db_user_password, $db_name );

if ( !$conn ) {
    echo 'Could not connect to mysql';
    exit;
}

date_default_timezone_set( 'Asia/Kolkata' );
$date = date( 'Y/m/d h:i:s', time() );

$data = json_decode(file_get_contents('php://input'), true);

$phone_number_val        = $data['phonenumber'];
$product_id_val        = $data['uniqueid'];

$sql = 'UPDATE HFFoodItem SET isPending =  0 , isbooked = 1 WHERE uniqueid = '.$product_id_val.';';

$sql .= "INSERT INTO HFBook (booker_number, product_id)
 VALUES ('$phone_number_val',$product_id_val);";

if ( mysqli_multi_query( $conn, $sql ) ) {

    echo '{';
    echo '"status_code" : 200,';
    echo '"status_message" : "Successfully approved"';
    echo '}';

} else {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "Failed to update item status."';
    echo '}';

}
mysqli_close( $conn );
?>