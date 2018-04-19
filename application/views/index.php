<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title><?=$pageTitle?></title>
	<link rel="stylesheet" href="<?=base_url('assets/styles/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/styles/css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/styles/css/app.css')?>">
	<script type="text/javascript" src="<?=base_url('assets/styles/js/jquery.min.js')?>"></script>
</head>
<body id="login">
	
	<section class="container-fluid">
		<br><br><br><br><br><br>
		<div class="row">
			<div id="loginBox" class="col-md-4 offset-4">
				<h4 class="text-center"><?=$pageHeader?></h4><br>

				<form action="<?=base_url('auth/login')?>" method="post">
					<div class="form-group">
						<input type="text" name="uname" class="form-control" placeholder="Username" maxlength="15" required autocomplete="off" autofocus>
					</div>
					<div class="form-group">
						<input type="password" name="passw" class="form-control" placeholder="Password" maxlength="15" required>
					</div>
					<input type="submit" class="btn btn-block btn-primary bg-accent" value="Masuk">
				</form>
			</div>
		</div>
	</section>

	<script type="text/javascript" src="<?=base_url('assets/styles/js/popper.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/styles/js/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/styles/js/app.js')?>"></script>
</body>
</html>