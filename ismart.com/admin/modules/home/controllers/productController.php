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
      $data['list_cat'] = get_list_cat();
      $data['list_cat_child'] = get_list_cat('1');
      load_view('listCatProduct', $data);
   }
?>