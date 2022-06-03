<thead>
    <tr>
        <th>
            ID Pengguna
        </th>
        <th>
            Nama pengguna
        </th>
        <th>
            Nama lengkap
        </th>
        <th>
            Terakhir masuk
        </th>
        <th>
            Grup
        </th>
        <?php if ($this->ion_auth_acl->has_permission('manage_user_edit') or $this->ion_auth_acl->has_permission('manage_user_delete')) { ?>
            <th>
                Aksi
            </th>
        <?php } ?>
    </tr>
</thead>
<tbody></tbody>