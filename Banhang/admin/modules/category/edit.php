    <?php 
    $open="category";
    include_once'../../autoload/autoload.php';

    $id=intval(getInput('id'));
    
    //Lấy id trong bảng qua hàm fetchID
    $editCategory = $db->fetchID("category",$id);
    if(empty($editCategory))//nếu edit trống thực thi lệnh
    {
        $_SESSION['error']="Dữ liệu không tồn tại";
                redirectAdmin("category");//redirecAdmin chuyển về các trang
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      //Khai báo mảng data từ dtbase.php hàm insert
        $data=
        [
            "name" => postInput("name")
        ];
        $error = [];//khởi tạo mảng lỗi
        if(postInput('name')=='')
        {
            $error['name']="Mời bạn nhập tên danh mục";
        }
        //nếu lỗi trống thực thi lệnh
        if(empty($error))
        {   //kiểm tra tên của cái edit mà không trùng với tên đăng ký thì thực thi
            if($editCategory['name']!=$data['name']) 
            {
                    $isset=$db->fetchOne("category","name='".$data['name']."' ");
                if(count($isset) > 0)
                {
                    $_SESSION['error'] = "Tên danh mục đã tồn tại";
                }
                else
                {
                //update dữ liệu
                    $id_update =$db->update("category",$data,array("id"=>$id));
                    if($id_update > 0 )
                    {
                        $_SESSION['success']="Cập nhật thành công";
                        redirectAdmin("category");//redirecAdmin chuyển về các trang
                    }
                    else
                    {
                        //THêm thất bại
                        $_SESSION['error']="Dữ liệu không thay đổi";
                        redirectAdmin("category");
                    }
                }
            }
            else
            {//cập nhật dữ liệu
                $id_update =$db->update("category",$data,array("id"=>$id));
                    if($id_update > 0 )
                    {
                        $_SESSION['success']="Cập nhật thành công";
                        redirectAdmin("category");//redirecAdmin chuyển về các trang
                    }
                    else
                    {
                        //THêm thất bại
                        $_SESSION['error']="Dữ liệu không thay đổi";
                        redirectAdmin("category");
                    }
            }
            
        }

   }
    
   
        ?>
        <?php include_once'../../../layouts/header.php'?> 
                    <!-- Page Heading -->
                   <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                               Chỉnh sửa danh mục
                            </h1><?php if(isset($name)){ echo $name;}?>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Danh mục</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Chỉnh sửa
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                                
                            <?php include_once'../../../partials/notification.php'; ?>
                        </div>
                    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="" method="POST">
                <div class="form-group col-sm-8">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" name="name" value="<?php if(isset($editCategory['name'])){echo $editCategory['name'];} ?>">
                   <!--nếu tồn tại mảng lỗi error in lỗi tại vị trí-->
                    <?php if(isset($error['name'])): ?>
                    <p class="text-danger"><?php echo $error['name'];?></p>
                     <?php endif?>
                </div>
                <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </div>
                </div>
            </form>
        </div>
    </div>
                    <!-- /.row -->
                <?php include_once'../../../layouts/footer.php'?>