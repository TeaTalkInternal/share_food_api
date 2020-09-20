<?php require 'db_connect_host_credentials.php';

$conn = mysqli_connect( $host_name, $db_user_name, $db_user_password, $db_name );

if ( !$conn ) {
    echo 'Could not connect to mysql';
    exit;
}

date_default_timezone_set( 'Asia/Kolkata' );
$date = date( 'Y/m/d h:i:s', time() );


$decoded = json_decode(file_get_contents('php://input'), true);

$username_val        = isset( $decoded['name'] ) ? "'".$decoded['name']."'" : '\'\'';
$productname_val     = isset( $decoded['itemname'] ) ? "'".$decoded['itemname']."'" : '\'\'';
$uniqueid_val        = strtotime( $date );

$phonenumber_val     = isset( $decoded['phonenumber'] ) ? "'".$decoded['phonenumber']."'" : '\'\'';
$bookiePhonenumber_val     = isset( $decoded['bookiePhonenumber'] ) ? "'".$decoded['bookiePhonenumber']."'" : '\'\'';
$alternate_phonenumber_val     = isset( $decoded['alternate_phonenumber'] ) ? "'".$decoded['alternate_phonenumber']."'" : '\'\'';

$email_val           = isset( $decoded['email'] ) ? "'".$decoded['email']."'" : '\'\'';

$description_val     = isset( $decoded['description'] ) ? "'".$decoded['description']."'" : '\'\'';

$image_name_val     = isset( $decoded['image_name'] ) ? "'".$decoded['image_name']."'" : '\'\'';

$uploaddate_val      = isset( $decoded['uploaddate'] ) ? "'".$decoded['uploaddate']."'" : '\'\'';

$pickatdate_val      = isset( $decoded['pickat_date'] ) ? ''.$decoded['pickat_date'].'' : 0;
$pickbydate_val      = isset( $decoded['pickby_date'] ) ? ''.$decoded['pickby_date'].'' : 0;

$serves_number = isset( $decoded['serves_count'] ) ? ''.$decoded['serves_count'].'' : 0;

$address_val         = isset( $decoded['address'] ) ? "'".$decoded['address']."'" : '\'\'';

$lat_val             = isset( $decoded['lat'] ) ? ''.$decoded['lat'].'' : 0;
$lng_val             = isset( $decoded['lng'] ) ? ''.$decoded['lng'].'' : 0;

$isregularSchedule = isset( $decoded['is_regular'] ) ? ''.$decoded['is_regular'].'' : 0;
$mon = isset( $decoded['mon'] ) ? ''.$decoded['mon'].'' : 0;
$tue = isset( $decoded['tue'] ) ? ''.$decoded['tue'].'' : 0;
$wed = isset( $decoded['wed'] ) ? ''.$decoded['wed'].'' : 0;
$thur = isset( $decoded['thur'] ) ? ''.$decoded['thur'].'' : 0;
$fri = isset( $decoded['fri'] ) ? ''.$decoded['fri'].'' : 0;
$sat = isset( $decoded['sat'] ) ? ''.$decoded['sat'].'' : 0;
$sun = isset( $decoded['sun'] ) ? ''.$decoded['sun'].'' : 0;

$istaken_val         = isset( $decoded['istaken'] ) ? ''.$decoded['istaken'].'' : 0;
$isbooked_val         = isset( $decoded['isbooked'] ) ? ''.$decoded['isbooked'].'' : 0;
$ispending_val         = isset( $decoded['ispending'] ) ? ''.$decoded['ispending'].'' : 0;
$reportedabuse_val   = isset( $decoded['reportedabuse'] ) ? ''.$decoded['reportedabuse'].'' : 0;
$is_needy = isset( $decoded['is_needy'] ) ? ''.$decoded['is_needy'].'' : 0;

$foodType_val         = isset( $decoded['food_type'] ) ? ''.$decoded['food_type'].'' : 0;
$expirydate_val      = isset( $decoded['expiry_date'] ) ? ''.$decoded['expiry_date'].'' : 0;



$sql = "INSERT INTO HFFoodItem (name,itemname,uniqueid,reportedabuse,phonenumber,alternate_phonenumber,email,description,istaken,isbooked,uploaddate,address,lat,lng,is_regular,mon,tue,wed,thur,fri,sat,sun,is_needy,serves_count,pickat_date,pickby_date,ispending,bookiePhonenumber,image_name,food_type,expiry_date)
VALUES ($username_val,
    $productname_val,
    $uniqueid_val,
    $reportedabuse_val,
    $phonenumber_val,
    $alternate_phonenumber_val,
    $email_val,
    $description_val,
    $istaken_val,
    $isbooked_val,
    $uploaddate_val,
    $address_val,
    $lat_val,
    $lng_val,
    $isregularSchedule,
    $mon,
    $tue,
    $wed,
    $thur,
    $fri,
    $sat,
    $sun,
    $is_needy,
    $serves_number,
    $pickatdate_val,
    $pickbydate_val,
    $ispending_val,
    $bookiePhonenumber_val,
    $image_name_val,
    $foodType_val,
    $expirydate_val);";
    

if ( mysqli_query( $conn, $sql ) ) {

    echo '{';
    echo '"status_code" : 200,';
    echo '"food_item_id" :'.$uniqueid_val.',';
    echo '"status_message" : "Successfuly added item"';
    echo '}';

} else {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "Failed add item."';
    echo '}';

}

mysqli_close( $conn );
?>