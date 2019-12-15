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
                        <h2 class="card-header">Detail Konsumsi</h2>
                        {{ flashSession.output() }}
                        <ul class="list-group">

                            <li class="list-group-item">
                                
                                <span style="width: 25%; white-space: nowrap">Nama Makanan</span>
                                <span style="flex: 1; white-space: nowrap">: {{ makanan.nama_makanan }}</span>
                                    
                            </li>
                            
                            <li class="list-group-item">
                                
                                <span style="width: 25%; white-space: nowrap">Nama Vendor</span>
                                <span style="flex: 1; white-space: nowrap">: {{ vendor.nama_vendor }}</span>
                                    
                            </li>
                            
                            <li class="list-group-item">
                                <span style="width: 25%; white-space: nowrap">Deskripsi</span>
                                <span style="flex: 1; white-space: nowrap">: {{ makanan.deskripsi_makanan }}</span>
                            </li>
                            
                        </ul>
                        
                        <div class="card-footer">
                            <div style="display: inline-block; width: max-content">
                                <a href="{{ url('/makanan') }}"><button class="btn2">Kembali</button></a>
                            </div>
                            <div style="display: block; width: max-content; float: right">
                                {{ form('makanan/delete', 'method': 'post', 'style': 'margin-block-end: 0px', 'onSubmit': 'return validateForm3()') }}
                                    {{ hidden_field('id_makanan', 'value': makanan.id_makanan) }}
                                    {{ submit_button('Hapus', 'style': 'width: auto; float: right; margin: 0px') }}
                                {{ end_form() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {% endif %}
{% endblock %}