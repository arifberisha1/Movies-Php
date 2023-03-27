<?php
$l = "home";
include'header.php';

?>
        
        <main>
           
<br>

<table>

<?php 

if(strtolower($_POST['search']) == "hey siri"){
?>

<div style="background-color: rgba(198, 198, 198, 0.3); border-radius:5%; width:auto; height:auto; margin:15px; justify-content:center; align-items:center">
    <p style="color: red; font-size: 30px;">Ti a je budall a ç'a o puna jote!<br>Njeri me men ne kry "hey siri" thojka<br>cc:Albii + Arifi</p>
</div>
<?php
}else{

$sql = "SELECT *, YEAR(mdate) as year FROM MNames where name like '%".$_POST['search']."%' order by mdate DESC";


$result = $db->query($sql);
$result1 = $db->query($sql);
$result2 = $db->query($sql);
$num = $result->num_rows;
if($num > 0){
$i = 0;
    while($i < $num):
        $j = 0;
?>
<tr>
<td>
    <div>
    <?php $row = $result->fetch_assoc(); 
    $i++;?>
        <a href="<?php echo $row['category'].'.php?id='.$row['id'] ?>"><img src="<?php echo'images/'.$row['img'];?>"
                alt="<?php echo$row['name'] ?>" class="moviebox mleft" id="m<?= $i ?>"></a>
    </div>
</td>

<?php

$j++;
if($i < $num){
    $j++;
    ?>
    
    <td>
    <div>
    <?php $row = $result->fetch_assoc(); 
    $i++;?>
        <a href="<?php echo $row['category'].'.php?id='.$row['id'] ?>"><img src="<?php echo'images/'.$row['img'];?>"
                alt="<?php echo$row['name'] ?>" class="moviebox mcenter" id="m<?= $i ?>"></a>
    </div>
</td>
    
    <?php
}

if($i < $num){
    $j++;
    ?>
    
    <td>
    <div>
    <?php $row = $result->fetch_assoc(); 
    $i++;?>
        <a href="<?php echo $row['category'].'.php?id='.$row['id'] ?>"><img src="<?php echo'images/'.$row['img'];?>"
                alt="<?php echo$row['name'] ?>" class="moviebox mright" id="m<?= $i ?>"></a>
    </div>
</td>
    
    <?php
}

?>
</tr>

<tr class="font">

                <?php for($k = 0;$k < $j;$k++){ 
                     $row1 = $result1->fetch_assoc()?>
                    <td><?php echo ucfirst($row1['name']).' ('.$row1['year'].')' ?></td>

                <?php }?>    
                </tr>

    <tr>
        <?php for($k = 0;$k < $j;$k++){ 
            $row2 = $result2->fetch_assoc();
            $sql1 = "SELECT a.id as id, a.name as name, c.name as zh1, d.name as zh2, e.name as zh3 FROM mnames a JOIN mzhanret b on (a.id = b.mid)
            JOIN zhanret c on (b.zh1 = c.id)
            JOIN zhanret d on (b.zh2 = d.id)
            JOIN zhanret e on (b.zh3 = e.id) where a.id = ".$row2['id'];
            $result3 = $db->query($sql1);
            $row3 = $result3->fetch_assoc();
            
        ?>
    <td>
            <a href="zhanret.php?zh=<?php echo$row3['zh1'] ?>"><?php echo $row3['zh1'] ?></a>
            <a href="zhanret.php?zh=<?php echo$row3['zh2'] ?>"><?php echo $row3['zh2'] ?></a>
            <a href="zhanret.php?zh=<?php echo$row3['zh3'] ?>"><?php echo $row3['zh3'] ?></a>
    </td>
<?php }?>
    </tr>

<?php
endwhile;

echo "</table>";

}else{
?>

<div style="background-color: rgba(198, 198, 198, 0.3); border-radius:5%; width:auto; height:auto; margin:15px;">
    <table style="margin-left: 300px">
        <td><h2 style="padding-top:20px; padding-bottom:20px; color:red;">No results from your search!</h2></td>
        <td><img src="images/sad.png" alt="Sad face" style="height:50px; width:60px"></td>
    </table>
</div>

<?php 
}
}
?>

        </main>

        <!-- <nav class="nav2">
            <a href="index.html" title="Home Page">1</a>
            <a href="page2.html" title="Next">&#62;</a>
            <a href="page2.html" title="Last">&#62;&#62;</a>
        </nav> -->

    
       <?php 
       include 'footer.php';
       ?>