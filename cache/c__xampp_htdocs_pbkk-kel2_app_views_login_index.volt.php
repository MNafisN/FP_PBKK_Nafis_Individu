
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
				<?= $this->flashSession->output() ?>
				<?= $this->tag->form(['login/check', 'method' => 'post']) ?>
					<label for="username">Username:</label>
					<?= $this->tag->textField(['username']) ?>

					<label for="pass">Password:</label>
					<?= $this->tag->passwordField(['pass']) ?>

					<?= $this->tag->submitButton(['Login']) ?>
					<br>
				<?= $this->tag->endForm() ?>
			</div>
		</div>
	</div>
