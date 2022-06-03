<?php if ($url1 == "dashboard") { ?>
    <h1>Dasbor</h1>
<?php } else if ($url1 == "manage") { ?>
    <?php if ($url2 == "user") { ?>
        <?php if ($url3 == "list") { ?>
            <h1>Kelola data pengguna</h1>
        <?php } elseif ($url3 == "add") { ?>
            <h1>Menu tambah pengguna</h1>
        <?php } elseif ($url3 == "edit") { ?>
            <h1>Menu ubah pengguna</h1>
        <?php } ?>
    <?php } elseif ($url2 == "group") { ?>
        <?php if ($url3 == "list") { ?>
            <h1>Kelola data grup</h1>
        <?php } elseif ($url3 == "add") { ?>
            <h1>Menu tambah grup</h1>
        <?php } elseif ($url3 == "edit") { ?>
            <h1>Menu ubah grup</h1>
        <?php } elseif ($url3 == "permission") { ?>
            <h1>Menu ubah hak akses grup</h1>
        <?php } ?>
    <?php } elseif ($url2 == "permission") { ?>
        <?php if ($url3 == "list") { ?>
            <h1>Kelola data hak akses</h1>
        <?php } elseif ($url3 == "add") { ?>
            <h1>Menu tambah hak akses</h1>
        <?php } elseif ($url3 == "edit") { ?>
            <h1>Menu ubah hak akses</h1>
        <?php } ?>
    <?php } elseif ($url2 == "member") { ?>
        <?php if ($url3 == "list") { ?>
            <h1>Kelola data Anggota</h1>
        <?php } elseif ($url3 == "add") { ?>
            <h1>Menu tambah Anggota</h1>
        <?php } elseif ($url3 == "edit") { ?>
            <h1>Menu ubah Anggota</h1>
        <?php } ?>
    <?php } ?>
<?php } ?>