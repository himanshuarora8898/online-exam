<?php

require "sqlconfig.php";
?>
<?php

session_start();
$errors=array();


if (isset($_POST['submit'])) {
    $username=isset($_POST['username'])?$_POST['username']:'';
    $userpassword=isset($_POST['password'])?$_POST['password']:'';

    if (count($errors)==0) {

        $sql1="SELECT * from users WHERE username='".$username."'
	     AND userpassword='".$userpassword."'";
        $result=$conn->query($sql1);
        if ($result->num_rows > 0) {
            while ($row= $result->fetch_assoc()) {
                $_SESSION['userdata']=array("username"=>$row['username'],
                "user_id"=>$row['id']);
                header("Location: examinee.php");
            }

        } else {
            $errors[]=array("input"=>"form","msg"=>"Invalid Login credential");
        }

    } else {
        foreach ($errors as $error) {
            echo "*".$error['msg']."<br>";
        }
    }

    $conn->close();
}

if (isset($_POST['register'])) {
    header("Location: signup.php");
}



?>



<!DOCTYPE html>
<html>
<head>
<title>
Login
</title>

</head>
<body >
<div id="wrapper">

<div id="login-form">
<a href="register.php" class="a1" >Register</a>
<h1>Login</h1>
<form action="login.php" method="POST">
<p>
<label for="username">Username: <input type="text" name="username" required></label>
</p>
<p>
<label for="password">Password: <input type="password"
 name="password" required></label>
</p>
<p>
<input type="submit" class="iaa" name="submit" value="Login">
</p>
</form>

</div>

</div> 
<style>
        .a1{
        text-decoration: none;
        color: blue;
        padding: 10px;
        margin: 5px;
        border: 1px solid black;
        border-radius: 5px;;
        background-color: white;
        float:right;
        margin-right:50px;
        }
      
        
        input {
            width: 180px;
            height: 30px;
            margin: 10px;
        }
        .iaa{
            background-color: white;
            font-weight:bold;
        }
        
        #login-form {
            margin-top: 50px;
            margin-left: 500px;
        }
        h2{
            margin-right: 650px;
        }
    </style>
</body>
</html>