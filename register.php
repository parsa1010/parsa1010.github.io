php
<?php
//اتصال به پایگاه داده
$servername = "localhost";
$username = "نام_کاربری";
$password = "رمز_عبور";
$dbname = "نام_پایگاه_داده";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("اتصال به پایگاه داده با خطا مواجه شد: " . $conn->connect_error);
}

// دریافت اطلاعات از فرم
$name = $_POST['name'];
$lastName = $_POST['lastName'];
$fatherName = $_POST['fatherName'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$birthDate = $_POST['birthDate'];

// استفاده از prepared statement برای جلوگیری از تزریق SQL
$stmt = $conn->prepare("INSERT INTO users (name, last_name, father_name, height, weight, birth_date) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $lastName, $fatherName, $height, $weight, $birthDate);
$stmt->execute();

echo "ثبت نام با موفقیت انجام شد.";

$stmt->close();
$conn->close();
?>
php
<?php
// ... کد قبلی ...

if (mysqli_query($conn, $sql)) {
    // ثبت نام با موفقیت انجام شد، هدایت کاربر به صفحه دیگر
    header("Location: welcome.php");
    exit();
} else {
    echo "خطا در ثبت نام: " . mysqli_error($conn);
}

mysqli_close($conn);
?>