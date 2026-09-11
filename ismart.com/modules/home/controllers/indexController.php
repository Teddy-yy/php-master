<?php
    function construct(){
        // echo "Dùng chung, load đầu tiên";
    }

    function indexAction(){
        load_model('index');
        load_view('index');
    }

    function addAction(){
        echo "Thêm dữ liệu";
    }
?>