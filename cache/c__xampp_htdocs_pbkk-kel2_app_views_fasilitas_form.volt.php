
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
                <a href="<?= $this->url->get('/ruangan') ?>"><button>Ruang Rapat</button></a>
                <a href="<?= $this->url->get('/fasilitas') ?>"><button class="active">Fasilitas</button></a>
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
                        <h2 class="card-header">Form Fasilitas</h2>
                        <div class="content-midcontainer" style="width: 50%!important">
                        <div class="form-login">
                            <?= $this->flashSession->output() ?>
                            <?= $this->tag->form(['fasilitas/save', 'name' => 'fasilitas', 'method' => 'post']) ?>
                            
                                <label for="nama_fasilitas">Nama Fasilitas:</label>
                                <?= $this->tag->textField(['nama_fasilitas', 'placeholder' => 'Masukkan nama fasilitas', 'required']) ?>

                                <label for="id_ruangan">Nama Ruangan:</label>
                                <?= $this->tag->select(['id_ruangan', $ruangan, 'using' => ['id_ruangan', 'nama_ruangan'], 'class' => 'form-control col-sm-4', 'style' => 'width: 100%; margin: 8px 0px']) ?>

                                <label for="spesifikasi">Spesifikasi Fasilitas:</label>
                                <?= $this->tag->textField(['spesifikasi', 'placeholder' => 'Masukkan spesifikasi fasilitas', 'required']) ?>

                                <?= $this->tag->submitButton(['Confirm']) ?>

                            <?= $this->tag->endForm() ?>
                        </div></div>
                    </div>
                </div>
            </div>
		</div>
    </div>
    <?php } ?>
