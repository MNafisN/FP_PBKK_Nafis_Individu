{% block head %}
	<meta charset="utf-8">
	<title>SIRUPAT</title>
    {{ assets.outputCss() }}
{% endblock %}
{% block body %}
	<div class="header">
		<div class="header-container">
			SIRUPAT
		</div>
    </div>
	<div class="content">
		<div class="content-midcontainer">
			<div class="form-login">
				<p style="text-align: center;"><b>Sistem Informasi Peminjaman Ruang Rapat</b></p>
				
				{{ form('login/check', 'method': 'post') }}
				<!-- <form name="login" method="post" action="login_authentication.php"> -->
					<label for="username">Username:</label>
					{{ text_field('username') }}
					<!-- <input type="text" id="username" name="username" required> -->
					<label for="pass">Password:</label>
					{{ password_field('pass') }}
					<!-- <input type="password" id="password" name="password" required> -->
					{{ submit_button('Login') }}
					<!-- <input type="submit" value="Login"> -->
					<br>
				<!-- </form> -->
			</div>
		</div>
	</div>
{% endblock %}