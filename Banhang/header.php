<?php 
    if(isset($_SESSION['name_id'])){
    $id=intval($_SESSION['name_id']);
    $sql=$db->fetchID("users",$id);
    $name = $sql['name'];
    }
    
    
     ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đồ án</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="public/frontend/css/bootstrap.min.css">
        <script  src="public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="public/frontend/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="public/frontend/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/frontend/css/notify.js">
    </head>
    <body>
        <div id="wrapper">
        <!---->            <!--HEADER-->
        <nav class="navbar navbar-default" >
            <div class="container-fluid">
                <div class="navbar-header"style="margin-top: 5px;     margin-left: 5px;">
                    <a style="color: red">HOTLINE: 0783449848</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['name_id'])): ?>
                    <li style="color: #778899;border-right: 1px solid #928f8f;padding-right: 10px;border-top-width: 5px;margin-top: 5px;border-left-width: 1px;">
                        Xin Chào: <?php echo $name ?>
                    </li>
                    <li><a href="kt-don-hang.php"><span class="glyphicon glyphicon-edit"></span> Kiểm tra đơn hàng</a></li>
                    <li><a href="gio-hang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Tài khoản
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="users.php">Thông tin</a></li>
                            <li><a href="chatbox.php">Tin nhắn</a></li>
                            <li><a href="thoat.php"><i class="fa fa-share-square-o"></i> Thoát</a></li>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li><a href="gio-hang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng</a></li>
                    <li><a href="dang-nhap.php"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
                    <li><a href="dang-ky.php"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </nav>
        <div id="header">
            <div class="container">
                <div class="row" id="header-main">
                    <div class="col-md-9">
                        <a href="">
                        <img src="public/frontend/images/LOGO3.png">
                        </a>
                    </div>
                    
                    <div class="col-md-3" id="header-right">
                        <div class="pull-right">
                            <div class="pull-left">
                                <img style="margin-right: 5px;margin-top: 5px;" src="public/frontend/images/contact.png">
                            </div>
                            <div class="pull-right">
                                <p id="hotline"> HOTLINE</p>
                                <p> 0783449848</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END HEADER-->
        <!--MENUNAV-->
        <div id="menunav" >
            <div class="container">
                <nav class="navbar navbar-inverse" style="background:#958457">
                    <div class="container-fluid">
                        <div class="col-sm-9">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Trang chủ</a></li>
                            <?php foreach ($page as $item): ?>
                            <li><a href="page.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                            <?php endforeach ?>
                            <li><a href="#">Phần mềm</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </div>
                        <div class="col-sm-3">
                            <form class="navbar-form navbar-right" action="search.php" method="GET">
                              <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search">
                                <div class="input-group-btn">
                                  <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                  </button>
                                </div>
                              </div>
                            </form>
                            </div>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--ENDMENUNAV-->
        <div id="maincontent">
        <div class="container">
        <div class="col-md-3  fixside" >
            <div class="box-left box-menu" >
                <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                <ul>
                    <?php foreach($category as $item): ?>
                    <li>                                 
                        <a href="danh-muc-sp.php?id=<?php echo $item['id']?>"><?php echo $item['name']?> </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="box-left box-menu">
                <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                <ul>
                    
                    <?php foreach($productNew as $item): ?>
                    <li class="clearfix">
                        <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                            <img src="<?php echo uploads()?>/product/<?php echo $item['thumbal'] ?>" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"> <?php echo $item['name'] ?></p >
                                <b class="price">
                                    Giá: 
                                    <?php if($item['sale']>0): ?>
                                    <!--Giá-->
                                    <b class="price"><?php echo saleprice($item['price'],$item['sale']); ?></b>
                                    <p><strike class="sale"><?php echo formatprice($item['price']); ?></strike>     
                                    </p>
                                    <?php else: ?>
                                    <b class="price"><?php echo saleprice($item['price'],$item['sale']); ?></b>
                                    <?php endif ?>
                                </b>
                                <br>
                                <b class="">Số lượng:  <?php echo $item['number'] ?></b><br>
                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <!-- </marquee> -->
            </div>
            <div class="box-left box-menu">
                <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm bán chạy </h3>
                <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                <ul>
                    <?php foreach($productpay as $item): 
                        //productpay nằm ở autoload?>
                    <li class="clearfix">
                        <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                            <img src="<?php echo uploads()?>/product/<?php echo $item['thumbal'] ?>" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"> <?php echo $item['name'] ?></p >
                                <b class="price">
                                    Giá:
                                    <?php if($item['sale']>0): ?>
                                    <!--Giá-->
                                    <b class="price"><?php echo saleprice($item['price'],$item['sale']); ?></b>
                                    <p><strike class="sale"><?php echo formatprice($item['price']); ?></strike>     
                                    </p>
                                    <?php else: ?>
                                    <b class="price"><?php echo saleprice($item['price'],$item['sale']); ?></b>
                                    <?php endif ?>
                                </b>
                                <br>
                                <b class="">Số lượng:  <?php echo $item['number'] ?></b><br>
                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <!-- </marquee> -->
            </div>

            <div class="box-left box-menu">
                <h3 class="box-title"><i class="fa fa-warning"></i>  Hỗ trợ trực tuyến </h3>
                <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                <ul>
                    <div class="panel-body">Panel Content</div>
                </ul>
                <!-- </marquee> -->
            </div>
        </div>