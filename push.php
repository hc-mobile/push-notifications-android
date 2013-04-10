<?php
 
// response json
$json = array();
 
/**
 * Registering a user device
 * Store reg id in users table
 */
echo 'xxxx';
if (isset($_POST["note"])) {

    $regId = "APA91bF3C77zE3wd8u1XUYyxV3HgX4w5mE-yQ0XVpurBBFzKq4h2xs84VrDmNUfdjaciGf3rNOARHy45HeLQ8hKrFHpz3KtmEZLOqeg_uegVhHpeB063Tzeql-npPP7YNZvgJ-WpBDuLUqA-JjqFC88pWC8bNJUrBNVoOh7m2wb1bhH_rqzz46E";
    $registatoin_ids = array($regId);
    $gcm = new GCM();

    $message = array("product" => "shirt");
    echo $registatoin_ids;
    $result = $gcm->send_notification($registatoin_ids, $message);
 
    echo $result;
} else {
    // user details missing
}
?>


<?php
 
class GCM {
 
    //put your code here
    // constructor
    function __construct() {
 
    }
 
    /**
     * Sending Push Notification
     */
    public function send_notification($registatoin_ids, $message) {
        // include config
        // include_once './config.php';
 
        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
 
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
 
        $headers = array(
            'Authorization: key=' . 'AIzaSyB7Aqqqgop2_ee4DD709_3Vz_A9Vy96wBE',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);
        echo $result;
    }
 
}
?>