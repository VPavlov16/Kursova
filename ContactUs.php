<!DOCTYPE html>
<html>
<head>
    <title>Contact us</title>
</head>
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
        div {
            
           margin-bottom: 1px;
           margin-left:0px;
           margin-right:75px;
      }
        
    </style>
<body>

<form method = "post" action = "ContactUs.php">
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
		$subject = $_POST['subject'];
        $comment = $_POST['content'];
    
		

		$sql = "INSERT INTO php.contactus(Name,Email,Subject,Comment) VALUES (?,?,?,?)";
		$connection->prepare($sql)->execute([$name, $email, $subject, $comment]);
	}
    ?>
    

    <nav>
    <a href="Main Menu.php">Начало</a>
    </nav>
        <h2>Contact us</h2>
        <div>
        <label>Name</label>

        <input type="text" name="name" placeholder="Name"><br>
        </div>
        <div>
        <label>Email</label>

        <input type="text" name="email" placeholder="Email"><br>
        </div>
        <div>
        <label>Subject</label>

        <input type="text" name="subject" placeholder="Subject"><br> 
        </div>
        <div>
        <label>Message</label>
        <textarea name="content" id="content" class="input-field" placeholder="Message" cols="60" rows="6"></textarea>
        <br>
        </div>
        <button name="submit" class="button" type="submit" value="Send" >Send</button>
        

     </form>
</body>
</html>