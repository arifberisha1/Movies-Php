<?php

session_start();
include'db.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Movies</title>
    <link rel="stylesheet" href="style_movies.css">
    <script src="javascript.js"></script>
</head>

<body class="body" style="    background-image: url(<?php echo$rowprim['background'] ?>);">

    <div class="container ">
        
        <header >
            <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
              
              <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
                <a href="index.html"><img src="images/facebook_profile_image.png" draggable="true" ondragstart="drag(event)" id="drag1" width="100px" height="125px" style="margin-left: 5px; margin-top: 10px;"></a>
            </div>
              
              <div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

        </header>
        <br><br>
        <nav class="nav1">
            <div id="ul-block">
                <ul id="menu">
                    <li <?php if($l == "home"){echo "class='a_special'";}else{} ?>> <a href="index.php">Home</a></li>
                    <li <?php if($l == "zhanret"){echo "class='a_special'";}else{} ?>>
                        <div class="dropdown">
                            <button class="dropbtn">Category</button>
                            <div class="dropdown-content">
                                <table>
                                
    <?php 
    
    $sql = "SELECT * FROM zhanret";
    $result = $db->query($sql);
    $num = $result->num_rows;
    $i = 0;
    while($i < $num):
    ?>

            <tr>
<?php $row = $result->fetch_assoc(); ?>
                <td> <a href="zhanret.php?zh=<?php echo$row['name'] ?>"><?php echo $row['name'] ?></a></td>
                
                <?php $i++;
                if($i < $num){ 
                    $row = $result->fetch_assoc();
                    $i++;
                    ?>
               <td> <a href="zhanret.php?zh=<?php echo$row['name'] ?>"><?php echo $row['name'] ?></a></td>
                <?php } 
                if($i < $num){ 
                    $row = $result->fetch_assoc();
                    $i++;
                    ?>
                <td> <a href="zhanret.php?zh=<?php echo$row['name'] ?>"><?php echo $row['name'] ?></a></td>
                <?php }
                if($i < $num){ 
                    $row = $result->fetch_assoc();
                    $i++;
                    ?>
               <td> <a href="zhanret.php?zh=<?php echo$row['name'] ?>"><?php echo $row['name'] ?></a></td>
                <?php } ?>
            </tr>

    <?php endwhile;?>


                                </table>
                            </div>
                        </div>
                    </li>
                    <li <?php if($l == "movie"){echo "class='a_special'";}else{} ?>> <a href="movies.php">Movies</a></li>
                    <li <?php if($l == "series"){echo "class='a_special'";}else{}?>> <a href="series.php">TV Shows</a></li>
                    <li <?php if($l == "news"){echo "class='a_special'";}else{}?>> <a href="news.html">News</a></li>
                    <li <?php if($l == "faq"){echo "class='a_special'";}else{}?>> <a href="Faq.php">Faq</a></li>
                    <li>
                        <div class="dropdown">
                        <button class="dropbtn"><img src="images/profile.png" alt="more" style="height: 40px; width: 40px; margin-top: 5px;" class="more"></button>
                            <div class="dropdown-content">
                            <table>
                                    <?php 
                                    if(!isset($_SESSION['user'])){
                                    ?>
                                    <tr>
                                        <td> <a href="signIn.php">Sign<b style="opacity: 0;">_</b>In</a></td>
                                    </tr>
                                    <tr>
                                        <td> <a href="signUp.php">Sign<b style="opacity: 0;">_</b>Up</a></td>
                                    </tr>
                                    <?php } 
                                            if(isset($_SESSION['user'])){
                                    ?>
                                    <tr>
                                            <td> <a href="profile.php">Profile</a></td>
                                        </tr>
                                    <tr>
                                            <td> <a href="logout.php">Log out</a></td>
                                        </tr>
                                    <?php } ?>
                                    </table>
                                </div>
                            </div>
                    </li>
                </ul>
            </div>
        
        
        
        <div class="searchbox">     
            <div class="search">
                <div class="icon"></div>
                <div class="input">
                    <form action="search.php" method="POST">
                    <input type="text" placeholder="Search" id="mysearch" name="search" style="margin-left: -170px;">
                    <input type="submit" value="Search" style="margin-left: 120px; margin-top:10px;  background-color: transparent; height: auto; width: auto; font-size: 19px; border-radius: 5px; border: none; color: rgba(198, 198, 198, 0.7); cursor: pointer;">
                </form>
                </div>
            </div>
        </div>
        </nav>

        <div id="progressbar"></div>
        <div id="scrollPath"></div>

    <?php

        if(!isset($_SESSION['user'])){
        ?>
        
                    <div class="wrapper right">
                        <div class="centered">
                        <?php $nr = rand(0,11); ?>
                    <img src="add-img\<?= $nr ?>.jpg" alt="add" class="side-add"><br>
                    <?php $nr = rand(0,11); ?>
                    <img src="add-img\<?= $nr ?>.jpg" alt="add" class="side-add"><br>
                    <?php $nr = rand(0,11); ?>
                    <img src="add-img\<?= $nr ?>.jpg" alt="add" class="side-add">
                        </div>
                    </div>
        
                    <div class="wrapper left">
                        <div class="centered">
                        <?php $nr = rand(0,11); ?>
                    <img src="add-img\<?= $nr ?>.jpg" alt="add" class="side-add"><br>
                    <?php $nr = rand(0,11); ?>
                    <img src="add-img\<?= $nr ?>.jpg" alt="add" class="side-add"><br>
                    <?php $nr = rand(0,11); ?>
                    <img src="add-img\<?= $nr ?>.jpg" alt="add" class="side-add">
                        </div>
                    </div>
        <?php } ?>
    </div>

<div class="container">
