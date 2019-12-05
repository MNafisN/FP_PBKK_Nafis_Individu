
    <meta charset="utf-8">
    <title>SIRUPAT</title>    
    <?= $this->assets->outputCss() ?>  


    <?php if ($this->session->has('login')) { ?>
    <div class="header">
        <div class="header-container">
            SIRUPAT
        </div>
    </div>
    <div class="content">
        <div class="main-container">
            <div class="tab">
                <div style="text-align: center; padding: 10px 0px">
                    Selamat datang, <?= $this->session->get('login')['username'] ?>
                </div>
                <a href="<?= $this->url->get('/index') ?>"><button>Reservasi</button></a>
                <a href="<?= $this->url->get('/ruangan') ?>"><button class="active">Ruang Rapat</button></a>
                <button>Fasilitas</button>
                <button>Konsumsi</button>
                <button>Vendor</button>
                <div style="bottom: 0px; width: inherit; position: absolute">
                    <form action="<?= $this->url->get('/index/logout') ?>" method="post">
                        <button>Logout</button>
                    </form>
                </div>
            </div>

            <div class="tabcontent">
                <div class="container">
                    <div class="card">
                        <h2 class="card-header">Rincian Agenda</h2>
                        <?= $this->flashSession->output() ?>
                        <ul class="list-group">

                            <li class="list-group-item">
                                
                                <span style="width: 25%; white-space: nowrap">Nama Ruangan</span>
                                <span style="flex: 1; white-space: nowrap">: <?= $ruangan->nama_ruangan ?></span>
                                    
                            </li>
                            
                            <li class="list-group-item">
                                
                                <span style="width: 25%; white-space: nowrap">Lokasi Ruangan</span>
                                <span style="flex: 1; white-space: nowrap">: <?= $ruangan->lokasi_ruangan ?></span>
                                    
                            </li>
                            
                            <li class="list-group-item">
                                <span style="width: 25%; white-space: nowrap">Kapasitas Ruangan</span>
                                <span style="flex: 1; white-space: nowrap">: <?= $ruangan->kapasitas_ruangan ?></span>
                            </li>
                            
                        </ul>
                        
                        <div class="card-footer">
                            <div style="display: inline-block; width: max-content">
                                <a href="<?= $this->url->get('/ruangan') ?>"><button class="btn2">Kembali</button></a>
                            </div>
                            <div style="display: block; width: max-content; float: right">
                                <?= $this->tag->form(['ruangan/delete', 'method' => 'post', 'style' => 'margin-block-end: 0px', 'onSubmit' => 'return validateForm3()']) ?>
                                    <?= $this->tag->hiddenField(['id_ruangan', 'value' => $ruangan->id_ruangan]) ?>
                                    <?= $this->tag->submitButton(['Hapus', 'style' => 'width: auto; float: right; margin: 0px']) ?>
                                <?= $this->tag->endForm() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
