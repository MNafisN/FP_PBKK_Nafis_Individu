
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
                <a href="<?= $this->url->get('/index') ?>"><button class="active">Reservasi</button></a>
                <button>Ruang Rapat</button>
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
                    <?php if (isset($reservasi)) { ?>
                        <h3 class="card-header">Upcoming Events</h3>
                        <table class="table table-bordered table-responsive-sm" id="calendar">
                            <thead>
                                <tr>
                                    <th> Judul Agenda </th>
                                    <th> Peminjam </th>
                                    <th> Ruangan </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservasi as $reserve) { ?>
                                    <?php foreach ($ruangan as $ruang) { ?>
                                        <?php foreach ($users as $user) { ?>
                                            <?php if ($ruang->id_ruangan == $reserve->id_ruangan && $user->id_user == $reserve->id_peminjam) { ?>
                                <tr>
                                    <td><?= $reserve->nama_agenda ?></td>
                                    <td><?= $user->nama_pegawai ?></td>
                                    <td><?= $ruang->nama_ruangan ?></td>
                                </tr> 
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="<?= $this->url->get('/index/form') ?>">
                            <button class="btn2">Buat Reservasi Baru</button>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
		</div>
    </div>
    <?php } ?>
