<?php require 'db_connect_host_credentials.php';

if ( !$link = @mysql_connect( $host_name, $db_user_name, $db_user_password ) ) {

    echo 'Could not connect to mysql';
    exit;
}

if ( !mysql_select_db( $db_name, $link ) ) {
    echo 'Could not select database';
    exit;
}

date_default_timezone_set( 'Asia/Kolkata' );
$date = date( 'Y/m/d h:i:s', time() );

$uniqueid_val        = isset( $_GET['uniqueid'] ) ? ''.$_GET['uniqueid'].'' : 0;

$deletesql = 'SELECT filename FROM HFFoodImages where uniqueid = '.$uniqueid_val.';';

$product_type_result = mysql_query( $deletesql, $link );

if ( !$product_type_result ) {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "No ProductType results found in our server."';
    echo '}';
    exit;
}

$row = mysql_fetch_assoc( $product_type_result );

$delete_food_sql = 'DELETE FROM  HFFoodItem where uniqueid = '.$uniqueid_val.';';

mysql_query( $delete_food_sql, $link );

$delete_image_sql .=  'DELETE FROM  HFFoodImages where uniqueid = '.$uniqueid_val.';';

if ( mysql_query( $delete_image_sql, $link ) ) {

    unlink( 'uploads/'.$row['filename'] );

    echo '{';
    echo '"status_code" : 200,';

    echo '"status_message" : "Successfuly deleted item"';
    echo '}';

} else {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "Failed delete item"';
    echo '}';

}

mysqli_close( $conn );
?>