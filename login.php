<!-- login.php -->
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

// 从登录表单中获取用户名和密码
$username = $_POST['username'];
$password = $_POST['password'];

// 查询数据库以验证用户名和密码
$sql = "SELECT * FROM account WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// 检查查询是否成功
if ($result === false) {
    die("查询错误: " . $conn->error);
}

// 检查查询是否返回结果
if ($result->num_rows > 0) {
    // 登录成功
    echo "登录成功！";
    // 登录成功后延迟3秒再重定向到登录页面
    echo "<script>setTimeout(function(){ window.location.href = 'login.html'; }, 3000);</script>";
} else {
    // 登录失败
    echo "登录失败，请检查用户名和密码。";
}

$conn->close();
?>
