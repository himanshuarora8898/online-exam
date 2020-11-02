<?php 
require 'sqlconfig.php';
?>
<?php 
$count=0;
$array1=array();
$array2=array();
$sql1="SELECT * from tests";
$result=$conn->query($sql1);
if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()) {
        array_push ($array1, $row['correct_answer']);
    }
}

$sql1="SELECT * from check_result";
$result=$conn->query($sql1);
if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()) {
    array_push ($array2, $row['correct']);

    }
}
for ($i=0;$i<=8;$i++) {
    if ($array1[$i]==$array2[$i]) {
        $count++;
    }
}    
    
if ($count>=4) {
    echo "you have cleared the test";
    
}
   
else{
    echo "you failed";
    
}
?>