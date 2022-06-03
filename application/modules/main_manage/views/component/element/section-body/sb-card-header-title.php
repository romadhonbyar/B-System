<?php if ($url1 == "dashboard") { ?>
    <h4><?php echo ($this->ion_auth->is_admin() == true) ? "(Semua Data)" : ""; ?> Grafik Keuangan Tahun <?php echo date('Y'); ?></h4>
<?php } else if ($url1 == "manage") { ?>
    <?php if ($url2 == "user") { ?>
        <?php if ($url3 == "list") { ?>
            <h4>Tabel pengguna</h4>
        <?php } ?>
    <?php } elseif ($url2 == "group") { ?>
        <?php if ($url3 == "list") { ?>
            <h4>Tabel grup</h4>
        <?php } elseif ($url3 == "permission") { ?>
            <h4>Tabel hak akses Grup <?= ucfirst($group->name); ?> </h4>
        <?php } ?>
    <?php } elseif ($url2 == "permission") { ?>
        <?php if ($url3 == "list") { ?>
            <h4>Tabel hak akses</h4>
        <?php } ?>
    <?php } elseif ($url2 == "member") { ?>
        <?php if ($url3 == "list") { ?>
            <h4>Tabel Anggota</h4>
        <?php } ?>
    <?php } ?>
<?php } ?>