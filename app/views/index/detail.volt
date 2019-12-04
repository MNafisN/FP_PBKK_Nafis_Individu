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
                        <h2 class="card-header">Rincian Agenda</h2>
                        <ul class="list-group">

                            <li class="list-group-item">
                                
                                <span style="width: 25%; white-space: nowrap">Nomor Surat</span>
                                <span style="flex: 1; white-space: nowrap">: {{ reservasi.no_surat }}</span>
                                    
                            </li>
                            
                            <li class="list-group-item">
                                
                                <span style="width: 25%; white-space: nowrap">Nama Agenda</span>
                                <span style="flex: 1; white-space: nowrap">: {{ reservasi.nama_agenda }}</span>
                                    
                            </li>
                            
                            <li class="list-group-item">
                                <span style="width: 25%; white-space: nowrap">Ruangan</span>
                                <span style="flex: 1; white-space: nowrap">: {{ ruangan.nama_ruangan }}</span>
                            </li>
                            
                            <li class="list-group-item">
                                
                                <span style="width: 25%; white-space: nowrap">Deskripsi Agenda</span>
                                <span style="flex: 1; white-space: nowrap">: {{ reservasi.deskripsi }}</span>
                                    
                            </li>
                            
                            <li class="list-group-item">
                                <span style="width: 25%; white-space: nowrap">Nama Peminjam</span>
                                <span style="flex: 1; white-space: nowrap">: {{ users.nama_pegawai }}</span>
                            </li>
                            
                            <li class="list-group-item">
                                
                                <span style="width: 25%; white-space: nowrap">Tanggal mulai</span>
                                <span style="flex: 1; white-space: nowrap">: {{ reservasi.waktu_mulai_penggunaan }}</span>
                                    
                            </li>
                            
                            <li class="list-group-item">
                                
                                <span style="width: 25%; white-space: nowrap">Tanggal berakhir</span>
                                <span style="flex: 1; white-space: nowrap">: {{ reservasi.waktu_akhir_penggunaan }}</span>
                                    
                            </li>
                            
                            <li class="list-group-item">
                                <span style="width: 25%; white-space: nowrap">Status</span>
                                <span style="flex: 1; white-space: nowrap">: {{ reservasi.status_reservasi }}</span>
                            </li>

                        </ul>

                        <a href="{{ url('/index') }}">
                            <button class="btn2">Kembali</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {% endif %}
{% endblock %}