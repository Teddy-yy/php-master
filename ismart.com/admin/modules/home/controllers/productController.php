<?php
   function construct(){
      load_model('product');
      load('lib','validation');
   }

   function indexAction(){}

   // Product
   function addProductAction(){
      load_view('addProduct');
   }

   function listProductAction(){
      load_view('listProduct');
   }

   // Category
   function listCatAction(){
      $data['list_cat_parent'] = get_list_cat_parent();
      $data['list_cat_child'] = get_list_cat_child();
      load_view('listCatProduct', $data);
   }

   function addCatAction(){
      global $error, $cat_name;
      $data['list_cat_parent'] = get_list_cat_parent();
      
      if(isset($_POST['btn-add-cat'])){
         $error = array();

         // Kiểm tra tên danh mục
         if(!empty($_POST['cat-name'])){
            $pattern = "/^[\p{L}\d]+(?:\s[\p{L}\d]+)*$/u";
            if(preg_match($pattern, $_POST['cat-name'])){
               if(!check_cat_name($_POST['cat-name'])){
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

         // Kiểm tra ảnh
         $file = $_FILES['cat-input-img'];
         if(check_update_img($file) !== true){
            $error["cat-input-img"] = check_update_img($file);
         } 

         if(empty($error)){
            // Tạo mã danh mục sản phẩm
            $cat_code = createCategoryCode($_POST['cat-parent']);
            // show_array($cat_code);
            echo $cat_code;
            $img = uploadImage('category', $file);
            $data = array(
               'name' => $cat_name,
               'parent_id' => $_POST['cat-parent'],
               'code' => $cat_code,
               'image' => $img,
            );

            if(db_insert('tbl_categories', $data)){
               echo "ok";
            }
            // show_array($data);
         }
      }
      load_view("addCat", $data);
   }


?>