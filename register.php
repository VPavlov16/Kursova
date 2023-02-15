<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
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
        form,p,nav{
            text-align: center;
        }
        .button{
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
        div{
            
           margin-bottom: 1px;
           margin-left:0px;
           margin-right:75px;
        }
       .gender_paragraph{
        margin:3px
       }
       .gender{
        margin-left:0px;
        margin-right:110px;
       }
       
    </style>
</head>
<body>

<nav>
    <a href="Main Menu.php">Начало</a>
    </nav>
     <form method = "post" action = "register.php">

        <h2>Register</h2>
        <?php
	$servername = "localhost";
	$username = "root";
	$password = "123456789";
	$database = "php";

	try {
	  $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}

    if ( isset( $_POST['submit'] ) ) {
	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
    $gender = $_POST['gender'];
    $password = hash('ripemd160',$_POST['password']);
		

		$sql = "INSERT INTO php.registers(Name,Email,Address,Gender,Password) VALUES (?,?,?,?,?)";
		$connection->prepare($sql)->execute([$name, $email, $address, $gender,$password]);
	}
  ?>
  <?php if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {?>
    <meta http-equiv="refresh" content="0; URL=thanks.php" />
    
    <?php }?>
     
     <div class="username">
        <label>User Name</label>

        <input type="text" name="name" placeholder="User Name" required><br>
        </div>
        <div class="email">
        <label>Email</label>

        <input  type="text" name="email" placeholder="E-mail" required><br>
        </div>
        
        <div class="address">
            <label>Address</label>

        <input type="text" name="address" placeholder="Address" required><br>
        </div>
        <div class="password">
        <label>Password</label>

        <input  type="password"  name="password" placeholder="Password" id="pass" required><br>
        Show Password<input type="checkbox" onclick="myFunction()">
        </div>
        <p class="gender_paragraph">Gender:</p>
        <div class="gender">
              <label for="male">Male</label>
             <input class="radio" type="radio" id="male" name="gender" value="Male" required>
             <br>
           

             <label class="fem" for="female">Female</label>
             <input class="radio" type="radio" id="female" name="gender" value="Female">
             <br>
             
        </div>
        <button name="submit" class="button" type="submit" value="Register" >Register</button>
        
        
        
        <br>
        <br>
        
        
        

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