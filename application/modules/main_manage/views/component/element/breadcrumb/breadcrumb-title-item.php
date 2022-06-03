<?php if ($url1 == "manage") { ?>
    <?php if ($url2 == "user") { ?>
        <?php if ($url3 == "list") { ?>
            <div class="breadcrumb-item">Tabel pengguna</div>
        <?php } elseif ($url3 == "add") { ?>
            <div class="breadcrumb-item">Tambah pengguna</div>
        <?php } elseif ($url3 == "edit") { ?>
            <div class="breadcrumb-item">Ubah pengguna</div>
        <?php } ?>
    <?php } elseif ($url2 == "group") { ?>
        <?php if ($url3 == "list") { ?>
            <div class="breadcrumb-item">Tabel grup</div>
        <?php } elseif ($url3 == "add") { ?>
            <div class="breadcrumb-item">Tambah grup</div>
        <?php } elseif ($url3 == "edit") { ?>
            <div class="breadcrumb-item">Ubah grup</div>
        <?php } elseif ($url3 == "permission") { ?>
            <div class="breadcrumb-item"><a href="<?php echo site_url('manage/group/list'); ?>">Tabel grup</a></div>
            <div class="breadcrumb-item">Ubah hak akses grup</div>
        <?php } ?>
    <?php } elseif ($url2 == "permission") { ?>
        <?php if ($url3 == "list") { ?>
            <div class="breadcrumb-item">Tabel hak akses</div>
        <?php } elseif ($url3 == "add") { ?>
            <div class="breadcrumb-item">Tambah hak akses</div>
        <?php } elseif ($url3 == "edit") { ?>
            <div class="breadcrumb-item">Ubah hak akses</div>
        <?php } ?>
    <?php } elseif ($url2 == "member") { ?>
        <?php if ($url3 == "list") { ?>
            <div class="breadcrumb-item">Tabel Anggota</div>
        <?php } elseif ($url3 == "add") { ?>
            <div class="breadcrumb-item">Tambah Anggota</div>
        <?php } elseif ($url3 == "edit") { ?>
            <div class="breadcrumb-item">Ubah Anggota</div>
        <?php } ?>
    <?php } ?>
<?php } ?>