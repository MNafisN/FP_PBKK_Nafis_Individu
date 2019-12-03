
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
                <button class="active">Reservasi</button>
                <button>Ruang Rapat</button>
                <button>Fasilitas</button>
                <button>Konsumsi</button>
                <button>Vendor</button>
                <div style="bottom: 0px; width: inherit; position: absolute">
                    <form action="<?= $this->url->get('/index/logout') ?>" method="post">
                        <button type="submit">Logout</button>
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
                                <tr>
                                    <td><?= $reserve->no_surat ?></td>
                                </tr> 
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <span></span>
                    <?php } ?>
                </div>
            </div>
		</div>
    </div>
    <?php } ?>
