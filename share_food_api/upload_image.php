<?php require 'db_connect_host_credentials.php';

$conn = mysqli_connect( $host_name, $db_user_name, $db_user_password, $db_name );

if ( !$conn ) {
    echo 'Could not connect to mysql';
    exit;
}

date_default_timezone_set( 'Asia/Kolkata' );
$date = date( 'Y/m/d h:i:s', time() );


$timestampStr = strtotime( $date );


$file = $timestampStr.'-'.$_FILES['file']['name'];

  // echo '$file' . $timestampStr;

$file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$folder = './uploads/';

// new file size in KB
$new_size = $file_size/1024;

// new file size in KB

// make file name in lower case
//$new_file_name = strtolower( $file );
$new_file_name = $_FILES['file']['name'];
// make file name in lower case

$final_file = str_replace( ' ', '-', $new_file_name );

$trimed_val = trim( $new_file_name, '_file.png' );
$uniqueid_val = floatval( $trimed_val );



if ( move_uploaded_file( $file_loc, $folder.$final_file ) )
{
    


    $sql = "INSERT INTO HFFoodImages (filename, filetype, filesize,uniqueid)VALUES('$final_file','$file_type',$new_size,$uniqueid_val);";
    $sql .= "UPDATE HFFoodItem SET image_name =  '".$final_file."' WHERE uniqueid = ".$uniqueid_val.';';
    
 
    if ( mysqli_multi_query( $conn, $sql ) ) {
        echo '{';
        echo '"status_code" : 200,';
        echo '"status_message" :"Sucessfully uploaded the food image"';
        echo '}';
    } else {

        echo '{';
        echo '"status_code" : 400,';
        echo '"status_message" : "Failed to upload image"';
        echo '}';

    }

} else {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "Failed to upload image"';
    echo '}';

}
mysqli_close( $conn );
?>