<?php
	session_start();
    $nameErr = $emailErr = $genderErr = $linksErr = $contactErr=$uploadErr=$pwdErr=NULL;
    $name = $email = $gender = $links=$contact=$dob=$address=$about=$qualification=$image=$password="";
    $skills=$interests=[];

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	
    	
        $_SESSION["name"] = $name = test_input($_POST["name"]);
        $_SESSION["dob"] = $dob = test_input($_POST["dob"]);
        $_SESSION["gender"] = $gender = test_input($_POST["gender"]);
        $_SESSION["email"] = $email = test_input($_POST["email"]);
        $_SESSION["contact"] = $contact = test_input($_POST["contact"]);
        $skills = $_POST["skills"];
        $_SESSION["address"] = $address = test_input($_POST["address"]);
        $image = test_input($_POST["image"]);
        $_SESSION["about"] = $about = test_input($_POST["about"]);
        $_SESSION["qualification"] = $qualification = test_input($_POST["qualification"]);
        $interest = $_POST["interests"];
        $_SESSION["password"]=$password=test_input($_POST["password"]);
        $_SESSION["links"] = $links = test_input($_POST["links"]);
        
        if (empty($name)) {
            $nameErr = "Name is required";
        }
        if (empty($email)) {
         $emailErr = "Email is required";
        }
        else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            }
        }
        if (empty($gender)) {
            $genderErr = "Gender is required";
        }
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/",$links)) {
            $linksErr = "Invalid URL"; 
        }
        if(empty($password)){
            $pwdErr="Password cannot be empty";
        }
        if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/', $password)){
            $pwdErr="password is not strong";
        }
        if(!preg_match('/^[0-9]{10}$/', $contact)){
            $contactErr="Invalid Format";
        }
        if(!empty($_FILES["image"]["name"]))
        {
            if($_FILES["image"]["error"] == 0)
            {
                $allowed_types = array("image/jpeg", "image/jpg", "image/png", "image/gif");
                if((in_array($_FILES["image"]["type"], $allowed_types)))
                {
                    if($_FILES["image"]["size"] < 990000)
                    {
                        $uploaded = copy($_FILES["image"]["tmp_name"],"upload/" .$_FILES["image"]["name"]);
                        if(!$uploaded)
                        {
                        
                            $uploadErr="File could not be uploaded";
                        }   
                    }
                    else
                    {
                        $uploadErr="File should be less than 10KB " . $_FILES["image"]["size"];
                    }
                }   
                else
                {
                    $uploadErr="Please upload JPG or PNG files";
                }
            }
            else
            {
                $uploadErr="There are some errors with the file";
            }
        }
        else
        {
            $uploadErr="Please browse a file to upload";
        }
        
	    if (!$nameERR && !$genderErr && !$emailErr && !$linksErr && !$uploadErr && !$contactErr && !$pwdErr) {

	            $_SESSION["interests"] = implode(", ", $interests);
	            $_SESSION["skills"] = implode(", ", $skills);
	            $_SESSION["image"] = "upload/" . basename($_FILES["image"]["name"]);
                $conn =mysqli_connect('localhost', 'nikitab', 'mindfire', 'Register');
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $image="upload/" . basename($_FILES["image"]["name"]);
                $skills= implode(", ", $skills);
                $interests = implode(", ", $interests);
                $sql = "INSERT INTO Details (image,name,email, password,dob,contact,address,about,gender,skill,qualification,interest,link) VALUES ('$image','$name', '$email', '$password', '$dob' ,'$contact','$address','$about','$gender','$skills','$qualification','interests','links')";
                
                if (mysqli_query($conn, $sql)) {

                    echo "New record created successfully";
                } 
                else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                mysqli_close($conn);
	    }
	}

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
?>