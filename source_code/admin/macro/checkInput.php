<?php
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkString($name){
    if (empty($name)) {
        return "Xin hãy nhập thông tin!";
    }
    else {
        $name = cleanInput($name);
        
        if (!is_string($name) || strlen($name) < 4 || strlen($name) > 40){
            return "Giá trị không hợp lệ!";
        }

        return "";
    }   
}

function checkNull($value) {
    if (empty($value)) {
        return "Xin hãy nhập thông tin!";
    }
    return "";
}

?>