<?php
session_start();
require_once ('database.php');
$database = new Database();
/*echo "<pre>";
print_r($database);
echo "</pre>";*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng đơn giản</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Giỏ hàng</h2>
    <p>Chi tiết giỏ hàng</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá tiền</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xóa khỏi giỏ hàng</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Camera</td>
            <td>camera.jpg</td>
            <td>100000</td>
            <td>2</td>
            <td>200000</td>
            <td><a href="#">Xóa</a></td>
        </tr>
        </tbody>
    </table>
    <div>Tổng hóa đơn thanh toán: <strong>200000</strong></div>
</div>
<div class="container" style="margin-top: 50px">
    <div class="row">
        <?php
        $sql="SELECT * FROM products";
        $products = $database->runQuery($sql);
        /*echo "<pre>";
        print_r($products);
        echo "</pre>";*/
        ?>
        <?php if ($products) :?>

            <?php foreach ($products as $product) :
                /*echo "<pre>";
                print_r($product);
                echo "</pre>";*/
                ?>
                <div class="col-sm-4">
                    <form name="product1 <?php echo $product["id"] ?>" action="process.php" method="post">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" style="height: auto; width: 100%; display: block;" src="image/product/<?php echo $product["product_image"] ?>" data-holder-rendered="true" >
                            <div class="card-body">
                                <p class="card-text" style="font-weight: bold"><?php echo $product["product_name"] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-inline">
                                        <input style="width: 70px" type="text" class="form-control" name="quantity" value="1" >
                                        <input type="hidden" name="action" value="add">
                                        <input type="hidden" name="product_id" value="<?php echo $product["id"] ?>">
                                        <label style="margin-left: 10px">
                                            <input type="submit" name="submit"  class="btn btn-sm btn-outline-secondary" value="Thêm vào giỏ hàng" />
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <tr>
                    <td><?php /*echo $product['id'] */?></td>
                    <td><?php /*echo $product['product_name'] */?></td>
                    <td><?php /*echo $product['product_image'] */?></td>
                    <td><?php /*echo number_format($product['price'],0)." VND" */?></td>
                </tr>-->

            <?php endforeach; ?>
        <?php endif; ?>
        <!--<div class="col-sm-4">
            <form name="product1" action="" method="post">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" style="height: auto; width: 100%; display: block;" src="image/product/camera.jpg" data-holder-rendered="true" >
                    <div class="card-body">
                        <p class="card-text">Sản phẩm 1</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-inline">
                                <input style="width: 70px" type="text" class="form-control" name="quantity" value="1" >
                                <label style="margin-left: 10px"><button type="button" class="btn btn-sm btn-outline-secondary">Thêm vào giỏ hàng</button></label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>-->
        <!--<div class="col-sm-4">
            <form name="product2" action="" method="post">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" style="height: auto; width: 100%; display: block;" src="image/product/hard_drive.jpg" data-holder-rendered="true" >
                    <div class="card-body">
                        <p class="card-text">Sản phẩm 2</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-inline">
                                <input style="width: 70px" type="text" class="form-control" name="quantity" value="1" >
                                <label style="margin-left: 10px"><button type="button" class="btn btn-sm btn-outline-secondary">Thêm vào giỏ hàng</button></label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4">
            <form name="product3" action="" method="post">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" style="height: auto; width: 100%; display: block;" src="image/product/laptop.jpg" data-holder-rendered="true" >
                    <div class="card-body">
                        <p class="card-text">Sản phẩm 3</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-inline">
                                <input style="width: 70px" type="text" class="form-control" name="quantity" value="1" >
                                <label style="margin-left: 10px"><button type="button" class="btn btn-sm btn-outline-secondary">Thêm vào giỏ hàng</button></label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4">
            <form name="product4" action="" method="post">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" style="height: auto; width: 100%; display: block;" src="image/product/smart_watch.jpg" data-holder-rendered="true" >
                    <div class="card-body">
                        <p class="card-text">Sản phẩm 4</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-inline">
                                <input style="width: 70px" type="text" class="form-control" name="quantity" value="1" >
                                <label style="margin-left: 10px"><button type="button" class="btn btn-sm btn-outline-secondary">Thêm vào giỏ hàng</button></label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4">
            <form name="product5" action="" method="post">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" style="height: auto; width: 100%; display: block;" src="image/product/lap.jpg" data-holder-rendered="true" >
                    <div class="card-body">
                        <p class="card-text">Sản phẩm 5</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-inline">
                                <input style="width: 70px" type="text" class="form-control" name="quantity" value="1" >
                                <label style="margin-left: 10px"><button type="button" class="btn btn-sm btn-outline-secondary">Thêm vào giỏ hàng</button></label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4">
            <form name="product6" action="" method="post">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" style="height: auto; width: 100%; display: block;" src="image/product/mobile-phone.jpg" data-holder-rendered="true" >
                    <div class="card-body">
                        <p class="card-text">Sản phẩm 6</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-inline">
                                <input style="width: 70px" type="text" class="form-control" name="quantity" value="1" >
                                <label style="margin-left: 10px"><button type="button" class="btn btn-sm btn-outline-secondary">Thêm vào giỏ hàng</button></label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>-->
    </div>
</div>
</body>
</html>