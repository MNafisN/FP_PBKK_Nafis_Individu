
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
                    <?php if (isset($vendor)) { ?>
                        <h3 class="card-header">Daftar Vendor</h3>
                        <table class="table table-bordered table-responsive-sm" id="calendar">
                            <thead>
                                <tr>
                                    <th> Nama Vendor </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($vendor as $vend) { ?>
                                <tr>
                                    <?= $this->tag->form(['vendor/detail', 'method' => 'post']) ?>
                                    <td>
                                        <?= $this->tag->hiddenField(['id_vendor', 'value' => $vend->id_vendor]) ?>
                                        <?= $this->tag->submitButton([$vend->nama_vendor, 'style' => 'all: unset; cursor: pointer']) ?>
                                    </td>
                                    <?= $this->tag->endForm() ?>
                                </tr> 
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="<?= $this->url->get('/vendor/form') ?>">
                            <button class="btn2">Buat Data Vendor Baru</button>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
		</div>
    </div>
    <?php } ?>
