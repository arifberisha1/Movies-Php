<?php 
$l = "series";
include'header.php';

?>
        
        
        <main>
            <table>

            <?php             

                $sql = "SELECT a.*, c.name as zh1, d.name as zh2, e.name as zh3, YEAR(a.mdate) as year FROM mnames a join mzhanret b on (a.id = b.mid) join zhanret c on (b.zh1 = c.id) join zhanret d on (b.zh2 = d.id) join zhanret e on (b.zh3 = e.id) WHERE category = 'serie' order by(year) DESC";
                $result = $db->query($sql);
                $i = 0; 
                $num = $result->num_rows;
                while($i < $num):
                    $arr1 = array();
                    $arr2 = array();
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
                    array_push($arr1,($row['name']." (".$row['year'].")"));
                    array_push($arr2,$row['zh1']);
                    array_push($arr2,$row['zh2']);
                    array_push($arr2,$row['zh3']);

                    if($i < $num){
                        $i++;
                        $row = $result->fetch_assoc();
                        array_push($arr1,($row['name']." (".$row['year'].")"));
                    array_push($arr2,$row['zh1']);
                    array_push($arr2,$row['zh2']);
                    array_push($arr2,$row['zh3']);
                    ?>
                        
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
                        $row = $result->fetch_assoc();
                        array_push($arr1,($row['name']." (".$row['year'].")"));
                    array_push($arr2,$row['zh1']);
                    array_push($arr2,$row['zh2']);
                    array_push($arr2,$row['zh3']);
                        ?>
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

                <?php 
                $j = 0;
                while($j < count($arr1)){
                    echo "<td>".$arr1[$j]."</td>";
                    $j++;
                }
                unset($arr1);
                ?>
                       
                    </tr>

                    <tr>
                  <?php
                $j = 0;
                while($j < count($arr2)):
               ?>
               <td>
                <a href="zhanret.php?zh=<?php echo $arr2[$j]?>"><?php echo $arr2[$j] ?></a>  
                <?php $j++; ?>     
                <a href="zhanret.php?zh=<?php echo $arr2[$j]?>"><?php echo $arr2[$j] ?></a>  
                <?php $j++; ?>   
                <a href="zhanret.php?zh=<?php echo $arr2[$j]?>"><?php echo $arr2[$j] ?></a>  
                <?php $j++;
                endwhile;
                  ?>
                  </td>
                    </tr>

                
            <?php 
            endwhile;
            ?>

            </table>

        </main>

        

<?php

include'footer.php';

?>