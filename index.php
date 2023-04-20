<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Movies</title>
    <script src="https://cdn.tailwindcss.com"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <div class="add ">
            <a href="addform.php"> Add New</a>
        </div>
<?php
$servername="localhost";
$username="root";
$password="";
$database="cinema";

$conn= new mysqli($servername,$username,$password,$database);
if($conn->connect_error){
    die("connection failed");
}
 $sql = "SELECT * FROM movies WHERE id=?";
 stmt=$conn-> prepare($sql);
 $stmt= bid_param("i",$id);
 $id=1;
 $stmt->execute();
 $result=$stmt->get_result();
 $stmt->close();
 $conn->close();
 
 $result=$conn->query($sql);

 if($result->num_rows>0){

   while( $row= $result->fetch_assoc()){
    ?>
    
       
    <div class="body bg-cyan-100 m-10 flex flex-col text-center">

<div class="attach flex  font-extrabold bg-sky-600 text-white border-2 border-sky-600 rounded-full">

    <div class="">
        <?php echo $row['id'];?>
        <?php echo $row['title'];?>
        <div class="edit flex justify-end">
          <a href="editform.php?id=<?php echo $row['id'];?>&rating=<?php echo $row['rating'];?>&title=<?php echo $row['title'];?>&desc=<?php echo $row['descr'];?>"> 
          <i class="fa fa-edit "></i>
          </a>
          <a href="delete.php?id=<?php echo $row['id']?>">
            <i class="fa fa-trash"></i>
         </a>

           
        </div>
     </div>
</div>

<div class="descr  border-2 border-white rounded m-2">
<?php echo $row['descr'];?>
</div>




?>

</div>
</div>


</div>

  
        <?php
 }
}
 else{
    echo "no not added any datas";
}
 $conn->close();
?>

</body>
    </html>