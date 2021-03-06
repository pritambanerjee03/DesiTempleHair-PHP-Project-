<?php 
require_once('setup/config.php');
require_once('setup/common.functions.php');
require_once('classes/class.db.php');
require_once('classes/class.oauth.php');
require_once('classes/class.report_handler.php');
$db = new DB();
$query = "SELECT productName,id FROM ".PRODUCTS." WHERE active='1'";
$results = $db->get_results($query);
$row = array();
foreach($results as $key => $value) {
    $row[$key]['id'] = $value['id'];
    $row[$key]['name'] = $value['productName'];  
} 
$data = $row;
echo json_encode($data);
?>