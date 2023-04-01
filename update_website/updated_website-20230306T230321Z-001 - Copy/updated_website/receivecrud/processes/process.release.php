<?php
include '../classes/class.release.php';


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'create':
        create_new_finish();
	break;
    case 'additem':
        new_release_item();
	break;
    case 'saveitem':
        save_receive_items();
	break;
}

function create_new_finish(){
	$finish = new Finish();
    $finish_id= ucwords($_POST['finish_id']);
    $user_id= ucwords($_POST['user_id']);
    $trans_id= ucwords($_POST['trans_id']); 
    $finish_payment= $_POST['finish_payment']; 
    $finish_id = $finish->new_finish($finish_id, $user_id, $trans_id, $finish_payment);
    if(is_numeric($finish_id)){
        header('location: ../index.php?page=release&action=release'.$finish_id);
    }
}
