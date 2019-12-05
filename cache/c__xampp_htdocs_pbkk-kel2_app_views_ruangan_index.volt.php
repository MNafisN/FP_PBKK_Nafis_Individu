
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
                    <?php if (isset($ruangan)) { ?>
                        <h3 class="card-header">Daftar Reservasi</h3>
                        <table class="table table-bordered table-responsive-sm" id="calendar">
                            <thead>
                                <tr>
                                    <th> Nama Ruangan </th>
                                    <th> Lokasi </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ruangan as $ruang) { ?>
                                <tr>
                                    <?= $this->tag->form(['ruangan/detail', 'method' => 'post']) ?>
                                    <td>
                                        <?= $this->tag->hiddenField(['id_ruangan', 'value' => $ruang->id_ruangan]) ?>
                                        <?= $this->tag->submitButton([$ruang->nama_ruangan, 'style' => 'all: unset; cursor: pointer']) ?>
                                    </td>
                                    
                                    <td>
                                        <?= $ruang->lokasi_ruangan ?>
                                    </td>
                                    <?= $this->tag->endForm() ?>
                                </tr> 
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="<?= $this->url->get('/ruangan/form') ?>">
                            <button class="btn2">Buat Data Ruangan Baru</button>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
		</div>
    </div>
    <?php } ?>
