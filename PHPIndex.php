<?php 
$l = "home";
include'header.php';
?>
        <main>
            <table>

            <?php 


        $m = $_GET['m'];  
        $shift = $_GET['n'];
            

                $sql = "SELECT a.id, a.name, a.link, a.img, a.mdate, a.category,  YEAR(a.mdate) as year from mnames a left join (SELECT * FROM mnames order by mdate DESC limit $shift) b on (a.id = b.id) where b.name is null  order by a.mdate DESC limit $m";
                $result = $db->query($sql);
                $result1 = $db->query($sql);
                $result2 = $db->query($sql);
                $i = 0;
                $num = $result->num_rows;
                while($i < $num):
                    $j = 0;
                    $row = $result->fetch_assoc();
                    $i++;
            ?>
                <tr>
                    <td>
                        <div>
                            <a href="<?php echo $row['category'].'.php?id='.$row['id'] ?>"><img src="<?php echo'images/'.$row['img'];?>"
                                    alt="<?php echo$row['name'] ?>" class="moviebox mleft" id="m<?= $i ?>"></a>
                        </div>
                    </td>
                    

                    <?php 
                    $j++;
                    if($i < $num){
                        $i++;
                        $j++;
                        $row = $result->fetch_assoc();?>
                    <td>
                        <div>
                            <a href="<?php echo $row['category'].'.php?id='.$row['id'] ?>"><img src="<?php echo'images/'.$row['img'];?>"
                                    alt="<?php echo$row['name'] ?>" class="moviebox mcenter" id="m<?= $i ?>"></a>
                        </div>
                    </td>
                    <?php
                    }
                   
                    if($i < $num){
                        $i++;
                        $j++;
                        $row = $result->fetch_assoc();?>
                    <td>
                        <div>
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
                        $row1 = $result1->fetch_assoc();
                        ?>
                        <td><div style="padding-top: 0px;"><?php echo ucfirst($row1['name']).' ('.$row1['year'].')' ?></div></td>

                    <?php }?>    
                    </tr>

                    <tr>
                    <?php for($k = 0;$k < $j;$k++){ 
                    $row2 = $result2->fetch_assoc();
                    $sql1 = "SELECT a.id as id, a.name as name, c.link as zh1, c.name as name1, d.link as zh2, d.name as name2, e.link as zh3, e.name as name3 FROM mnames a JOIN mzhanret b on (a.id = b.mid)
                    JOIN zhanret c on (b.zh1 = c.id)
                    JOIN zhanret d on (b.zh2 = d.id)
                    JOIN zhanret e on (b.zh3 = e.id) where a.id = ".$row2['id'];
                    $result3 = $db->query($sql1);
                    $row3 = $result3->fetch_assoc();

                    ?>
                    <td>
                        <div style="padding-top: 0px;">
                    <a href="zhanret.php?zh=<?php echo $row3['name1'] ?>"><?php echo $row3['name1'] ?></a>
                    <a href="zhanret.php?zh=<?php echo $row3['name2'] ?>"><?php echo $row3['name2'] ?></a>
                    <a href="zhanret.php?zh=<?php echo $row3['name3'] ?>"><?php echo $row3['name3'] ?></a>
                    </div>
                    </td>
                    <?php }?>
                    </tr>

<?php 
            endwhile;
            ?>

            </table>

        </main>

        

<?php

if($shift  == 0){
    ?>
    <nav class="nav2" style="padding-left: 10px; padding-right: 0px">
    <a href="index.php?p=current&pshift=<?php echo $shift ?>" title="Current">1</a>
    <a href="index.php?p=next&pshift=<?php echo $shift ?>" title="Next">&#62;</a>
    <a href="index.php?p=last&pshift=<?php echo $shift ?>" title="Last">&#62;&#62;</a>
    <?php
}else if($shift == ($_GET['pnum']-1)*$m){
    ?>
    <nav class="nav2" style="padding-left: 10px; padding-right: 0px">
    <a href="index.php?p=first&pshift=<?php echo $shift ?>" title="First">&lt;&lt;</a>
    <a href="index.php?p=prev&pshift=<?php echo $shift ?>" title="Prev">&lt;</a>
    <a href="index.php?p=current&pshift=<?php echo $shift ?>" title="Current"><?php echo ($shift/$m)+1 ?></a>

<?php

}else{

    ?>
    <nav class="nav4" style="padding-left: 0px; padding-right:0px">
    <a href="index.php?p=first&pshift=<?php echo $shift ?>" title="First">&lt;&lt;</a>
    <a href="index.php?p=prev&pshift=<?php echo $shift ?>" title="Prev">&lt;</a>
    <a href="index.php?p=current&pshift=<?php echo $shift ?>" title="Current"><?php echo ($shift/$m)+1 ?></a>
    <a href="index.php?p=next&pshift=<?php echo $shift ?>" title="Next">&#62;</a>
    <a href="index.php?p=last&pshift=<?php echo $shift ?>" title="Last">&#62;&#62;</a>

<?php
}

?>

        </nav>

<?php
include'footer.php';
?>