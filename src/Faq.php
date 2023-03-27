<?php
ob_start();
$l = "faq";
include'header.php';
?>

<main>
          <br>
          <div style="margin-right: 280px; margin-top: -13%;">
    <form action="Faq.php" method="POST">
        <section>
            <div class="contact_us">
                <div class="contactInfo">
                    <div>
                        <h2>Contact Info</h2>
                        <ul class="info">
                            <li>
                                <span><img src="images/location.png" alt="location"></span>
                                <span>
                                    Kosovo, Prishtine,<br> St.Bulevardi Bill Klinton
                                </span>
                            </li>
                            <li>
                                <span><img src="images/mail.png" alt="location"></span>
                                <span style="margin-top: 10px;">
                                   online_movies@gmail.com
                                </span>
                            </li>
                            <li>
                                <span><img src="images/call.png" alt="location"></span>
                                <span style="margin-top: 10px;">
                                   049-124-865
                                </span>
                            </li>
                        </ul>
                    </div>
                    <ul class="sci">
                        <li><a href="#"><img src="images/1.png" alt="1"></a></li>
                        <li><a href="#"><img src="images/2.png" alt="2"></a></li>
                        <li><a href="#"><img src="images/3.png" alt="3"></a></li>
                        <li><a href="#"><img src="images/4.png" alt="4"></a></li>
                        <li><a href="#"><img src="images/5.png" alt="5"></a></li>
                    </ul>
                </div>
            <?php 
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
                $sql = "SELECT name, surname, email, phone FROM useri where username = '$user'";
                $result = $db->query($sql);
                $row = $result->fetch_assoc();
            ?>
                <div class="contactForm">   
                <h2>Send a Message</h2>
                    <div class="fromBox">
                        <div class="inputBox w50">
                            <input type="text" required name="name" value="<?= $row['name'] ?>">
                            <span>First Name</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" required name="surname" value="<?= $row['surname'] ?>">
                            <span>Last Name</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="email" required name="email" value="<?= $row['email'] ?>">
                            <span>Email Adress</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" required name="mnumber" value="<?= $row['phone'] ?>">
                            <span>Phone Number</span>
                        </div>
                        <div class="inputBox w100">
                        <textarea required name="msg"></textarea>   
                         <span>Write your message here...</span>
                        </div>
                        <div class="inputBox w100">
                        <input type="submit" value="Send" name="submit">
                        </div>
                    </div>
               </div>
            <?php
            }else{
            ?>
            <div class="contactForm">   
                <h2>Send a Message</h2>
                    <div class="fromBox">
                        <div class="inputBox w50">
                            <input type="text" required name="name">
                            <span>First Name</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" required name="surname">
                            <span>Last Name</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="email" required name="email">
                            <span>Email Adress</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" required name="mnumber">
                            <span>Phone Number</span>
                        </div>
                        <div class="inputBox w100">
                        <textarea required name="msg"></textarea>   
                         <span>Write your message here...</span>
                        </div>
                        <div class="inputBox w100">
                        <input type="submit" value="Send" name="submit">
                        </div>
                    </div>
               </div>
            <?php
            }
            ?>

            </div>
        </section>
    </form>
</div>
      </main>
<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['mnumber'];
    $msg = $_POST['msg'];
$sql = "INSERT INTO contact_us(name,surname,email,phone,msg) VALUES ('$name','$surname','$email','$phone','$msg')";
$db->query($sql);
}

include'footer.php';
?>