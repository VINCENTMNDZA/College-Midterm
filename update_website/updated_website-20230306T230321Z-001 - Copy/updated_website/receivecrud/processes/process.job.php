<?php
include '../classes/class.job.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'newproducts':
        create_new_product();
    break;
    case 'newtype':
        create_new_type();
	break;
    case 'newproduct':
        create_new();
	break;
    case 'updateproduct':
        update_product();
	break;
    case 'upload':
        upload();
	break;
}
function create_new_product(){
	$JO = new job();
    $product_name= ucwords($_POST['product_name']);    
    $product_id = $JO->new_product($product_name);
    if(is_numeric($product_id)){
        header('location: ../index.php?page=job_order&action=products');
    }
}
function create_new_type(){
	$JO = new job();
    $tname= ucwords($_POST['tname']);    
    $tid = $JO->new_job_type($tname);
    if(is_numeric($tid)){
        header('location: ../index.php?page=job_order&action=types');
    }
}
function create_new(){
	$JO = new job();
    $trans_id= ucwords($_POST['trans_id']);
    $customer_name= ucwords($_POST['customer_name']);  
    $job_availed= ucwords($_POST['job_availed']);
    $products_availed= ucwords($_POST['products_availed']);
    $customer_number= ucwords($_POST['customer_number']);  
    $price= ucwords($_POST['price']);  
    $trans_id = $JO->new_job_order($trans_id,$customer_name,$customer_number,$price,$job_availed,$products_availed);
    if(is_numeric($trans_id)){
        header('location: ../index.php?page=job_order&action=profile'.$trans_id);
    }
}
function update_job_order(){
	$JO = new job();
    $customer_name= ucwords($_POST['customer_name']);  
    $customer_number= ucwords($_POST['customer_number']);
    $type= ucwords($_POST['ptype']);  
    $price= ucwords($_POST['price']);
    $trans_id= $_POST['trans_id'];     
    $result = $JO->update_product($customer_name,$customer_number,$type,$price);
    header('location: ../index.php?page=settings&subpage=products&action=profile&id='.$trans_id);
}
    /*
	$product = new Product();
    $pname= ucwords($_POST['pname']);  
    $desc= ucwords($_POST['desc']);   
    $type= $_POST['ptype'];  
    $pid= $_POST['prodid']; 
    $result = $product->upload($pname,$desc,$type,$pid);
    header('location: ../index.php?page=settings&subpage=products&action=profile&id='.$pid);
    */

