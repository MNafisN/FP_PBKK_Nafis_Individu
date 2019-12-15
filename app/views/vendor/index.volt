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
                    {% if vendor is defined %}
                        <h3 class="card-header">Daftar Vendor</h3>
                        <table class="table table-bordered table-responsive-sm" id="calendar">
                            <thead>
                                <tr>
                                    <th> Nama Vendor </th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for vend in vendor %}
                                <tr>
                                    {{ form('vendor/detail', 'method': 'post') }}
                                    <td>
                                        {{ hidden_field('id_vendor', 'value': vend.id_vendor) }}
                                        {{ submit_button(vend.nama_vendor, 'style': 'all: unset; cursor: pointer') }}
                                    </td>
                                    {{ end_form() }}
                                </tr> 
                                {% endfor %}
                            </tbody>
                        </table>
                        <a href="{{ url('/vendor/form') }}">
                            <button class="btn2">Buat Data Vendor Baru</button>
                        </a>
                    </div>
                    {% endif %}
                </div>
            </div>
		</div>
    </div>
    {% endif %}
{% endblock %}