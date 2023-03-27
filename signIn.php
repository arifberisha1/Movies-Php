<?php 
ob_start();
$l="more";
include'header.php';
include'db.php';

$error = false;
$pswerr = false;

if(isset($_POST['submit'])){
$user = $_POST['username'];
$psw1 = $_POST['psw1'];

$sql = "SELECT username, salted, salted_hash FROM useri where username = '$user'";
$result = $db->query($sql);

if($result->num_rows > 0){

$row = $result->fetch_assoc();
$salted = $row['salted'];
$salted_hash = $row['salted_hash'];

if($salted_hash == md5($psw1.$salted)){
	$_SESSION['user'] = $user;
    $url = 'http://localhost/InternetPHP/PHPIndex.php?n=0&m=9&pnum=2';
	header("Location: $url");
}else{
    $error = true;
	$pswerr = true;
    $msg = "Incorrect password!";
	$useri = $user;
}
}else{
    $error = true;
    $msg = "User <u>$user</u> doesn't exist!";
}
}


?>

<main>
            <br>
            <div class="signin">
                <div class="header">
                    <h2>Sign In</h2>
                </div> 
                <?php
				if($error == true){
				?>
				<div class="taken-div">
				<p class="taken"><?= $msg ?></p>
				</div>
				<?php
				}
				?>
                <form id="form" class="form" action="signIn.php" method="POST"
				>
					<?php

					if($pswerr){
					?>
					 <div class="form-control">
                        <label for="username">Username</label>
                        <input type="text" placeholder="example123" id="username" name="username" value="<?= $useri ?>"/>
                        <small>Error message</small>
                    </div>
					<?php
					}else{
					?>
					 <div class="form-control">
                        <label for="username">Username</label>
                        <input type="text" placeholder="example123" id="username" name="username" autofocus/>
                        <small>Error message</small>
                    </div>					
					<?php
					}
					?>
                    <div class="form-control">
                        <label for="username">Password</label>
                        <input type="password" placeholder="Password" id="password" name="psw1" <?php if($pswerr){echo"autofocus";}?>/>
                        <small>Error message</small>
                    </div>
                    <p >Don't have an account.
                        <a href="signUp.php">Sign Up</a></p>
                    <input class="submit" type="submit" value="Sign In" name="submit">
                </form>
            </div>
        </main>

<?php 	
include 'footer.php';
?>
<script>
const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('password');

form.addEventListener('submit', e => {
	if(checkInputs() == false){
		e.preventDefault();
	}
	
});

function checkInputs() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
	const passwordValue = password.value.trim();
	
	var b = Boolean(true);

	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
		b = Boolean(false);
	} else {
		setSuccessFor(username);
	}

	if(passwordValue === '') {
		setErrorFor(password, 'Password cannot be blank');
		b = Boolean(false);
	}else {
		setSuccessFor(password);
	}
	
	return b;
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
    </script>