<?php

$DSN = 'mysql:host = localhost; dbname=testdata';
$connectingDB = new PDO($DSN,'root','');
?>


<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>
<body>
<div class="row p-2">
    <div class="col-lg-12">
<table class="table">
    <thead class="thead-dark">
    <tr >
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Password</th>
    </tr>
    </thead>


<?php
$connectingDB;

$total_records=0;
$sql1 = "SELECT * FROM data";
$stmt = $connectingDB->query($sql1);
        while($DataRows = $stmt->fetch()){
            $total_records++;
            }

        $limit = 3;
        if(isset($_GET["page"])){
            $page = $_GET["page"];
        }else{
            $page=1;
        }
        $offset = ($page - 1)* $limit;

        
        $sql = "SELECT * FROM data ORDER BY id  LIMIT {$offset},{$limit}";
        $stmt = $connectingDB->query($sql);
        while($DataRows = $stmt->fetch()){
            $id=$DataRows["id"];
            $name=$DataRows["name"];
            $email=$DataRows["email"];
            $mobile=$DataRows["mobile"];
            $password=$DataRows["password"];
            
           
        
    ?>
<tbody>
    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $mobile; ?></td>
        <td><?php echo $password; ?></td>
    </tr>
        </tbody>
    <?php } ?>
</table>
    </div>
</div>

<?php


if($total_records>0){
    
   
    $total_page = ceil($total_records/$limit);

    echo '<ul class="pagination" style="margin:10px auto auto 600px">';
    for($i=1;$i<=$total_page;$i++){
        echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
    }
    echo '</ul>';
} 

?>


</body>
</html>
