<?php


require "sqlconfig.php";
if (isset($_POST['submit'])) {
    $question=isset($_POST['question'])?$_POST['question']:'';
    $opt1=isset($_POST['opt1'])?$_POST['opt1']:'';
    $opt2=isset($_POST['opt2'])?$_POST['opt2']:'';
    $opt3=isset($_POST['opt3'])?$_POST['opt3']:'';
    $opt4=isset($_POST['opt4'])?$_POST['opt4']:'';
    $test=isset($_POST['test'])?$_POST['test']:'';
    $correct=isset($_POST['crt'])?$_POST['crt']:'';


  
    $sql="INSERT INTO `tests` (`questions`, `option1`, `option2`, `option3`, `option4`, `tests`,`correct_answer`)
    VALUES ('$question', '$opt1', '$opt2', '$opt3', '$opt4', '$test','$correct')";
    if ($conn->query($sql)===true) {
   
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
<html>
    <head>
   <link rel="stylesheet" href="admin.css">
       
    </head>
    <div class="head">  
        <div  id="outer">
          <div id="inner"><p>Online Exam</p></div>
        </div>
        <nav>
            <ul class="navul">
                <div class="dropdown">
                  <button class="dropbtn" style="color: rgb(147, 24, 248)">Test
                  <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-content">
                   <a href="admin.php?id=Test1">Test 1</a>
                   <a href="admin.php?id=Test2">Test 2</a>
                   <a href="admin.php?id=Test3">Test 3</a>
                   <a href="admin.php?id=Test4">Test 4</a>
                  </div>
                </div>
                <li><a href="#" id="na">Subjects</a></li>
                <li><a href="#" id="na">Examinees</a></li>
                <li><a href="#" id="na">Scores</a></li>
            
               </li>
               
              
            </ul>
        </nav>
    </div>
    
    
    <div class="lftpor"><?php
    if (isset($_GET['id']) ) {
        $update=$_GET['id'];
    }
   
    ?>
    <form action="admin.php" method="post">
   <label for="question" style="font-size: 1.5em;">Question:</label><br>
  <input type="text" id="question" class="question" name="question" style="width: 100%; height:20%;border-radius:25px;"><br><br>
  <label for="opt1" style="font-size: 1.5em;">Option 1:</label><br>
  <input type="text" id="opt1" name="opt1" style="border-radius:20px;"><br><br>
  <label for="opt2" style="font-size: 1.5em;">Option 2:</label><br>
  <input type="text" id="opt2" name="opt2" style="border-radius:20px;"><br><br>
  <label for="opt3" style="font-size: 1.5em;">Option 3:</label><br>
  <input type="text" id="opt3" name="opt3" style="border-radius:20px;"><br><br>
  <label for="opt4" style="font-size: 1.5em;">Option 4:</label><br>
  <input type="text" id="opt4" name="opt4" style="border-radius:20px;"><br><br>
  <label for="crt" style="font-size: 1.5em;">correct answer:</label><br>
  <input type="text" id="crt" name="crt" style="border-radius:20px;"><br><br>
  <select id="test" name="test">
    <option value="test1">test1</option>
    <option value="test2">test2</option>
    <option value="test3">test3</option>
    <option value="test4">test4</option>
    <option value="test5">test5</option>
  </select><br><br>
  <input type="submit" value="Submit" name="submit" class="sub">
    
    </form>
    </div>
         
    <footer>Copyright & copy</footer>
    </section>
   
</html>
