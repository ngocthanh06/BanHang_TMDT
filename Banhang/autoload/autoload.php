	<?php
session_start();//Khai báo session, nếu không khai báo thì session không hoạt động
include_once'dtbase.php';
include_once'ftion.php';
    $db = new Database;

    define("ROOT",$_SERVER['DOCUMENT_ROOT']."/banhang/public/uploads/");


    $category = $db->fetchAll("category");


    /**
     * Lấy danh sách sản phẩm mới
     */
    $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 4";
    $productNew=$db->fetchsql($sqlNew);
 ?>
