$(document).ready(function () {
    var height = $(window).height() - $('#footer-wp').outerHeight(true) - $('#header-wp').outerHeight(true);
    $('#content').css('min-height', height);

    //  CHECK ALL
    $('input[name="checkAll"]').click(function () {
        var status = $(this).prop('checked');
        $('.list-table-wp tbody tr td input[type="checkbox"]').prop("checked", status);
    });

    // EVENT SIDEBAR MENU
    // Nếu nav-item có sub-menu thì hiện mũi tên
    $('#sidebar-menu .nav-item').each(function () {
        if ($(this).find('.sub-menu').length > 0) {
            $(this).find('.nav-link .title').after('<span class="fa fa-angle-right arrow"></span>');
        }
    });
    var sidebar_menu = $('#sidebar-menu > .nav-item > .nav-link');
    sidebar_menu.on('click', function () {
        if ($(this).parent('li').find('.sub-menu').length === 0) {
            return true;
        }
        // Nếu thẻ cha li của nav-link chưa có class active 
        if (!$(this).parent('li').hasClass('active')) { 
            // Đóng tất cả sub-menu
            $('.sub-menu').slideUp();
            // Mở submenu của cái đang click
            $(this).parent('li').find('.sub-menu').slideDown();
            // Xóa active cũ
            $('#sidebar-menu > .nav-item').removeClass('active');
            // Đánh dấu cái vừa click
            $(this).parent('li').addClass('active');
            return false;
        } 
        // Nếu thẻ cha li của nav-link đã có class active
        else {
            $('.sub-menu').slideUp();
            $('#sidebar-menu > .nav-item').removeClass('active');
            return false;
        }
    });

    // Tự động tải ảnh đại diện vừa upload
    $("#form-avatar").on("change", function(){
        let file = document.getElementById('avatar-input').files[0];
        let formData = new FormData();
        formData.append("avatar", file);
        
        $.ajax({
            url : '?mod=users&action=updateAvatar',
            type : "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType : 'json',

            success: function(response) {
                console.log(response.upload_file);
                $("#avatar-preview").attr("src", response.upload_file);
                $("#avatar-header").attr("src", response.upload_file);
            }
        })
    })

    // Thêm class active vào sidebar của danh sách danh mục sản phẩm
    // $(".category-sidebar-item").on("click", function(){
    //     $('.category-sidebar-item').removeClass('active');
    //     $(this).addClass('active');
    // })

    $(".category-item-action").on("click", function(e){
        e.stopPropagation();
        if($(this).find(".category-item-dropdown").is(":visible")){
            $(this).find(".category-item-dropdown").fadeOut(250);
        } else {
            $(".category-item-dropdown").hide();
            $(".category-sidebar-item").removeClass("active");
            $(this).parent(".category-sidebar-item").addClass("active");
            $(this).find(".category-item-dropdown").fadeIn(250);
        }
    })

    $(document).click(function(){
        // let a = $('.category-item-action').find(".category-item-dropdown").hasClass('show-dropdown');
        // console.log(a);
        $('.category-item-dropdown').hide();
    });
});