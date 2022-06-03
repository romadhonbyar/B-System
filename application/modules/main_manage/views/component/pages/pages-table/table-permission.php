<thead>
	<tr>
		<th>Kunci</th>
		<th>Nama</th>
		<?php if ($this->ion_auth_acl->has_permission('manage_permission_edit') or $this->ion_auth_acl->has_permission('manage_permission_delete')) { ?>
			<th>Aksi</th>
		<?php } ?>
	</tr>
</thead>
<tbody></tbody>