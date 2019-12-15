
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
                <a href="<?= $this->url->get('/makanan') ?>"><button class="active">Konsumsi</button class="active"></a>
                <a href="<?= $this->url->get('/vendor') ?>"><button>Vendor</button></a>
                <div style="bottom: 0px; width: inherit; position: absolute">
                    <form action="<?= $this->url->get('/index/logout') ?>" method="post">
                        <button>Logout</button>
                    </form>
                </div>
            </div>

            <div class="tabcontent">
                <div class="container">
                    <div class="card">
                    <?php if (isset($makanan)) { ?>
                        <h3 class="card-header">Daftar Konsumsi</h3>
                        <table class="table table-bordered table-responsive-sm" id="calendar">
                            <thead>
                                <tr>
                                    <th> Nama Makanan </th>
                                    <th> Nama Vendor </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($makanan as $makan) { ?>
                                    <?php foreach ($vendor as $vend) { ?>
                                        <?php if ($vend->id_vendor == $makan->id_vendor) { ?>
                                <tr>
                                    <?= $this->tag->form(['makanan/detail', 'method' => 'post']) ?>
                                    <td>
                                        <?= $this->tag->hiddenField(['id_makanan', 'value' => $makan->id_makanan]) ?>
                                        <?= $this->tag->submitButton([$makan->nama_makanan, 'style' => 'all: unset; cursor: pointer']) ?>
                                    </td>
                                    
                                    <td>
                                        <?= $this->tag->hiddenField(['id_vendor', 'value' => $vend->id_vendor]) ?>
                                        <?= $vend->nama_vendor ?>
                                    </td>
                                    <?= $this->tag->endForm() ?>
                                </tr>
                                        <?php } ?>
                                    <?php } ?> 
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="<?= $this->url->get('/makanan/form') ?>">
                            <button class="btn2">Buat Data Konsumsi Baru</button>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
		</div>
    </div>
    <?php } ?>
