<?php
$conn=new mysqli("localhost","root","","file-upload");
if($conn->connect_error){
    die("could not connect to database");
}
if(move_uploaded_file($_FILES['user']['tmp_name'],$_FILES['user']['name'])){
  
    $query=$conn->prepare("insert into pics values(?,?)");
    $query->bind_param('is',$id,$src);
    $id;
    $src=$_FILES['user']['name'];
    if($query->execute()){
header("Location: gozie.php");
    }else{
        header("Location: gozie.php");
    }
}else{
    header("Location: gozie.php");
}
?>