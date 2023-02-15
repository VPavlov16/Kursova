<?php
session_start();

	$servername = "localhost";
	$username = "root";
	$password = "123456789";
	$database = "php";

	try {
	  $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  //echo "Connected successfully";
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}
    if ( isset( $_POST['submit'] ) ) {

        // записване на данните от полетата в променливи за по-удобно
    
        $username = $_POST['uname'];
        $password = hash('ripemd160',$_POST['password']);
        
        // зареждане от базата на потребител с въведените от формата име и парола
        
        $stmt = $connection->prepare("SELECT * FROM registers WHERE Name = ? AND Password = ?"); 
        $stmt->execute([ $username, $password ]); 
        $user = $stmt->fetch();
        



        if ( $user ) {
        
            // ако са въведени правилни име и парола се задава масива user в сесията
            
            $_SESSION['user'] = $user;
            
            // пренасочване към страница admin.php
            
            header("location: admin.php");
            exit;
            
        } else {
          header("location:login.php?error=1");
            
           // echo "<b style='color:red;'>Невалидни потребителски данни</b><br><br>";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
        background-color: lightblue;
        }

        h2{
            text-align: center;
            text-transform: uppercase;
            color: blue;
            border-style:double;
        }
        form,nav{
            text-align: center;
        }
        .button {
            background-color: blue;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;

        }
        label{
            display: inline-block;
            width: 150px;
            text-align: right;
            margin-right:5px;
            
        }
        .pole {
            
           margin-bottom: 1px;
           margin-left:0px;
           margin-right:80px;
      }
    </style>
</head>
<body>
  <nav>
    <a href="Main Menu.php">Начало</a>
  </nav>

        <form  action = "login.php"  method = "POST">

        <h2>LOGIN</h2>

        <div class="pole">
        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name" id="username"><br>

        </div>
        <div class="pole">
        <label>Password</label>

        <input type="password" name="password" placeholder="Password" id="pass"><br> 
        Show Password<input type="checkbox" onclick="myFunction()">

        </div>
        <button class="button" type="submit" id = "sbmt" value="asd" name="submit" >Login</button>
        <br>
        <?php
        if(isset($_GET['error'])==true){
          echo "<b style='color:red;'>Невалидни потребителски данни</b><br><br>";

        }
        ?>
      

     </form>
     <script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>
</html>