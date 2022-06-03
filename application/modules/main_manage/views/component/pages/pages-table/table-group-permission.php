<thead>
    <tr>
        <th>Hak akses</th>
        <th>Izinkan</th>
        <th>Tolak</th>
        <th>Abaikan</th>
    </tr>
</thead>
<tbody>
        <?php if ($permissions) { ?>
            <?php foreach ($permissions as $k => $v) : ?>
            <?php $class = array('class' => 'custom-switch-input'); ?>
                <tr>
                    <td><?php echo $v['name']; ?></td>
                    <td>
                        <label class="custom-switch">
                            <?php echo form_radio("perm_{$v['id']}", '1', set_radio("perm_{$v['id']}", '1', (array_key_exists($v['key'], $group_permissions) && $group_permissions[$v['key']]['value'] === true) ? true : false), $class); ?>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Izinkan</span>
                        </label>
                    </td>
                    <td>
                        <label class="custom-switch">
                            <?php echo form_radio("perm_{$v['id']}", '0', set_radio("perm_{$v['id']}", '0', (array_key_exists($v['key'], $group_permissions) && $group_permissions[$v['key']]['value'] != true) ? true : false), $class); ?>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Tolak</span>
                        </label>
                    </td>
                    <td>
                        <label class="custom-switch">
                            <?php echo form_radio("perm_{$v['id']}", 'X', set_radio("perm_{$v['id']}", 'X', (!array_key_exists($v['key'], $group_permissions)) ? true : false), $class); ?>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Abaikan</span>
                        </label>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="4">There are currently no permissions to manage, please add some permissions</td>
            </tr>
        <?php } ?>
</tbody>