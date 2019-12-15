
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
                <a href="<?= $this->url->get('/makanan') ?>"><button>Konsumsi</button></a>
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
                    <?php if (isset($fasilitas)) { ?>
                        <h3 class="card-header">Daftar Fasilitas Ruangan</h3>
                        <table class="table table-bordered table-responsive-sm" id="calendar">
                            <thead>
                                <tr>
                                    <th> Nama Fasilitas </th>
                                    <th> Nama Ruangan </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($fasilitas as $fasil) { ?>
                                    <?php foreach ($ruangan as $ruang) { ?>
                                        <?php if ($ruang->id_ruangan == $fasil->id_ruangan) { ?>
                                <tr>
                                    <?= $this->tag->form(['fasilitas/detail', 'method' => 'post']) ?>
                                    <td>
                                        <?= $this->tag->hiddenField(['id_fasilitas', 'value' => $fasil->id_fasilitas]) ?>
                                        <?= $this->tag->submitButton([$fasil->nama_fasilitas, 'style' => 'all: unset; cursor: pointer']) ?>
                                    </td>
                                    
                                    <td>
                                        <?= $this->tag->hiddenField(['id_ruangan', 'value' => $ruang->id_ruangan]) ?>
                                        <?= $ruang->nama_ruangan ?>
                                    </td>
                                    <?= $this->tag->endForm() ?>
                                </tr>
                                        <?php } ?>
                                    <?php } ?> 
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="<?= $this->url->get('/fasilitas/form') ?>">
                            <button class="btn2">Buat Data Fasilitas Baru</button>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
		</div>
    </div>
    <?php } ?>
