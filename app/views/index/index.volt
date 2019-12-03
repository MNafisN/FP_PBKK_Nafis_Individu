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
                <a href="{{ url('/index') }}"><button class="active">Reservasi</button></a>
                <button>Ruang Rapat</button>
                <button>Fasilitas</button>
                <button>Konsumsi</button>
                <button>Vendor</button>
                <div style="bottom: 0px; width: inherit; position: absolute">
                    <form action="{{ url('/index/logout') }}" method="post">
                        <button>Logout</button>
                    </form>
                </div>
            </div>  
            <div class="tabcontent">
                <div class="container">
                    <div class="card">
                    {% if reservasi is defined %}
                        <h3 class="card-header">Upcoming Events</h3>
                        <table class="table table-bordered table-responsive-sm" id="calendar">
                            <thead>
                                <tr>
                                    <th> Judul Agenda </th>
                                    <th> Peminjam </th>
                                    <th> Ruangan </th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for reserve in reservasi %}
                                    {% for ruang in ruangan %}
                                        {% for user in users %}
                                            {% if ruang.id_ruangan is reserve.id_ruangan and user.id_user is reserve.id_peminjam %}
                                <tr>
                                    <td>{{ reserve.nama_agenda }}</td>
                                    <td>{{ user.nama_pegawai }}</td>
                                    <td>{{ ruang.nama_ruangan }}</td>
                                </tr> 
                                            {% endif %}
                                        {% endfor %}
                                    {% endfor %}
                                {% endfor %}
                            </tbody>
                        </table>
                        <a href="{{ url('/index/form') }}">
                            <button class="btn2">Buat Reservasi Baru</button>
                        </a>
                    </div>
                    {% endif %}
                </div>
            </div>
		</div>
    </div>
    {% endif %}
{% endblock %}