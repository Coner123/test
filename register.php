<!-- register.php -->
<?php
// 连接到数据库
$servername = "localhost"; // 数据库服务器名称
$username = "root"; // 数据库用户名
$password = ""; // 数据库密码
$dbname = "account"; // 数据库名称

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 从注册表单中获取用户名和密码
$username = $_POST['username'];
$password = $_POST['password'];

// 将新用户的用户名和密码插入到数据库中
$sql = "INSERT INTO account (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "注册成功！";
    // 注册成功后延迟3秒再重定向到登录页面
    echo "<script>setTimeout(function(){ window.location.href = 'login.html'; }, 3000);</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
