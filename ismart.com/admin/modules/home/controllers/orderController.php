<?php
    function construct(){
    }

    function indexAction(){
        load_model('order');
    }

    function listOrderAction(){
       load_view('listOrder');
    }

    function listCustomerAction(){
       load_view('listCustomer');
    }
?>