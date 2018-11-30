<?php
/*session_start();
require_once ('database.php');
$database = new Database();
if (isset($_POST)&& !empty($_POST)){
    /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/
/*if (isset($_POST['action'])){
    switch ($_POST['action']){
        case 'add':
            if (isset($_POST['quantity'])&& isset($_POST['product_id'])) {
                $sql="SELECT * FROM products where id=". (int)$_POST["product_id"];
                $product = $database->runQuery($sql);
                echo "<br>$product";
                echo "<pre>";
                print_r($product);
                echo "</pre>";
            }
            break;
        default:
            echo "Action không tồn tại";
            die;
    }
}
}*/
/*echo "<br>$_POST";
echo "<pre>";
print_r($_POST);
echo "</pre>";*/
/*echo "<br>$_SESSION";
 echo "<pre>";
 print_r($_SESSION);
 echo "</pre>";
            die;*/
session_start();
echo '<pre>';
print_r($_POST);
echo '</pre>';
require_once ('template/database.php');
$db= new Database();
if(isset($_POST['action'])){
    switch (($_POST['action'])){
        case 'add':
            {
                $sql = "SELECT * FROM products WHERE id=" . $_POST['id'];
                $data = $db->runQuery($sql);
                $data = current($data);
                if (isset($_SESSION['dulieu']) && !empty($_SESSION['dulieu'])) {
                    $product_id = $data['id'];
                    if (isset($_SESSION['dulieu'][$product_id])) {
                        $exist_dulieu = $_SESSION['dulieu'][$product_id];
                        $exist_quantity = $exist_dulieu['quantity'];
                        $dulieu = array();
                        $dulieu['id'] = $data['id'];
                        $dulieu['product_name'] = $data['product_name'];
                        $dulieu['product_image'] = $data['product_image'];
                        $dulieu['price'] = $data['price'];
                        $dulieu['quantity'] = $exist_quantity + $_POST['quantity'];
                        $_SESSION['dulieu'][$product_id] = $dulieu;
                    } else {
                        $product_id = $data['id'];
                        $dulieu = array();
                        $dulieu['id'] = $data['id'];
                        $dulieu['product_name'] = $data['product_name'];
                        $dulieu['product_image'] = $data['product_image'];
                        $dulieu['price'] = $data['price'];
                        $dulieu['quantity'] = $_POST['quantity'];
                        $_SESSION['dulieu'][$product_id] = $dulieu;
                    }
                } else {
                    $_SESSION['dulieu'] = array();
                    $product_id = $data['id'];
                    $dulieu = array();
                    $dulieu['id'] = $data['id'];
                    $dulieu['product_name'] = $data['product_name'];
                    $dulieu['product_image'] = $data['product_image'];
                    $dulieu['price'] = $data['price'];
                    $dulieu['quantity'] = $_POST['quantity'];
                    $_SESSION['dulieu'][$product_id] = $dulieu;
                }
                break;
            }
        case 'delete':
            {
                if(isset($_POST['id']))
                {
                    $id=$_POST['id'];
                    if(isset($_SESSION['dulieu'][$id])){
                        unset($_SESSION['dulieu'][$id]);
                    }
                }
                break;
            }
        case 'thanhtoan':
            {
                session_destroy();
                break;
            }
        default:
            {
                echo "giỏ hàng đang rỗng";
                break;
            }
    }
}
echo 'data';
header('Location: http://localhost:8080/simplephpcart/index.php');
die;