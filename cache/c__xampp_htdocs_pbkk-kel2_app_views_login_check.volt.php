
	<meta charset="utf-8">
	<title>SIRUPAT</title>
    <?= $this->assets->outputCss() ?>



    <?php if (isset($admin)) { ?>
        <h1>user is defined</h1>
        <table class="table table-bordered table-responsive-sm">
            <tr>
                <th> Username </th>
                <th> Email </th>
                <th> Nama </th>
            </tr>
            <tr>
                <td><?= $admin->username ?></td>
                <td><?= $admin->email ?></td>
                <td><?= $admin->nama_pegawai ?></td>
            </tr>
        </table>
        <!-- <?php $v22975649171iterator = $admin; $v22975649171incr = 0; $v22975649171loop = new stdClass(); $v22975649171loop->self = &$v22975649171loop; $v22975649171loop->length = count($v22975649171iterator); $v22975649171loop->index = 1; $v22975649171loop->index0 = 1; $v22975649171loop->revindex = $v22975649171loop->length; $v22975649171loop->revindex0 = $v22975649171loop->length - 1; ?><?php foreach ($v22975649171iterator as $user) { ?><?php $v22975649171loop->first = ($v22975649171incr == 0); $v22975649171loop->index = $v22975649171incr + 1; $v22975649171loop->index0 = $v22975649171incr; $v22975649171loop->revindex = $v22975649171loop->length - $v22975649171incr; $v22975649171loop->revindex0 = $v22975649171loop->length - ($v22975649171incr + 1); $v22975649171loop->last = ($v22975649171incr == ($v22975649171loop->length - 1)); ?>
            <?php if ($v22975649171loop->first) { ?>
                <table class="table table-bordered table-responsive-sm">
                    <tr>
                        <th> Username </th>
                        <th> Email </th>
                        <th> Nama </th>
                    </tr>
            <?php } ?>
                    <tr>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->nama_pegawai ?></td>
                    </tr>
            <?php if ($v22975649171loop->last) { ?>
                </table>
            <?php } ?>
        <?php $v22975649171incr++; } ?> -->
    <?php } ?>
