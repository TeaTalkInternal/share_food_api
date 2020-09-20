<?php require 'db_connect_host_credentials.php';

header( 'Access-Control-Allow-Origin: *' );

$conn = mysqli_connect( $host_name, $db_user_name, $db_user_password, $db_name );

if ( !$conn ) {
    echo 'Could not connect to mysql';
    exit;
}

date_default_timezone_set( 'Asia/Kolkata' );
$date = date( 'Y/m/d h:i:s', time() );

$jsonInput = file_get_contents( 'php://input' );
$decoded = json_decode( $jsonInput, TRUE );

$phone_number_val        = $decoded['booker_number'];
$product_id_val        = $decoded['product_id'];

$selectsql = "SELECT  product_id FROM HFBook WHERE booker_number = '".$phone_number_val."' AND product_id = '".$product_id_val."';";

$product_type_result = mysqli_query( $conn, $selectsql );

$num_rows = mysqli_num_rows( $product_type_result );

if ( $num_rows <= 0 ) {

    $sqls = "INSERT INTO HFBook (booker_number, product_id)
 VALUES ('$phone_number_val',$product_id_val);";

    if ( mysqli_query( $conn, $sqls ) ) {

        $profileArr = array( 'booker_number'=>$phone_number_val, 'product_id'=>$product_id_val );

        echo '{';
        echo '"status_code" : 200,';
        echo '"status_message" : "Successfuly requested food",';
        echo '"profile" :'.json_encode( $profileArr );
        echo '}';

    } else {

        echo '{';
        echo '"status_code" : 400,';
        echo '"status_message" : "Failed to request food."';
        echo '}';
    }

} else {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "Product already exists."';
    echo '}';

}

mysqli_close( $conn );

?>