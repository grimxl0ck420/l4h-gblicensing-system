<?php
/**
 * WHMCS Sample API Call
 *
 * @package    WHMCS
 * @author     WHMCS Limited <development@whmcs.com>
 * @copyright  Copyright (c) WHMCS Limited 2005-2016
 * @license    http://www.whmcs.com/license/ WHMCS Eula
 * @version    $Id$
 * @link       http://www.whmcs.com/
 */

// API Connection Details
$whmcsUrl = "http://whmcs.license4.host/";

// For WHMCS 7.2 and later, we recommend using an API Authentication Credential pair.
// Learn more at http://docs.whmcs.com/API_Authentication_Credentials
// Prior to WHMCS 7.2, an admin username and md5 hash of the admin password may be used.
$username = "eb623Ceo9EnK65zMKXkly1Gt8gqCSapY";
$password = "Aw1UJpOZQt6BI5EYXpIJjD8uvwRY52F7";

// Set post values
$postfields = array(
    'username' => $username,
    'password' => $password,
    'action' => 'GetClients',
    'responsetype' => 'json',
);

// Call the API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $whmcsUrl . 'includes/api.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfields));
$response = curl_exec($ch);
if (curl_error($ch)) {
    die('Unable to connect: ' . curl_errno($ch) . ' - ' . curl_error($ch));
}
curl_close($ch);

// Decode response
$jsonData = json_decode($response, true);

// Dump array structure for inspection
var_dump($jsonData);