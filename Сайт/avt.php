<!DOCTYPE html>
<html lang="ru" >
<head>
  <meta charset="UTF-8">
  <title>Авторизация</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'><link rel="stylesheet" href="css/styleavt.css">

</head>
<body>

<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Авторизация</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Регистрация</label>
		<div class="login-form">
			<div class="sign-in-htm">
			<form action="#avt" method="POST">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="user" name="Email" type="Email" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Пароль</label>
					<input id="pass"  name="Pass" type="password" class="input" data-type="password" required>
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Запомнить меня</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Войти">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Забыли пароль?</a>
				</div>
				
			</form>
			
			</div>
			<div class="sign-up-htm">
			<form action="avt.php" method="POST">
			
				<div class="group">
					<label for="user" class="label">Фамилия<label>
					<input id="user" Name="Fam" type="text" class="input" required>
				</div>
				<div class="group">
					<label for="user" class="label">Имя</label>
					<input id="user" Name="Ima" type="text" class="input" required>
				</div>
				<div class="group">
					<label for="user" class="label">Отчество</label>
					<input id="user" Name="Otc" type="text" class="input" required>
				</div>
				<div class="group">
					<label for="Email" class="label">Email</label>
					<input id="Email" name="Em" type="Email" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Пароль</label>
					<input id="pass" name="Password" type="password" class="input" data-type="password" required>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Зарегистрироваться">
				</div>
			</form>	
			</div>
			
		</div>
	</div>
</div>
<!-- partial -->
  
  <?php
$host='localhost';
$database='ekzamen';
$userdb='root';
$password='';

 $link=mysqli_connect($host,$userdb,$password,$database) or die ("Ошибка" . mysqli_error($link));
	if(isset($_POST['Fam'])&& isset($_POST['Ima'])&& isset($_POST['Otc'])&& isset($_POST['Em'])&& isset($_POST['Password'])){
	$Fam=$_POST['Fam'];
	$Imya=$_POST['Ima'];
	$Otc=$_POST['Otc'];
	$Email=$_POST['Em'];
	$pass=$_POST['Password'];
	
		if($Fam && $Imya && $Otc && $Email && $pass){
		$query="insert into polzovatel(Familiya,Ima,Otchestvo,Email,Password) values('$Fam','$Imya','$Otc','$Email','$pass')";
		$result=mysqli_query($link,$query) or die ("Ошибка" . mysqli_error($link));
		}
	}
?>
  			
<div id="avt" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">
<?php 
$host='localhost';
$database='ekzamen';
$userdb='root';
$password='';

 $link=mysqli_connect($host,$userdb,$password,$database) or die ("Ошибка" . mysqli_error($link));
	if(isset($_POST['Email'])&& isset($_POST['Pass'])){
	$Email=$_POST['Email'];
	$pass=$_POST['Pass'];
	
	$check_user = mysqli_query($link, "SELECT Familiya,Ima,Otchestvo,rol.Nazvanie from polzovatel join rol on polzovatel.id_Rol = rol.id_Rol where Email='".$Email."' and Password = '".$pass."'");
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "Familiya" => $user['Familiya']
	];
	$_SESSION['user'] = [
            "Ima" => $user['Ima']
	];
	$_SESSION['user'] = [
            "Otchestvo" => $user['Otchestvo']
	];
			echo "Добро пожаловать!";

    } else {
        $_SESSION['message'] = 'Ошибка';
		
		echo  $_SESSION['message'];
    }
}
	
 ?></h3>
        <a href="avt.php" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    
 <?php 
	
$host='localhost';
$database='ekzamen';
$userdb='root';
$password='';

 $link=mysqli_connect($host,$userdb,$password,$database) or die ("Ошибка" . mysqli_error($link));
	if(isset($_POST['Email'])&& isset($_POST['Pass'])){
	$Email=$_POST['Email'];
	$pass=$_POST['Pass'];
	
	$check_user = mysqli_query($link, "SELECT Familiya from polzovatel join rol on polzovatel.id_Rol = rol.id_Rol where Email='".$Email."' and Password = '".$pass."'");
	$check_user1 = mysqli_query($link, "SELECT Ima from polzovatel join rol on polzovatel.id_Rol = rol.id_Rol where Email='".$Email."' and Password = '".$pass."'");
	$check_user2 = mysqli_query($link, "SELECT Otchestvo from polzovatel join rol on polzovatel.id_Rol = rol.id_Rol where Email='".$Email."' and Password = '".$pass."'");
	$check_user3 = mysqli_query($link, "SELECT Nazvanie from polzovatel join rol on polzovatel.id_Rol = rol.id_Rol where Email='".$Email."' and Password = '".$pass."'");
    if (mysqli_num_rows($check_user) > 0 and mysqli_num_rows($check_user1) > 0 and mysqli_num_rows($check_user2) > 0 and mysqli_num_rows($check_user3) > 0) {
        $user = mysqli_fetch_assoc($check_user);
		$user1 = mysqli_fetch_assoc($check_user1);
		$user2 = mysqli_fetch_assoc($check_user2);
		$user3 = mysqli_fetch_assoc($check_user3);

        $_SESSION['user'] = [
            "Familiya" => $user['Familiya']
	];
	
	$_SESSION['user1'] = [
            "Ima" => $user1['Ima']
	];
	
	$_SESSION['user2'] = [
            "Otchestvo" => $user2['Otchestvo']
	];
	
	$_SESSION['user3'] = [
            "Nazvanie" => $user3['Nazvanie']
	];
	
			echo "Фамилия: ".$_SESSION['user']['Familiya']."<br>";
			echo "Имя: ".$_SESSION['user1']['Ima']."<br>";
			echo "Отчество: ".$_SESSION['user2']['Otchestvo']."<br>";
			echo "Роль: ".$_SESSION['user3']['Nazvanie']."<br>";

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
		
		echo  $_SESSION['message'];
    }
}
	
 ?>
      </div>
    </div>
  </div>
</div>
  
</body>
</html>
