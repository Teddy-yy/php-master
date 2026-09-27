<?php
   function construct(){
      load_model('product');
   }

   function indexAction(){
      
   }

   function addProductAction(){
      load_view('addProduct');
   }

   function listProductAction(){
      load_view('listProduct');
   }

   function listCatProductAction(){
      $data['list_cat_parent'] = get_list_cat_parent();
      $data['list_cat_child'] = get_list_cat_child();
      load_view('listCatProduct', $data);
   }
?>