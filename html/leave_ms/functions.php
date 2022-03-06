<?php 
    require_once("DBConnection.php");
?>

<?php

   

    function login($username, $password, $conn){
            $query = mysqli_query($conn, "SELECT * FROM users WHERE name='".$username."'");
			$numrows = mysqli_num_rows($query);
			if($numrows !=0)
			{
				while($row = mysqli_fetch_assoc($query))
				{
					$dbusername=$row['name'];
					$dbpassword=$row['password'];
					$type=$row['type'];
					$id=$row['id'];
				}
				if($username == $dbusername && ($password==$dbpassword))
				{
					
					$_SESSION['sess_user']=$username;
					$_SESSION['sess_eid']=$id;
					//Redirect Browser
					if($type=="admin"){
						header("Location:admin.php");
					}
					else{
					header("Location:leaveAplicationForm.php");
					}
                    return true;
				}
			}
			else{
	 			//echo "Invalid Username or Password";
                 return false;
                 
	 		}
    }

    function signup($fullname,$name,$email,$password,$phone,$repassword,$gender,$city,$dept,$type,$conn){
        $hashedPassword = $password;

        $query = mysqli_query($conn,"INSERT INTO users(fullname, name, email, phone, password, gender, city, department, type) VALUES('$fullname','$name','$email','$phone','$hashedPassword','$gender','$city','$dept','$type')");
        $query1 = mysqli_query($conn,"SELECT id from users WHERE name='".$name."'");
        $eid = mysqli_fetch_assoc($query1);

        if($query){


            echo 'Registration successful!!';
            
            $_SESSION['sess_user'] = $name;
            $_SESSION['sess_eid'] = $eid['id'];

            header("Location:leaveAplicationForm.php");
            exit;
        }
        else{
            echo "Query Error : " . "INSERT INTO users(fullname, name, email, phone, password, gender, city, department, type) VALUES('$fullname','$name','$email','$phone','$hashedPassword','$gender','$city','$dept','$type')" . "<br>" . mysqli_error($conn);
            echo "<br>";
            echo "Query Error : " . "SELECT id from users WHERE name='".$name."'" . "<br>" . mysqli_error($conn);
        }

    }

?>