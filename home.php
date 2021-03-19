<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<style type="text/css">
body {
	color: #fff;
	background: #d47677;
}
.form-control {
	min-height: 41px;
	background: #fff;
	
	border-color: #e3e3e3;
}
.login-form {
	width: 350px;
	margin: 0 auto;
	padding: 100px 0 30px;		
}
.login-form form {
	color: #7a7a7a;
	border-radius: 2px;
	margin-bottom: 15px;
	font-size: 13px;
	background: #ececec;
	padding: 30px;	
	position: relative;	
}
.h2 {
	font-size: 22px;
	margin: 35px 0 25px;
}
.avatar {
	position: absolute;
	margin: 0 auto;
	left: 0;
	right: 0;
	top: -50px;
	width: 95px;
	height: 95px;
	border-radius: 50%;
	z-index: 9;
	background: #70c5c0;
	padding: 15px;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
	

.btn{        
	font-size: 16px;
	font-weight: bold;
	background: #70c5c0;
	border: none;
	margin-bottom: 20px;
	border-radius: 2px;
	width: 100%;
}
.box{
	float: right;
}

</style>
</head>

<body>
	<div class="container-fluid">
	<div class="login-form">
    <form action="" method="post">
		<div >
			<img src="avatar.jpeg" alt="Avatar" class="avatar">
		</div>
        <h2 class="text-center h2">Member Login</h2>   
        <div class="form-group">
        	<input type="text" class="form-control mt-2" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control mt-2 " name="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block mt-2">Sign in</button>
        </div>
		<div>
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="box">Forgot Password?</a>
        </div>
    </form>
    <p class="text-center small">Don't have an account? <a href="form.php"><u>Sign up here!</a></u></p>
</div>
</div>
</body>
</html>