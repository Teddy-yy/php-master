<?php
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

         // Kiểm tra danh mục sản phẩm
         if($_POST[''])

         // Kiểm tra mã sản phẩm
         if(!empty($_POST['cat-code'])){
            $pattern = "/^[a-zA-Z]+$/";
            if(preg_match($pattern, $_POST['cat-code'])){
               if(!check_cat_code(createCategoryCode($_POST['cat-parent'], strtoupper($_POST['cat-code'])))){
                  $error["cat-code"] = "Mã danh mục đã tồn tại";
               } else {
                  $product_code = createCategoryCode($_POST['cat-parent'], $_POST['cat-code']);
               }
            } else {
               $error["cat-code"] = "Mã danh mục không hợp lệ";
            }
         } else {
            $error["cat-code"] = "Không được để trống mã danh mục";
         }

         // Kiểm tra ảnh
         $file = $_FILES['cat-input-img'];
         if(check_update_img($file) !== true){
            $error["cat-input-img"] = check_update_img($file);
         } 

         if(empty($error)){
            $img = uploadImage('category', $file);
            $data = array(
               'name' => $product_name,
               'parent_id' => $_POST['cat-parent'],
               'code' => $product_code,
               'image' => $img,
            );
            if(db_insert('tbl_categories', $data)){
               redirect("?controller=product&action=listCat");
            }
         }
      }
      load_view('addProduct', $data);
   }

   function getChildCatAction(){
      $list_cat_child = get_list_cat($_POST['parent_id']);
      
      echo json_encode($list_cat_child);
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