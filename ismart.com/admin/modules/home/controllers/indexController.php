<?php
    function construct(){
        // echo "Dùng chung, load đầu tiên";
    }

    function indexAction(){
        load_model('index');
        load_view('index');
    }

    function addPageAction(){
       load_view('addPage');
    }

    function listPageAction(){
       load_view('listPage');
    }
?>