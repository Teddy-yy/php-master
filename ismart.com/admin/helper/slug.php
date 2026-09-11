<?php
function create_slug($string) {
    // Chuyển tiếng Việt có dấu thành không dấu
    $string = mb_strtolower($string, 'UTF-8');

    $unicode = [
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ'
    ];

    foreach ($unicode as $nonUnicode => $unicodeChar) {
        $string = preg_replace(
            "/($unicodeChar)/u",
            $nonUnicode,
            $string
        );
    }

    // Loại bỏ ký tự đặc biệt
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string);

    // Thay khoảng trắng bằng dấu -
    $string = preg_replace('/[\s-]+/', '-', $string);

    // Loại bỏ dấu - ở đầu và cuối
    $string = trim($string, '-');

    return $string;
}
?>