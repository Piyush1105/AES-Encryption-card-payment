<?php 
session_start();

$email = '';
$password = '';
$username = '';
$confirm_password = '';
$db = mysqli_connect('localhost', 'root', '', 'aes');

$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);


// for registration of user
if($confirm_password == $password){
    $password = md5($password);
    $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
    mysqli_query($db, $sql);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
}
else{
    $_SESSION['error'] = "The passwords do not match";
}

//for login of user
if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if(mysqli_num_rows($results) == 1){
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
    else{
        echo "Incorrect username or password";
    }
}


?>