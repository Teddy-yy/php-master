<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
   function construct(){
      load_model('product');
      load('lib','validation');
   }

   function indexAction(){}

   // Product
   function addProductAction(){
      global $error;
      $data['list_cat_parent'] = get_list_cat(0);

      if(isset($_POST['btn-add-product'])){
         $error = array();

         // Kiểm tra tên sản phẩm
         if(!empty($_POST['product-name'])){
            $pattern = "/^[\p{L}\p{N}\s\-.]+$/u";
            if(preg_match($pattern, $_POST['product-name'])){
               if(!check_name($_POST['product-name'])){
                  $error["product-name"] = "Tên sản phẩm đã tồn tại";
               } else {
                  $product_name = $_POST['product-name'];
               }
            } else {
               $error["product-name"] = "Tên sản phẩm không hợp lệ";
            }
         } else {
            $error["product-name"] = "Không được để trống tên sản phẩm";
         }

         // Kiểm tra danh mục sản phẩm cha
         if($_POST['product-cat-parent'] == '0'){
            $error["product-cat-parent"] = "Vui lòng chọn danh mục sản phẩm cha";
         } else {
            $product_cat_parent = $_POST['product-cat-parent'];
         }

         // Kiểm tra danh mục sản phẩm con
         if($_POST['product-cat-child'] == '0'){
            $error["product-cat-child"] = "Vui lòng chọn danh mục sản phẩm cha";
         } else {
            $product_cat_child = $_POST['product-cat-child'];
         }

         // Kiểm tra giá sản phẩm
         if(!empty($_POST['product-price'])) {
            if($_POST['product-price'] < 0) {
               $error["product-price"] = "Giá sản phẩm không hợp lệ";
            } else {
               $product_price = $_POST['product-price'];
            }
         } else {
            $error["product-price"] = "Không được để trống giá sản phẩm";
         }

         // Kiểm tra số lượng sản phẩm
         if(!empty($_POST['product-quantity'])) {
            if($_POST['product-quantity'] < 0) {
               $error["product-quantity"] = "Số lượng sản phẩm không hợp lệ";
            } else {
               $product_quantity = $_POST['product-quantity'];
            }
         } else {
            $error["product-price"] = "Không được để trống số lượng sản phẩm";
         }

         // Kiểm tra ảnh
         $file = $_FILES['input-img'];
         if(check_update_img($file) !== true){
            $error["input-img"] = check_update_img($file);
         } 

         if(empty($error)){
            $img = uploadImage('products', $file);
            $product_code = createProductCode($product_cat_child);
            $product_info = array(
               'name' => $product_name,
               'price' => $product_price,
               'description' => $product_desc ?? "",
               'code' => $product_code,
               'cat_parent_id' => $product_cat_parent,
               'cat_child_id' => $product_cat_child,
               'quantity' => $product_quantity,
               'detail' => $product_detail ?? "",
               'thumbnail' => $img,
            );
            show_array($product_info);
            if(db_insert('tbl_products', $product_info)){
               redirect("?controller=product&action=listProduct");
            } else {
               echo "false";
            }
         }
      }
      load_view('addProduct', $data);
   }

   function getChildCatAction(){
      $result = array();
      if($_POST['parent_id'] != '0'){
         $result = get_list_cat($_POST['parent_id']);
      } 
      
      echo json_encode($result);
   }

   function listProductAction(){
      load_view('listProduct');
   }

   // Category
   function listCatAction(){
      $data['list_cat'] = get_list_cat();
      load_view('listCatProduct', $data);
   }

   function addCatAction(){
      global $error, $cat_name, $cat_code;
      $data['list_cat_parent'] = get_list_cat(0);
      
      if(isset($_POST['btn-add-cat'])){
         $error = array();

         // Kiểm tra tên danh mục
         if(!empty($_POST['cat-name'])){
            $pattern = "/^[\p{L}\d]+(?:\s[\p{L}\d]+)*$/u";
            if(preg_match($pattern, $_POST['cat-name'])){
               if(!check_name($_POST['cat-name'])){
                  $error["cat-name"] = "Tên danh mục đã tồn tại";
               } else {
                  $cat_name = $_POST['cat-name'];
               }
            } else {
               $error["cat-name"] = "Tên danh mục không hợp lệ";
            }
         } else {
            $error["cat-name"] = "Không được để trống tên danh mục";
         }

         // Kiểm tra mã danh mục
         if(!empty($_POST['cat-code'])){
            $pattern = "/^[a-zA-Z]+$/";
            if(preg_match($pattern, $_POST['cat-code'])){
               if(!check_cat_code(createCategoryCode($_POST['cat-parent'], strtoupper($_POST['cat-code'])))){
                  $error["cat-code"] = "Mã danh mục đã tồn tại";
               } else {
                  $cat_code = createCategoryCode($_POST['cat-parent'], $_POST['cat-code']);
               }
            } else {
               $error["cat-code"] = "Mã danh mục không hợp lệ";
            }
         } else {
            $error["cat-code"] = "Không được để trống mã danh mục";
         }

         // Kiểm tra ảnh
         $file = $_FILES['input-img'];
         if(check_update_img($file) !== true){
            $error["input-img"] = check_update_img($file);
         } 

         if(empty($error)){
            $img = uploadImage('category', $file);
            $data = array(
               'name' => $cat_name,
               'parent_id' => $_POST['cat-parent'],
               'code' => $cat_code,
               'image' => $img,
            );
            if(db_insert('tbl_categories', $data)){
               redirect("?controller=product&action=listCat");
            }
         }
      }
      load_view("addCat", $data);
   }
?>