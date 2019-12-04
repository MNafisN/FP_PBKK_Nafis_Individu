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
				{{ flashSession.output() }}
				{{ form('login/check', 'method': 'post') }}
					<label for="username">Username:</label>
					{{ text_field('username') }}

					<label for="pass">Password:</label>
					{{ password_field('pass') }}

					{{ submit_button('Login') }}
					<br>
				{{ end_form() }}
			</div>
		</div>
	</div>
{% endblock %}