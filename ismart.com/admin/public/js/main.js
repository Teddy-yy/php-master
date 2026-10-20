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

    // Hiện dropdown action cho item trong table
    $(".action").on("click", function(e){
        e.stopPropagation();
        if($(this).find(".action-dropdown").is(":visible")){
            $(this).find(".action-dropdown").fadeOut(250);
        } else {
            $(".action-dropdown").hide();
            // $(".category-sidebar-item").removeClass("active");
            $(this).parent(".category-sidebar-item").css("z-index", "999");
            $(this).find(".action-dropdown").fadeIn(250);
        }
    })

    // 
    $('.category-sidebar-item').hover(function() {
        $(this).find('.action-dropdown').hide();
    });

    // 
    $(document).click(function(){
        $('.action-dropdown').hide();
    });

    // Xoá hình ảnh upload ở form
    $("#form-delete-img").on("click", function(){
        $("#form-upload-img").fadeOut();
    });

    // Hiển thị ảnh sau khi chọn từ máy tính
    $("#input-img").change(function(){
        let file = this.files[0];

        if (file) {
            let imageUrl = URL.createObjectURL(file);
            $('#form-img').attr('src', imageUrl);
            setTimeout(function(){
                $('#form-upload-img').addClass('form-upload-img-show');
            }, 200);
        }

        let formData = new FormData();

        formData.append('category_image', file);

    })

    // Khi chọn danh mục cha thì hiển thị danh mục con tương ứng
    $("#product-cat-parent").change(function(){
        let parent_id = $(this).val();
    
        $.ajax({
            url: "?controller=product&action=getChildCat",
            type: "POST",
            data: {
                parent_id: parent_id
            },
            dataType: 'json',
            success: function(response) {
                let html = '<option value = "0">-- Chọn danh mục sản phẩm con --</option>';
                response.forEach(function(cat) {
                    html += `<option value="${cat.cat_id}">${cat.name}</option>`;
                });
                $("#product-cat-child").html(html);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        })
    });
});