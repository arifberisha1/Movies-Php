<?php 
include 'db.php';
$ssid = $_GET['ssid'];

$sql = "SELECT a.mid as mid, COUNT(*) as enum, a.img as img, a.seasone as seasone, c.name as name FROM series_seasones a JOIN series_episodes b on (a.id = b.ssid) join mnames c on (a.mid = c.id) where b.ssid = ".$ssid;
$result = $db->query($sql);
$row = $result->fetch_assoc();
$mid = $row['mid'];
$enum = $row['enum'];
$img = $row['img'];
$seasone = $row['seasone'];
$name = $row['name'];
$l = "series";
include 'header_series.php';
?>
<main>

        <h1 style="color: rgb(198, 198, 198);"><?php echo $name." (seasone ".$seasone.")" ?></h1>


                
        <table>

<?php 

$i = 0;

while($i < $enum):
    $arr = array();
    array_push($arr,($enum - $i));
?>

                <tr>
                    <td>
                        <div >
                            <a href="serie_episode_content.php?e=<?php echo ($enum - $i)."&ssid=".$ssid ?>"><img src="<?php echo $img ?>" alt="<?php echo $name." ".$seasone ?>" class="moviebox"></a>
                        </div>
                    </td>
         <?php 
         $i++;
         if($i < $enum){
    array_push($arr,($enum - $i));
         ?>
                    <td>
                        <div >
                        <a href="serie_episode_content.php?e=<?php echo ($enum - $i)."&ssid=".$ssid ?>"><img src="<?php echo $img ?>" alt="<?php echo $name." ".$seasone ?>" class="moviebox"></a> 
                      </div>
                    </td>
        <?php
        $i++;
        }
        if($i < $enum){
            array_push($arr,($enum - $i));
        ?>                    
                    <td>
                        <div >
                        <a href="serie_episode_content.php?e=<?php echo ($enum - $i)."&ssid=".$ssid ?>"><img src="<?php echo $img ?>" alt="<?php echo $name." ".$seasone ?>" class="moviebox"></a>
                        </div>
                    </td>
                </tr>
        <?php
        $i++;
        }
        ?>

        <tr class="font">

        <?php
        for($j = 0; $j < count($arr);$j++){

        ?>
                    <td><?php echo "Episode ".$arr[$j]; ?></td>          
        <?php 
         }
         unset($arr);
         ?>

        </tr>
         <?php
         endwhile;
         ?>
            </table>
           



</main>
        <!-- <nav class="nav3">
            <a href="index.html">&lt;</a>
         </nav> -->

</div>

<?php 
include 'footer.php';
?>