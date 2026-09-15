<?php
    function construct(){
    }

    function indexAction(){
        load_model('product');
    }

    function addProductAction(){
       load_view('addProduct');
    }

    function listProductAction(){
       load_view('listProduct');
    }
?>