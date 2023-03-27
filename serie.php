<?php 
$mid = $_GET['id'];
include 'db.php';
$l = "series";
include 'header_series.php';


$sql = "UPDATE mnames set nr = nr + 1 where id = $mid";

$db->query($sql);


$sql = "SELECT id, seasone, img FROM series_seasones where mid = ".$mid." order by seasone DESC";
$sql2 = "SELECT name from mnames where id = ".$mid;
$result = $db->query($sql2);
$row2 = $result->fetch_assoc();

?>


<main>
            <h1 style="color: rgb(198, 198, 198);"><?php echo $row2['name'] ?></h1>
            
            <table>

<?php 

$result = $db->query($sql);

$num = $result->num_rows;
$i = 0;

while($i < $num):
    $row = $result->fetch_assoc();
    $i++;
    $arr = array();
    array_push($arr,$row['seasone']);
?>

                <tr>
                    <td>
                        <div >
                            <a href="serie_episode.php?ssid=<?php echo$row['id'] ?>"><img src="<?php echo $row['img'] ?>" alt="<?php echo $row2['name']." ".$row['seasone'] ?>" class="moviebox"></a>
                        </div>
                    </td>
         <?php 
         if($i < $num){
            $row = $result->fetch_assoc();
            $i++;
    array_push($arr,$row['seasone']);
         ?>
                    <td>
                        <div >
                        <a href="serie_episode.php?ssid=<?php echo$row['id'] ?>"><img src="<?php echo $row['img'] ?>" alt="<?php echo $row2['name']." ".$row['seasone'] ?>" class="moviebox"></a>
                        </div>
                    </td>
        <?php
        }
        if($i < $num){
            $row = $result->fetch_assoc();
            $i++;
            array_push($arr,$row['seasone']);
        ?>                    
                    <td>
                        <div >
                        <a href="serie_episode.php?ssid=<?php echo$row['id'] ?>"><img src="<?php echo $row['img'] ?>" alt="<?php echo $row2['name']." ".$row['seasone'] ?>" class="moviebox"></a>
                        </div>
                    </td>
                </tr>
        <?php
        }
        ?>

        <tr class="font">

        <?php
        for($j = 0; $j < count($arr);$j++){

        ?>
                    <td><?php echo "Seasone ".$arr[$j]; ?></td>          
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

<?php

$sql = "SELECT b.* from movie_actors a join actors b on (a.aid = b.id) where a.mid = $mid order by b.name ASC";
$result = $db->query($sql);
$z = $result->num_rows;

if($z > 0){

?>

    </div>

    <div class="container">

        <main>

            <h2 style="color: rgb(198, 198, 198); font-size: 40px;">Main actors</h2>
<?php
$o = 0;
while($o < $z):
    $row = $result->fetch_assoc();
    $o++;
?>
            <div class="actorbox">
                <div class="card" style=" background: linear-gradient(45deg,#000000,rgba(198, 198, 198, 0.374));">
                    <div class="content">
                        <h2><?php echo $row['name'] ?></h2>
                        <p><?php echo $row['about'] ?></p>
                        <a href="<?php echo $row['link'] ?>" target="_blank" title="Click for more info about the actor">Read more</a>
                    </div>
                    <img src="<?php echo $row['img'] ?>" alt="<?php echo $row['name'] ?>">
                </div>
            </div>

<?php endwhile; ?>

        </main>
    

<?php 
}

include 'footer.php';
?>