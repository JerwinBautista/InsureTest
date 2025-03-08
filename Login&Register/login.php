<?php
session_start();
if (!isset($_SESSION["otp"])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST["verify"])) {
    $entered_otp = $_POST["otp"];
    if ($entered_otp == $_SESSION["otp"]) {
        $_SESSION["user"] = $_SESSION["email"];
        unset($_SESSION["otp"]);
        header("Location: index.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Invalid OTP. Try again.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form action="verify_otp.php" method="post">
            <div class="form-group">
                <input type="text" name="otp" placeholder="Enter OTP" class="form-control" required>
            </div>
            <div class="form-btn">
                <input type="submit" name="verify" value="Verify OTP" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>
