<?php


$Id = $_POST["id"];
$Name = $_POST["name"];
$Email = $_POST["email"];
$Mobile = $_POST["mobile"];
$Password = $_POST["password"];


$DSN = 'mysql:host = localhost; dbname=testdata';
$connectingDB = new PDO($DSN,'root','');

$sql = "INSERT INTO data VALUES(:id,:name,:email,:mobile,:password)";
$stmt = $connectingDB->prepare($sql);
$stmt->bindValue(':id',$Id);
$stmt->bindValue(':name',$Name);
$stmt->bindValue(':email',$Email);
$stmt->bindValue(':mobile',$Mobile);
$stmt->bindValue(':password',$Password);

$Execute = $stmt->execute();
if($Execute){
    $res = array("status"=>"1","message"=>"data added successfully");
}else{
    $res = array("status"=>"0","message"=>"failed to add data");
}

echo json_encode($res);
?>


