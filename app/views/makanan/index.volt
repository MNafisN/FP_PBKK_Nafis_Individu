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
                <a href="{{ url('/makanan') }}"><button class="active">Konsumsi</button class="active"></a>
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
                    {% if makanan is defined %}
                        <h3 class="card-header">Daftar Konsumsi</h3>
                        <table class="table table-bordered table-responsive-sm" id="calendar">
                            <thead>
                                <tr>
                                    <th> Nama Makanan </th>
                                    <th> Nama Vendor </th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for makan in makanan %}
                                    {% for vend in vendor %}
                                        {% if vend.id_vendor is makan.id_vendor %}
                                <tr>
                                    {{ form('makanan/detail', 'method': 'post') }}
                                    <td>
                                        {{ hidden_field('id_makanan', 'value': makan.id_makanan) }}
                                        {{ submit_button(makan.nama_makanan, 'style': 'all: unset; cursor: pointer') }}
                                    </td>
                                    
                                    <td>
                                        {{ hidden_field('id_vendor', 'value': vend.id_vendor) }}
                                        {{ vend.nama_vendor }}
                                    </td>
                                    {{ end_form() }}
                                </tr>
                                        {% endif %}
                                    {% endfor %} 
                                {% endfor %}
                            </tbody>
                        </table>
                        <a href="{{ url('/makanan/form') }}">
                            <button class="btn2">Buat Data Konsumsi Baru</button>
                        </a>
                    </div>
                    {% endif %}
                </div>
            </div>
		</div>
    </div>
    {% endif %}
{% endblock %}