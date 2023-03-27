<?php

include 'db.php';
$sql = "SELECT COUNT(id) as count from mnames";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$mnum = $row['count'];

$m = 9;


if($mnum % $m == 0){
// $pnum = (int)($mnum/$m);
    $pnum = $mnum/$m;
}else{
    $pnum = (int)($mnum/$m)+1;
}


// echo $pnum;

if(isset($_GET['p'])){

    $msg = $_GET['p'];

   if($msg == 'last'){
        $shift = ($pnum-1)*$m;
        header('location: PHPIndex.php?n='.$shift.'&m='.$m.'&pnum='.$pnum);
    }else if($msg == "first"){
        header('location: PHPIndex.php?n=0&m='.$m.'&pnum='.$pnum);
    }else if($msg == "next"){
        $pshift = $_GET['pshift'] + $m;
        header('location: PHPIndex.php?n='.$pshift.'&m='.$m.'&pnum='.$pnum);
    }else if($msg == "prev"){
        $pshift = $_GET['pshift'] - $m;
        header('location: PHPIndex.php?n='.$pshift.'&m='.$m.'&pnum='.$pnum);
    }else if($msg == "current"){
        $pshift = $_GET['pshift'];
        header('location: PHPIndex.php?n='.$pshift.'&m='.$m.'&pnum='.$pnum);
    }


}else{
    header('location: PHPIndex.php?n=0&m='.$m.'&pnum='.$pnum);
}



?>