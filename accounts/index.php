<?php
// Accounts controller

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';


// Get the array of classifications
$classifications = getClassifications();
$navList = buildNavigation($classifications);
// var_dump($classifications);
// 	exit;

// Build a navigation bar using the $classifications array
// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//  $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
// }
// $navList .= '</ul>';

// echo $navList;
// exit;

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
}

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

// Switch case to redirect to home.php
switch ($action){
    case 'register':
      // Filter and store the data
      $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
      $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_STRING);
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_EMAIL);
      
      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);

      $existingEmail = checkExistingEmail($clientEmail);
      // Check for existing email address in the table
      if($existingEmail){
       $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
       include '../view/login.php';
       exit;
      }

      // Check for missing data
      if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
        $message = '<p id="warning">Please provide information for all empty form fields.</p>';
        include '../view/registration.php';
        exit; 
      }

      // Hash the checked password
      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

      // Send the data to the model
      $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

      // Check and report the result
      if($regOutcome === 1){
        setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
        $message = "Thanks for registering $clientFirstname. Please use your email and password to login.";
        // header('Location: /phpmotors/accounts/?action=loginUser');
        include '../view/login.php';
        exit;
      } else {
        $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
        include '../view/registration.php';
        exit;
      }
      // echo 'You are in the register case statement.';
    break;

    case 'login':
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientEmail = checkEmail($clientEmail);
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
      $passwordCheck = checkPassword($clientPassword);
      
      // Run basic checks, return if errors
      if (empty($clientEmail) || empty($passwordCheck)) {
       $message = '<p class="notice">Please provide a valid email address and password.</p>';
       include '../view/login.php';
       exit;
      }
        
      // A valid password exists, proceed with the login process
      // Query the client data based on the email address
      $clientData = getClient($clientEmail);
      // Compare the password just submitted against
      // the hashed password for the matching client
      $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
      // If the hashes don't match create an error
      // and return to the login view
      if(!$hashCheck) {
        $message = '<p class="notice">Please check your password and try again.</p>';
        include '../view/login.php';
        exit;
      }
      // A valid user exists, log them in
      $_SESSION['loggedin'] = TRUE;
      //echo $clientFirstname;
      // Remove the password from the array
      // the array_pop function removes the last
      // element from an array
      array_pop($clientData);
      // Store the array into the session
      $_SESSION['clientData'] = $clientData;
      $clientFirstname = $_SESSION['clientData']['clientFirstname'];
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
      // Send them to the admin view
      include '../view/admin.php';
      exit;
    
    break;
    
    case 'newmember':
      include '../view/registration.php';
    break;
    
    case 'loginUser':
      include '../view/login.php';
    break;
    
    case 'logout':
      session_destroy();
      setcookie('firstname', $clientFirstname, strtotime('-1 year'), '/');
      header ('Location: /phpmotors/');
    break;

    
    case 'updateaccount':
      include '../view/client-update.php';
    break;

    case 'updateAccount':
      $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
      $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientEmail = checkEmail($clientEmail);
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
      $clientEmail = checkEmail($clientEmail);

      
      if($clientEmail != $_SESSION['clientData']['clientEmail']){
        $existingEmail = checkExistingEmail($clientEmail);
        // Check for existing email address in the table
        if($existingEmail){
         $message = '<p class="notice">That email address already exists. Please enter different email address.</p>';
         include '../view/client-update.php';
         exit;
        }
      }
       // Check for missing data
       if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
        $message = '<p id="warning">Please provide correct information for all form fields.</p>';
        include '../view/client-update.php';
        exit; 
      }

      // Send the data to the model
      $updateOutcome = updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId);

      // Check and report the result
      if($updateOutcome === 1){
        $message = "<p id='success'>Hi $clientFirstname! Your information has been updated.<p>";
        header('location: /phpmotors/accounts/');
        $clientData = getClientId($clientId);
        
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        //echo $clientFirstname;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        $clientFirstname = $_SESSION['clientData']['clientFirstname'];
        setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
        exit;

      } else {
        $message = "<p id='warning'>Sorry $clientFirstname, we could not update your account information. Please try again.</p>";
        include '../view/client-update.php';
        exit;
      }
    break;

    case 'updatePassword':
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
      $checkPassword = checkPassword($clientPassword);

      if (empty($checkPassword)) {
        $message = '<p id="warning">Please provide a valid password.</p>';
        include '../view/client-update.php';
        exit;
       }
      

      // Hash the checked password
      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

      // Send the data to the model
      $updateOutcome = updatePassword($hashedPassword, $clientId);

      // Check and report the result
      if($updateOutcome === 1){
        $message = "<p id='success'>Your password has been updated.</p>";
        header('Location: /phpmotors/accounts/');

      exit;
      } else {
        $message = "<p id='warning'>Sorry $clientFirstname, we could not update your password. Please try again.</p>";
        include '../view/admin.php';
        exit;
      }
    break;  

    default:
      include '../view/admin.php';
    break;
}
?>