<?php
include 'db.php';
$ssid = $_GET['ssid'];
$episode = $_GET['e'];

$sql = "SELECT f.mid as mid, a.name as name, f.in_img as in_img, f.seasone as seasone, g.link as link, f.trailer as trailer,
 c.name as zh1, d.name as zh2, e.name as zh3, f.about as about, h.count as c FROM mnames a JOIN mzhanret b on (a.id = b.mid)
  JOIN zhanret c on (b.zh1 = c.id) JOIN zhanret d on (b.zh2 = d.id) JOIN zhanret e ON (b.zh3 = e.id) 
  join series_seasones f on (a.id = f.mid) JOIN series_episodes g on (f.id = g.ssid) join (SELECT count(*) as count 
  FROM series_episodes where ssid = $ssid) h where g.ssid = $ssid AND g.episode = $episode";

$result = $db->query($sql);
$row = $result->fetch_assoc();
$mid = $row['mid'];
$name = $row['name'];
$in_img = $row['in_img'];
$seasone = $row['seasone'];
$link = $row['link'];
$trailer = $row['trailer'];
$zh1 = $row['zh1'];
$zh2 = $row['zh2'];
$zh3 = $row['zh3'];
$about = $row['about'];
$last = $row['c'];
$l = "series";
include 'header_series.php';
?>
 <main>
            <div class="container2">
                <img class="moviebox2" src="<?php echo $in_img ?>" alt="Got">
               <div class="overlay">
                   <div class="text">
                    <a href="<?php echo $link ?>" target="_blank">Click here to watch movie</a>
                   </div>
               </div>
            </div>
            </main>
 </div>

<div class="container">
            <main>
           <table>
               <tr>
                   <td colspan="4"> <h2><?php echo $name ?></h2>
                  </td>
                   <td colspan="1"><a class="a" style="margin-left: 55px;" href="<?php echo $trailer ?>" target="_blank">Watch Trailer</a></td>
               </tr>

               <tr>
               <td colspan="4"> <h2><?php echo "Seasone ".$seasone." episode ".$episode ?></h2></td>

            <?php
                if($episode == 1 && $last != 1){
?>
                 <td colspan="2" style="text-align:right"><a style="color:rgb(198, 198, 198)" href="serie_episode_content.php?e=<?php echo($episode+1)?>&ssid=<?php echo $ssid ?>">Next Episode &#62;&#62;</a></td>
<?php
                }elseif($episode == 1 && $last == 1){

                }
                elseif($episode == $last){
?>
<td colspan="2" style="text-align:right"><a href="serie_episode_content.php?e=<?php echo($episode-1)?>&ssid=<?php echo $ssid ?>" style="margin-right: 50px; color:rgb(198, 198, 198)">&lt;&lt; Previous Episode</a></td>
<?php
                }else{
?>
<td colspan="2" style="text-align:right"><a href="serie_episode_content.php?e=<?php echo($episode-1)?>&ssid=<?php echo $ssid ?>" style="margin-right: 50px; color:rgb(198, 198, 198)">&lt;&lt; Previous Episode</a> <a style="color:rgb(198, 198, 198)" href="serie_episode_content.php?e=<?php echo($episode+1)?>&ssid=<?php echo $ssid ?>">Next Episode &#62;&#62;</a></td>
<?php
                }
            ?>
            </tr>

               <tr>
                <td style="padding-left: 70px;"><a href="zhanret.php?zh=<?php echo $zh1 ?>"><?php echo $zh1 ?></a></td>
               <td ><a href="zhanret.php?zh=<?php echo $zh2 ?>"><?php echo $zh2 ?></a></td>
               <td ><a href="zhanret.php?zh=<?php echo $zh3 ?>"><?php echo $zh3 ?></a></td>
            </tr>
           </table>
       
   
            <div class="description">
            <p style="font-size: 25px;">
                    Short description about the series seasone: <br>
            </p>
            <p><?php echo $about ?></p>        </div>
        </main>
</div>

<?php
include 'footer.php';
?>