
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
                <a href="<?= $this->url->get('/fasilitas') ?>"><button>Fasilitas</button></a>
                <a href="<?= $this->url->get('/makanan') ?>"><button>Konsumsi</button></a>
                <a href="<?= $this->url->get('/vendor') ?>"><button class="active">Vendor</button class="active"></a>
                <div style="bottom: 0px; width: inherit; position: absolute">
                    <form action="<?= $this->url->get('/index/logout') ?>" method="post">
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
                            <?= $this->flashSession->output() ?>
                            <?= $this->tag->form(['vendor/save', 'name' => 'vendor', 'method' => 'post']) ?>
                            
                                <label for="nama_vendor">Nama Vendor:</label>
                                <?= $this->tag->textField(['nama_vendor', 'placeholder' => 'Masukkan nama vendor', 'required']) ?>

                                <label for="email_vendor">Email Vendor:</label>
                                <?= $this->tag->textField(['email_vendor', 'placeholder' => 'Masukkan email vendor']) ?>

                                <label for="alamat_vendor">Alamat Vendor:</label>
                                <?= $this->tag->textField(['alamat_vendor', 'placeholder' => 'Masukkan alamat vendor']) ?>

                                <label for="no_telp">Nomor Telepon Vendor:</label>
                                <?= $this->tag->textField(['no_telp', 'placeholder' => 'Masukkan nomor telepon vendor']) ?>

                                <?= $this->tag->submitButton(['Confirm']) ?>

                            <?= $this->tag->endForm() ?>
                        </div></div>
                    </div>
                </div>
            </div>
		</div>
    </div>
    <?php } ?>
