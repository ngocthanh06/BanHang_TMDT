<?php 
include'../autoload/autoload.php';
    $id=intval(getInput('id'));
    //chi tiết sản phẩm
    $editcart = $db->fetchID('product',$id);   
    

    //Nếu tồn tại giỏ hàng thì cập nhật giỏ hàng
    //Ngược lại thì tạo mới
    //Tạo cookie lưu id của sản phẩm
    if(! isset($_SESSION['cart'][$id]))//$id là key phân biệt các sp với nhau
    {
    	//tạo mới giỏ hàng
        
    	$_SESSION['cart'][$id]['name'] = $editcart['name'];
    	$_SESSION['cart'][$id]['thumbal'] = $editcart['thumbal'];
    	$_SESSION['cart'][$id]['price'] = ((100-$editcart['sale']) * $editcart['price'])/100;
    	$_SESSION['cart'][$id]['qty'] = 1;//số lượng
        
        
        
    }	
    else
    {	
    	$_SESSION['cart'][$id]['qty'] += 1;
    	//cập nhật giỏ hàng
    }
    $_SESSION['success'] = 'Thêm sản phẩm thành công';
    header('location:../index.php');
    
    
 ?>