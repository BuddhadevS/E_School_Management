<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>
<body>
    <form action="forgot.php" method="post">
    <label for="user_type">User Type:</label>
    <select name="user_type">
        <option value="student">Student</option>
        <option value="parent">Parent</option>
        <option value="teacher">Teacher</option>
        <option value="library">Library</option>
    </select>
        <p>ID :
        <input type="text" name="id" placeholder="Enter User ID "/></p>
        <p>Number : 
             <input type="text" name="number" placeholder="Enter Number"/></p>
       
            <input type="submit" value="send" name="submit">
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $number=$_POST['number'];
    $text=$_POST['text'];

$url="www.way2sms.com/api/v1/sendCampaign";
$message = urlencode($text);// urlencode your message
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=PateAPI&secret=PasteSecretCode&usetype=stage&phone=$number&senderid=writeYourMailId&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $result;


}
?>

<?php 

session_start(); 

include "db_conn.php";