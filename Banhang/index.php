<?php 
    include'autoload/autoload.php';

    //truy vấn chọn trong bảng home có giá trị =1 hiển thị ngoài menu
    $sqlhomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY update_at";
    //Truy vấn dữ liệu trong bảng
    $Categoryhome = $db->fetchsql($sqlhomecate);

    

    $data=[];
    foreach ($Categoryhome as $item) {
        $cateID=intval($item['id']);//ép kiểu về kiểu int để lọc các id
        //Chọn tất cả dữ liệu trong bảng product để gán vào mục sản phẩm
        $sql = "SELECT * FROM product WHERE category_id = $cateID";
        $productHome = $db->fetchsql($sql);//truy vấn vô csdl
        $data[$item['name']]=$productHome;
    }   
    
    
 ?>
<?php include'header.php'
?>
     
                    <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                            <img src="<?php echo uploads()?>/product/vn.png" width="100%"  class="img-thumbnail">
                        </section>

                        <section class="box-main1">
                            
                            <?php foreach($data as $key=>$value): ?>
                            <h3 class="title-main" ><a href=""> <?php echo $key;?> </a> </h3>
                            <div class="showitem clearfix">
                                
                                <?php foreach($value as $item):?>
                                <div class="col-md-3 item-product bor">
                                    <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo uploads()?>/product/<?php echo $item['thumbal'] ?>" class="" width="100%" height="180" >
                                    </a>
                                    <div class="info-item">
                                        <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']?></a>
                                        <p><strike class="sale"><?php echo formatprice($item['price']); ?></strike>  <b class="price"><?php echo saleprice($item['price'],$item['sale']); ?>đ</b>              
                                           
                                        </p>
                                    </div>
                                    <div class="hidenitem">
                                        <p><a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                        <p><a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><i class="fa fa-heart"></i></a></p>
                                        <p><a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                                </div>
                                <?php endforeach?>
                            </div>
                            <?php endforeach?>
                                                   
                          </section>      

                    </div>
                        

                
<?php include'footer.php'?>

