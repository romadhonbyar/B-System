<thead>
	<tr>
        <th></th>
		<th>Nama</th>
		<th>Deskripsi</th>
		<?php if ($this->ion_auth_acl->has_permission('manage_group_permission')) { ?>
			<th>Hak akses</th>
		<?php } ?>
		<?php if ($this->ion_auth_acl->has_permission('manage_group_edit') or $this->ion_auth_acl->has_permission('manage_group_delete')) { ?>
			<th>Aksi</th>
		<?php } ?>
	</tr>
</thead>
<tbody></tbody>