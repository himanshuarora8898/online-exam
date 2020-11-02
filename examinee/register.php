<?php 
include('sqlconfig.php');

$errors = array();
$message = '';
if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';

    if ($password != $repassword) {
        $errors[] = array('input' => 'password', 'msg'=>'password doesnt match');
    }
    $sql1="SELECT * from users WHERE username='".$username."'
    OR email='".$email."'";
    $result=$conn->query($sql1);
    if ($result->num_rows > 0) {
        $errors[]=array("input"=>"form","msg"=>"Username already present");

    } 
    if (sizeof($errors)==0) {
        $sql = "INSERT INTO users (username, password, email) 
        VALUES('$username' , '$password', '$email')";
        if ($conn->query($sql) === true) {
            // echo "New record created successfully";
            header("Location: login.php");
        } else {
            $errors[] = array('input'=>'form','msg'=>$conn->error); 
            // echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    
}
?>
<html>
<head>
    <title>
        Register
    </title>
    <link rel="stylesheet" type="text/css" href="stylesql.css">
</head>
<body>
    <div id="errors">
        <?php if (sizeof($errors)>0) :?>
            <ul>
            <?php foreach($errors as $error) :?>
                <li><?php echo $error['msg'] ;?></li>
            <?php endforeach;?>
            </ul>    
        <?php endif;?>
    </div>
    <div id="wrapper">
        <div id="signup-form">
            <h2>Sign Up</h2>
            <form action="signup.php" method="POST">
                <p>
                    <label for="username">Username: <input type="text"
                     name="username" required></label>
                </p>
                <p>
                    <label for="password">Password: <input type="password"
                     name="password" required></label>
                </p>
                <p>
                    <label for="password2">Re-Password: <input type="password"
                     name="repassword" required></label>
                </p>
                <p>
                    <label for="email">Email: <input type="email"
                     name="email" required></label>
                </p>
                <p>
                    <input type="submit" name="submit" value="Submit">
                </p>
            </form>
        </div>
    </div>
</body>
</html>