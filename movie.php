<?php 

$id = $_GET['id'];
include 'db.php';

$sql = "UPDATE mnames set nr = nr + 1 where id = $id";

$db->query($sql);

$sql = "SELECT a.name as name, YEAR(a.mdate) as year, a.background as background, b.img as img, b.link as link, b.trailer as trailer, c.zh1 as zh1, c.zh2 as zh2, c.zh3 as zh3, b.playtime as playtime, b.rateing as rateing, b.description as description from mnames a join movie_details b on (a.id = b.mid) join (SELECT a.id as id, c.name as zh1, d.name as zh2, e.name as zh3 FROM mnames a JOIN mzhanret b on (a.id = b.mid)
JOIN zhanret c on (b.zh1 = c.id)
JOIN zhanret d on (b.zh2 = d.id)
JOIN zhanret e on (b.zh3 = e.id) where a.id = $id) c on (a.id = c.id) where a.id = $id";


$result = $db->query($sql);
$rowprim = $result->fetch_assoc();
$l = "movie";
include 'header_movie.php';

?>


<div class="container">

        <main>
            <div class="container2">
                <img class="moviebox2" src="<?php echo$rowprim['img'] ?>" alt="Aquaman">
<div class="overlay">
    <div class="text">
        <a href="<?php echo $rowprim['link'] ?>" target="_blank">Click here to watch movies</a>

    </div>
</div>
                </div>
            </main>
        </div>

<div class="container">
           <main>
           
           <table>
               <tr>
                   <td colspan="3"> <h2><?php echo$rowprim['name']." (".$rowprim['year'].")" ?></h2>
                  </td>
                   <td colspan="2"><a class="a" href="<?php echo $rowprim['trailer'] ?>" target="_blank">Watch Trailer</a></td>

                </tr>
               <tr>
                
                <td style="padding-left: 70px;"><a href="zhanret.php?zh=<?php echo$rowprim['zh1'] ?>"><?php echo$rowprim['zh1'] ?></a></td>
               <td><a href="zhanret.php?zh=<?php echo$rowprim['zh2'] ?>"><?php echo$rowprim['zh2'] ?></a></td>
               <td><a href="zhanret.php?zh=<?php echo$rowprim['zh3'] ?>"><?php echo$rowprim['zh3'] ?></a></td>
               <td class="txt" style="padding-left: 400px;">Play time: <?php echo $rowprim['playtime'] ?>min</td>
               <td class="txt">Rating: <?php echo $rowprim['rateing'] ?></td>
            </tr>
           </table>
            <div class="description">
            <p style="font-size: 25px;">
                    Short description about the movie: <br>
            </p>
            <p>
            <?php echo $rowprim['description'] ?>    
        </p>
        </div>
        
        </main>

        <?php

$sql = "SELECT b.* from movie_actors a join actors b on (a.aid = b.id) where a.mid = $id";
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