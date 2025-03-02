<?php
header('Content-Type: text/html; charset=utf-8');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 处理可能未设置的字段
    $name = $_POST['name'] ?? '';
    $psw = $_POST['psw'] ?? '';
    $sex = $_POST['sex'] ?? '未选择';
    $hobby = isset($_POST['hobby']) ? implode(", ", $_POST['hobby']) : '无';
    $pic = $_FILES['pic']['name'] ?? '未上传';
    $birthday = $_POST['birthday'] ?? '';
    $time = $_POST['time'] ?? '';
    $datetime = $_POST['datetime'] ?? '';
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';
    $degree = $_POST['degree'] ?? '未选择';
    $display = $_POST['display'] ?? '';

    // 构建数据
    $data = "姓名: $name\n密码: $psw\n性别: $sex\n爱好: $hobby\n";
    $data .= "图像: $pic\n生日: $birthday\n时间: $time\n日期时间: $datetime\n";
    $data .= "邮箱: $email\n年龄: $age\n学历: $degree\n描述: $display\n\n";

    // 写入文件
    $file = '../submit/个人简介提交.txt';
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo "表单提交成功！";
    } else {
        echo "错误：无法写入文件。请检查目录权限。";
    }
}
?>