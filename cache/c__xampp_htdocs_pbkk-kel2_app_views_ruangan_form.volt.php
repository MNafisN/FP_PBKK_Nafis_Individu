
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
                        <h2 class="card-header">Form Ruangan</h2>
                        <div class="content-midcontainer" style="width: 50%!important">
                        <div class="form-login">
                            <?= $this->flashSession->output() ?>
                            <?= $this->tag->form(['ruangan/save', 'name' => 'ruangan', 'method' => 'post']) ?>
                            
                                <label for="nama_ruangan">Nama Ruangan:</label>
                                <?= $this->tag->textField(['nama_ruangan', 'placeholder' => 'Masukkan nama ruangan', 'required']) ?>

                                <label for="lokasi_ruangan">Lokasi Ruangan:</label>
                                <?= $this->tag->textField(['lokasi_ruangan', 'placeholder' => 'Masukkan lokasi ruangan', 'required']) ?>

                                <label for="kapasitas_ruangan">Kapasitas Ruangan:</label>
                                <?= $this->tag->numericField(['kapasitas_ruangan', 'placeholder' => 'Tentukan kapasitas ruangan']) ?>

                                <?= $this->tag->submitButton(['Confirm']) ?>

                            <?= $this->tag->endForm() ?>
                        </div></div>
                    </div>
                </div>
            </div>
		</div>
    </div>
    <?php } ?>
