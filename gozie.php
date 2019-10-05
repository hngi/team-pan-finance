<!DOCTYPE html>
<html>
  <head>
    <title>upload</title>
  </head>
  <body>
      <div id="regFormContainer" class="bar-colors-borders">
          <form action="uploadImages.php" method="post" enctype="multipart/form-data">
              <p><input type="hidden" name="MAX_FILE_SIZE" value="100000" ></p>
              <div class="uploadFileprompt"></div>
                  <div class="span_left"><b>upload picture of expense
                  <div class="span_right"><input type="file" name="user">
                   <input type="submit" class="submit"></div>
</form>
</div>
<table>
  <?php
$conn=new mysqli("localhost","root","","file-upload");
if($conn->connect_error){
    die("could not connect to database");
}
$query=$conn->query("select * from pics");
while($row=$query->fetch_assoc()){ ?>
 <tr><td><img style="width:100px;height:100px;" src="<?php echo $row['src']; ?>"></td></tr>
<?php }
?>
 
</table>
<style>
.submit{
  background-color: blue;
}
</style>
 </body>
</html>