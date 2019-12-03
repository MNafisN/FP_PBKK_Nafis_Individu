
	<meta charset="utf-8">
	<title>SIRUPAT</title>
    <?= $this->assets->outputCss() ?>


	<div class="header">
		<div class="header-container">
			SIRUPAT
		</div>
    </div>
	<div class="content">
		<div class="content-midcontainer">
			<div class="form-login">
				<p style="text-align: center;"><b>Sistem Informasi Peminjaman Ruang Rapat</b></p>
				
				<?= $this->tag->form(['login/check', 'method' => 'post']) ?>
				<!-- <form name="login" method="post" action="login_authentication.php"> -->
					<label for="username">Username:</label>
					<?= $this->tag->textField(['username']) ?>
					<!-- <input type="text" id="username" name="username" required> -->
					<label for="password">Password:</label>
					<?= $this->tag->passwordField(['password']) ?>
					<!-- <input type="password" id="password" name="password" required> -->
					<?= $this->tag->submitButton(['Login']) ?>
					<!-- <input type="submit" value="Login"> -->
					<br>
				<!-- </form> -->
			</div>
		</div>
	</div>
