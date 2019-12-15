{% block head %}
	<meta charset="utf-8">
    <title>SIRUPAT</title>  
    {{ assets.outputCss() }}  
{% endblock %}
{% block body %}
    {% if session.has('login') %}
	<div class="header">
		<div class="header-container">
			SIRUPAT
		</div>
    </div>
	<div class="content">
        <div class="main-container">
            <div class="tab">
                <div style="text-align: center; padding: 10px 0px">
                    Selamat datang, {{ session.get('login')['username'] }}
                </div>
                <a href="{{ url('/index') }}"><button>Reservasi</button></a>
                <a href="{{ url('/ruangan') }}"><button>Ruang Rapat</button></a>
                <a href="{{ url('/fasilitas') }}"><button>Fasilitas</button></a>
                <a href="{{ url('/makanan') }}"><button>Konsumsi</button></a>
                <a href="{{ url('/vendor') }}"><button class="active">Vendor</button class="active"></a>
                <div style="bottom: 0px; width: inherit; position: absolute">
                    <form action="{{ url('/index/logout') }}" method="post">
                        <button>Logout</button>
                    </form>
                </div>
            </div>

            <div class="tabcontent">
                <div class="container">
                    <div class="card">
                        <h2 class="card-header">Form Data Vendor</h2>
                        <div class="content-midcontainer" style="width: 50%!important">
                        <div class="form-login">
                            {{ flashSession.output() }}
                            {{ form('vendor/save', 'name': 'vendor', 'method': 'post') }}
                            
                                <label for="nama_vendor">Nama Vendor:</label>
                                {{ text_field('nama_vendor', 'placeholder': 'Masukkan nama vendor', 'required') }}

                                <label for="email_vendor">Email Vendor:</label>
                                {{ text_field('email_vendor', 'placeholder': 'Masukkan email vendor') }}

                                <label for="alamat_vendor">Alamat Vendor:</label>
                                {{ text_field('alamat_vendor', 'placeholder': 'Masukkan alamat vendor') }}

                                <label for="no_telp">Nomor Telepon Vendor:</label>
                                {{ text_field('no_telp', 'placeholder': 'Masukkan nomor telepon vendor') }}

                                {{ submit_button('Confirm') }}

                            {{ end_form() }}
                        </div></div>
                    </div>
                </div>
            </div>
		</div>
    </div>
    {% endif %}
{% endblock %}