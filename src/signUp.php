<?php 
ob_start();
$l="more";
include'header.php';	
include'db.php';
$usernameTaken = false;
$username = '';
if(isset($_POST['submit'])){
	$user = $_POST['username'];
	$email = $_POST['email'];
	$psw1 = $_POST['psw1'];
	$fname = $_POST['first'];
	$lname = $_POST['last'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];

	$sql = "SELECT * from useri where username = '$user'";
	$result = $db->query($sql);
	$n = $result->num_rows;
	if($n == 0){
		$ch = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$salt = " ";
		for($i = 0; $i < 32; $i++){
			$salt = $salt.$ch[rand(0, strlen($ch)-1)];
		}
		$salted_hash = md5($psw1.$salt);
		$sql = "INSERT INTO useri(name,surname,gender,phone,username,email,salted,salted_hash)VALUES('$fname','$lname','$gender','$phone','$user','$email','$salt','$salted_hash')";

		$db->query($sql);
		$_SESSION['user'] = $user;
		header('Location: PHPIndex.php?n=0&m=9&pnum=2');
	}else{
		$usernameTaken = true;
		$username = $user;
		$emaili = $email;
		$psw = $psw1;
		$fnm = $fname;
		$lnm = $lname;
		$gen = $gender;
		$num = $phone;
	}
}
?>

<main>
            <br>
            <div class="signup">
                <div class="header">
                    <h2>Create Account</h2>
                </div> 

				<?php
				if($usernameTaken == true){
				?>
				<div class="taken-div">
				<p class="taken">Username <u><?= $username ?></u> is already taken</p>
				</div>
				<?php
				}
				?>

                <form id="form" class="form" action="signUp.php" method="POST">
					<?php 			
					if($usernameTaken){
					?>
					<div class="duo">
					<div class="form-control-up form-left">
                        <label for="First Name">First Name</label>
                        <input type="text" placeholder="First Name" id="first" name="first" value="<?= $fnm ?>"/>
                        <small>Error message</small>
                    </div>
					<div class="form-control-up form-right">
                        <label for="Last Name">Last Name</label>
                        <input type="text" placeholder="Last Name" id="last" name="last" value="<?= $lnm ?>"/>
                        <small>Error message</small>
                    </div>
					</div>

					<?php 

					if($gen == 'm'){

						?>

						<div class="container-radio-buttons" id="container">
						<p>Gender: </p>
						<input type="radio" name="gender" value="m" id="male" checked="checked">
						<label for="male" class="label first" id="label1">Male</label>
						<input type="radio" name="gender" value="f" id="female">
						<label for="female" class="label second" id="label2">Female</label>
						<input type="radio" name="gender" value="o" id="other">
						<label for="other" class="label third" id="label3">Other</label>
						<div class="form-control-up form-right number">
                        <label for="Phone Number">Phone Number</label>
                        <input type="tel" placeholder="xxx-xxx-xxx" id="phone" name="phone" value="<?= $num ?>"/>
                        <small>Error message</small>
                  		</div>
						<br><br>
						<small id="smallid" class=""></small>
						</div>

						<?php

					}elseif($gen == 'f'){
						?>

						<div class="container-radio-buttons" id="container">
						<p>Gender: </p>
						<input type="radio" name="gender" value="m" id="male">
						<label for="male" class="label first" id="label1">Male</label>
						<input type="radio" name="gender" value="f" id="female" checked="checked">
						<label for="female" class="label second" id="label2">Female</label>
						<input type="radio" name="gender" value="o" id="other">
						<label for="other" class="label third" id="label3">Other</label>
						<div class="form-control-up form-right number">
                        <label for="Phone Number">Phone Number</label>
                        <input type="tel" placeholder="xxx-xxx-xxx" id="phone" name="phone" value="<?= $num ?>"/>
                        <small>Error message</small>
                  		</div>
						<br><br>
						<small id="smallid" class=""></small>
						</div>

						<?php
					}elseif($gen == 'o'){
						?>

						<div class="container-radio-buttons" id="container">
						<p>Gender: </p>
						<input type="radio" name="gender" value="m" id="male">
						<label for="male" class="label first" id="label1">Male</label>
						<input type="radio" name="gender" value="f" id="female">
						<label for="female" class="label second" id="label2">Female</label>
						<input type="radio" name="gender" value="o" id="other" checked="checked">
						<label for="other" class="label third" id="label3">Other</label>
						<div class="form-control-up form-right number">
                        <label for="Phone Number">Phone Number</label>
                        <input type="tel" placeholder="xxx-xxx-xxx" id="phone" name="phone" value="<?= $num ?>"/>
                        <small>Error message</small>
                  		</div>
						<br><br>
						<small id="smallid" class=""></small>
						</div>

						<?php
					}

					?>

					<div class="duo">
                    <div class="form-control-up form-left">
                        <label for="username">Username</label>
                        <input type="text" placeholder="example123" id="username" name="username"/>
                        <small>Error message</small>
                    </div>
                    <div class="form-control-up form-right">
                        <label for="Email">Email</label>
                        <input type="text" placeholder="example@example.com" id="email" name="email" value="<?= $emaili ?>"/>
                        <small>Error message</small>
                    </div>
					</div>
					<div class="duo">
                    <div class="form-control-up form-left">
                        <label for="Password">Password</label>
                        <input type="password" placeholder="Password" id="password" name="psw1" value="<?= $psw ?>"/>
                        <small>Error message</small>
                    </div>
                    <div class="form-control-up form-right">
                        <label for="Password check">Password check</label>
                        <input type="password" placeholder="Password check" id="password2" value="<?= $psw ?>"/>
                        <small>Error message</small>
                    </div>
					</div>
					<?php }else{
						?>
					<div class="duo">
					<div class="form-control-up form-left">
                        <label for="First Name">First Name</label>
                        <input type="text" placeholder="First Name" id="first" name="first" />
                        <small>Error message</small>
                    </div>
					<div class="form-control-up form-right">
                        <label for="Last Name">Last Name</label>
                        <input type="text" placeholder="Last Name" id="last" name="last"/>
                        <small>Error message</small>
                    </div>
				</div>
				<div class="container-radio-buttons" id="container">
						<p>Gender: </p>
						<input type="radio" name="gender" value="m" id="male">
						<label for="male" class="label first" id="label1">Male</label>
						<input type="radio" name="gender" value="f" id="female">
						<label for="female" class="label second" id="label2">Female</label>
						<input type="radio" name="gender" value="o" id="other">
						<label for="other" class="label third" id="label3">Other</label>
						
						<div class="form-control-up form-right number">
                        <label for="Phone Number">Phone Number</label>
                        <input type="tel" placeholder="xxx-xxx-xxx" id="phone" name="phone"/>
                        <small>Error message</small>
                  		</div>

						<br><br>
						<small id="smallid" class=""></small>
						</div>
					<div class="duo">
                    <div class="form-control-up form-left">
                        <label for="username">Username</label>
                        <input type="text" placeholder="example123" id="username" name="username"/>
                        <small>Error message</small>
                    </div>
                    <div class="form-control-up form-right">
                        <label for="Email">Email</label>
                        <input type="text" placeholder="example@example.com" id="email" name="email"/>
                        <small>Error message</small>
                    </div>
					</div>
					<div class="duo">
                    <div class="form-control-up form-left">
                        <label for="Password">Password</label>
                        <input type="password" placeholder="Password" id="password" name="psw1"/>
                        <small>Error message</small>
                    </div>
                    <div class="form-control-up form-right">
                        <label for="Password check">Password check</label>
                        <input type="password" placeholder="Password check" id="password2"/>
                        <small>Error message</small>
                    </div>
					</div>
					<?php
					}
					?>
                    <p >Already have an account.
						<a href="signIn.php">Sign In</a></p>
                    <input class="submit up" type="submit" value="Sign Up" name="submit">
                </form>
            </div>
        </main>


<?php
include 'footer.php';
?>
<script>

const form = document.getElementById('form');
const first = document.getElementById('first');
const last = document.getElementById('last');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const phone = document.getElementById('phone');

// radio button

const male = document.getElementById('male');
const female = document.getElementById('female');
const other = document.getElementById('other');

const l1 = document.getElementById('label1');
const l2 = document.getElementById('label2');
const l3 = document.getElementById('label3');

form.addEventListener('submit', e => {
	if(checkInputs() == false){
		e.preventDefault();
	}
	
});

function checkInputs() {
	// trim to remove the whitespaces
	const firstValue = first.value.trim();
	const lastValue = last.value.trim();
	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();
	const phoneValue = phone.value.trim();

	var b = Boolean(true);

	if(male.checked || female.checked || other.checked){
		setSuccessForGender();
	}else{
		setErrorForGender();
		b = Boolean(false);
	}

	if(phoneValue === ''){
		setErrorForNum(phone);
		b = Boolean(false);
	}else{
		setSuccessForNum(phone);
	}

	if(firstValue === '') {
		setErrorFor(first, 'First Name cannot be blank', "left");
		b = Boolean(false);
	}else{
		setSuccessFor(first, "left");
	}

	if(lastValue === '') {
		setErrorFor(last, 'First Name cannot be blank', "right");
		b = Boolean(false);
	}else{
		setSuccessFor(last, "right");
	}

	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank', "left");
		b = Boolean(false);
	}else{
		setSuccessFor(username, "left");
	}
	
	if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank', "right");
		b = Boolean(false);
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email', "right");
		b = Boolean(false);
	} else {
		setSuccessFor(email, "right");
	}
	
	if(passwordValue === '') {
		setErrorFor(password, 'Password cannot be blank', "left");
		b = Boolean(false);
	}else if(passwordValue.length < 8) {
		setErrorFor(password, 'Password must be longer than or equal to 8 digits', "left");
		b = Boolean(false);
	} else {
		setSuccessFor(password, "left");
	}
	
	if(password2Value === '') {
		setErrorFor(password2, 'Password2 cannot be blank', "right");
		b = Boolean(false);
	} else if(passwordValue !== password2Value) {
		setErrorFor(password2, 'Passwords does not match', "right");
		b = Boolean(false);
	} else{
		setSuccessFor(password2, "right");
	}
	return b;
}

function setErrorFor(input, message, side) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	if(side == "right"){
		formControl.className = 'form-control-up form-right error';
	}else{
		formControl.className = 'form-control-up form-left error';
	}
	small.innerText = message;
}

function setSuccessFor(input, side) {
	const formControl = input.parentElement;
	if(side == "right"){
		formControl.className = 'form-control-up form-right success';
	}else{
		formControl.className = 'form-control-up form-left success';
	}
}
	
function setErrorForNum(input){
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control-up form-right number error';
	small.innerText = "Phone Number cannot be blank!";
}

function setSuccessForNum(input){
	const formControl = input.parentElement;
	formControl.className = 'form-control-up form-right number success';
}

function setErrorForGender(){
	l1.className = "label-error first";
	l2.className = "label-error second";
	l3.className = "label-error third";
	smallid = document.getElementById('smallid');
	smallid.className = "smallerror";
	smallid.innerText = "Gender cannot be unchecked!";
}

function setSuccessForGender(){
	l1.className = "label-success first";
	l2.className = "label-success second";
	l3.className = "label-success third";
	smallid = document.getElementById('smallid');
	smallid.className = "";
	smallid.innerText = "";
}

function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
    </script>