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
                <a href="{{ url('/makanan') }}"><button class="active">Konsumsi</button></a>
                <a href="{{ url('/vendor') }}"><button>Vendor</button></a>
                <div style="bottom: 0px; width: inherit; position: absolute">
                    <form action="{{ url('/index/logout') }}" method="post">
                        <button>Logout</button>
                    </form>
                </div>
            </div>

            <div class="tabcontent">
                <div class="container">
                    <div class="card">
                        <h2 class="card-header">Form Data Konsumsi</h2>
                        <div class="content-midcontainer" style="width: 50%!important">
                        <div class="form-login">
                            {{ flashSession.output() }}
                            {{ form('makanan/save', 'name': 'makanan', 'method': 'post') }}
                            
                                <label for="nama_makanan">Nama Makanan:</label>
                                {{ text_field('nama_makanan', 'placeholder': 'Masukkan nama makanan', 'required') }}

                                <label for="id_vendor">Nama Vendor:</label>
                                {{ select('id_vendor', vendor, 'using': ['id_vendor', 'nama_vendor'], 'class': 'form-control col-sm-4', 'style': 'width: 100%; margin: 8px 0px') }}

                                <label for="deskripsi_makanan">Deskripsi:</label>
                                {{ text_field('deskripsi_makanan', 'placeholder': 'Masukkan deskripsi_makanan') }}

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