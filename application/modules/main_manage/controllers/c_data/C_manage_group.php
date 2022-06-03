<?php defined('BASEPATH') or exit('No direct script access allowed');
class C_manage_group extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        /** Load Helper */
        $this->load->helper(
            array('system/uri_helper',
                  'system/security_helper',
                  'system/unix_helper',
                  'system/text_helper')
        );
        
        redirectLogin();
        
        /** Load Model */
        $this->load->model('main_manage/m_manage_groups');
    }

    public function index()
    {
        redirectDashboard();
    }

    public function ajax_list()
    {
        if ($this->ion_auth->logged_in()) {
            $list = $this->m_manage_groups->get_datatables();
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $output) {
                $no++;
                $row = array();
                
                $id_encode = encrypt_code($output->id);

                $row[] = $output->id; /** Harus ada ID untuk Select ALL */
                $row[] = groupBadge($output->name);
                $row[] = "<abbr title='$output->description'>" . cutText($output->description, "40") . "</abbr>";

                if ($this->ion_auth_acl->has_permission('manage_group_permission')) {
                    $row[] = '
                        <div class="buttons">
                            <a href="' . site_url('manage/group/permission/' . $id_encode) . '" title="Manage permissions group" class="btn btn-icon btn-primary btn-sm">
                                <i class="fas fa-key fa-fw"></i> Permission
                            </a>
                        </div>';
                }

                $out_url = base_url('manage/group/edit/'.$id_encode);

                $csrf = array(
                    'name' => $this->security->get_csrf_token_name(),
                    'hash' => $this->security->get_csrf_hash()
                );

                $readonly = '';
                if ($this->config->item('admin_group', 'ion_auth') === $output->name) {
                    $readonly = 'readonly';
                }

                $edit = "<button class=\"btn btn-warning btn-sm\" id=\"modal-edit-".$id_encode."\"><i class=\"far fa-edit fa-fw\"></i> Ubah</button>

                        <script>
                            var modal_body_".$id_encode." = '';
                            modal_body_".$id_encode." += '<form action=\"#\" id=\"form-".$id_encode."\" class=\"needs-validation\" novalidate=\"\" method=\"POST\" accept-charset=\"utf-8\">';
                            //modal_body_".$id_encode." +=    '<input type=\"hidden\" name=\"".$csrf['name']."\" value=\"".$csrf['hash']."\" />';

                            modal_body_".$id_encode." +=    '<div class=\"row\">';
                            modal_body_".$id_encode." +=    '    <div class=\"form-group col-lg-12 col-xs-12 col-md-12 mb-3 input-".$id_encode."\">';
                            modal_body_".$id_encode." +=    '        <label for=\"inputGroupName\">Nama Grup</label>';
                            modal_body_".$id_encode." +=    '        <input type=\"text\" name=\"inputGroupName-".$id_encode."\" value=\"". $output->name ."\" id=\"inputGroupName-".$id_encode."\" class=\"form-control\" placeholder=\"Nama Grup\" required=\"required\"  pattern=\"^[a-zA-Z0-9-_]+$\" ". $readonly .">';
                            modal_body_".$id_encode." +=    '        <small id=\"inputGroupNameHelp\" class=\"form-text text-muted\">Hanya boleh memasukkan alphabet dan tanda pisah ( <b>-</b> atau <b>_</b> ).</small>';
                            modal_body_".$id_encode." +=    '        <div class=\"help-block with-errors\"></div>';
                            modal_body_".$id_encode." +=    '    </div>';
                            modal_body_".$id_encode." +=    '</div>';
                            modal_body_".$id_encode." +=    '<div class=\"row h-50\">';
                            modal_body_".$id_encode." +=    '    <div class=\"form-group col-lg-12 col-xs-12 col-md-12 mb-0 input-".$id_encode."\">';
                            modal_body_".$id_encode." +=    '        <label for=\"inputGroupDescription\">Deskripsi Grup</i></label>';
                            modal_body_".$id_encode." +=    '        <textarea name=\"inputGroupDescription-".$id_encode."\" cols=\"40\" rows=\"3\" id=\"inputGroupDescription-".$id_encode."\" class=\"form-control h-50\" placeholder=\"Deskripsi Grup\" required=\"required\" maxlength=\"255\" minlength=\"5\">". $output->description ."</textarea>';
                            modal_body_".$id_encode." +=    '        <small id=\"inputGroupDescriptionHelp\" class=\"form-text text-muted\">Minimal 5 karakter, maksimal 255 karakter.</small>';
                            modal_body_".$id_encode." +=    '        <div class=\"help-block with-errors\"></div>';
                            modal_body_".$id_encode." +=    '    </div>';
                            modal_body_".$id_encode." +=    '</div>';
                            
                            modal_body_".$id_encode." += '</form>';
                            modal_body_".$id_encode." += '';

                            /** Handle Validator */
                            $(function() {
                                /** create one instance for handler: */
                                var myHandler = function(e) {
                                    $('#form-".$id_encode."').validator();
                                };
                        
                                /** Bind it: */
                                $('#form-".$id_encode."').on('keyup change', function(e) {
                                    myHandler(e);
                                });
                            });

                            $('#modal-edit-".$id_encode."').fireModal({
                                title: 'Ubah Grup ". ucfirst($output->name) ."',
                                footerClass: 'bg-whitesmoke',
                                body: modal_body_".$id_encode.",
                                created: function(modal) {
                                    modal.find('.modal-footer').prepend(
                                        '<button type=\"button\" class=\"btn btn-secondary\" id=\"cancelBtn-".$id_encode."\" data-dismiss=\"modal\" onclick=\"reload_page()\">Batal</button>'
                                    );
                                    /* modal.find('.modal-md').toggleClass('modal-lg'); */
                                },
                                autoFocus: false,
                                center: true,
                                onFormSubmit: function(modal, e, form) {

                                    $('#form-".$id_encode."').addClass('was-validated');
                                    $('.input-".$id_encode."').addClass('has-danger has-error');

                                    /** Form Data */
                                    let form_data = $(e.target).serialize();
                                    console.log(form_data);
                        
                                    var formData = new FormData(this);
                                    console.log(formData);

                                    if (e.isDefaultPrevented()) {
                                        console.log('Hello');
                                    } else {
                                        $.ajax({
                                            url: '".$out_url."', 
                                            type: 'POST',
                                            data: formData,
                                            dataType: 'json',
                                            /** Data text, HTML, json etc. */
                                            success: function (response) {
                                                $('#submitBtn-".$id_encode."').prop(\"disabled\", true);
                                                $('#submitBtn-".$id_encode."').addClass(\"not-allowed \");
                        
                                                $('#cancelBtn-".$id_encode."').prop(\"disabled\", true);
                                                $('#cancelBtn-".$id_encode."').addClass(\"not-allowed \");

                                                if(response.status) {
                                                    $('.modal').removeClass('modal-progress');
                                                    var alert = response.type;
                                                    reload_table();

                                                    window.setTimeout(function() {
                                                        /** REMOVE RED COLOR */
                                                        $('div.input-".$id_encode."').removeClass('has-danger has-error');
                                                        $('#form-".$id_encode."').removeClass('was-validated');
                                                    }, 5000);
                                                } else {
                                                    $('.modal').removeClass('modal-progress');
                                                    var alert = response.type;
                                                }

                                                modal
                                                    .find('.modal-body')
                                                    .prepend(
                                                        '<div id=\"alert-validation\" class=\"alert alert-' + alert +
                                                        ' alert-dismissible show fade\"><div class=\"al' +
                                                        'ert-body\"><button class=\"close\" data-dismiss=\"alert\"><span>&times;</span>' +
                                                        '</button>' + response.message + '</div></div>'
                                                    );
                                            },
                                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                                handleAjaxError(XMLHttpRequest, textStatus, errorThrown);
                                                //console.log('Status: ' + textStatus);
                                                //console.log('Error: ' + errorThrown);
                                                //console.log('XMLHttpRequest: ' + XMLHttpRequest);
                                                $('.modal').removeClass('modal-progress');
                                            },

                                            cache: false,
                                            contentType: false,
                                            processData: false
                                        });
                                    }

                                    $(document).ready(function () {
                                        window.setTimeout(function() {
                                            $('.alert')
                                                .fadeTo(1000, 0)
                                                .slideUp(1000, function() {
                                                    $(this).remove();
                                                })
                                        }, 5000);

                                        window.setTimeout(function() {
                                            $('#submitBtn-".$id_encode."').removeAttr('disabled');
                                            $('#submitBtn-".$id_encode."').removeClass(\"not-allowed\");
                        
                                            $('#cancelBtn-".$id_encode."').removeAttr('disabled');
                                            $('#cancelBtn-".$id_encode."').removeClass(\"not-allowed\");
                                        }, 5000);
                                        
                                    });

                                    e.preventDefault();
                                },
                                shown: function(modal, form) {
                                    console.log(form)
                                },
                                buttons: [{
                                    text: 'Simpan',
                                    submit: true,
                                    class: 'btn btn-success btn-submit-load',
                                    id: 'submitBtn-".$id_encode."',
                                    handler: function(modal) {
                                        console.log('masuk buttons');
                                    }
                                }]
                            });

                            $('.modal').attr('data-keyboard', 'false');
                            $('.modal').attr('data-backdrop', 'static');
                            $('.modal').removeClass('fade');

                            /** jQuery Tambahan */
                            /** =============== */
                            $(document).ready(function() {
                                
                            });
                        </script>";

                $delete = '<a href="#" id="btn-delete" class="btn btn-icon btn-danger btn-sm"
                                title="Menghapus grup" onclick="_delete(' . "'" . $output->id . "'" . ')">
                                <i class="far fa-trash-alt fa-fw"></i> Hapus
                            </a>';

                if ($this->ion_auth_acl->has_permission('manage_group_edit') && $this->ion_auth_acl->has_permission('manage_group_delete')) {
                    $row[] = '<div class="buttons">' . $edit . '' . $delete . '</div>';
                } elseif ($this->ion_auth_acl->has_permission('manage_group_edit')) {
                    $row[] = '<div class="buttons">' . $edit . '</div>';
                } elseif ($this->ion_auth_acl->has_permission('manage_group_delete')) {
                    $row[] = '<div class="buttons">' . $delete . '</div>';
                }

                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->m_manage_groups->count_all(),
                "recordsFiltered" => $this->m_manage_groups->count_filtered(),
                "data" => $data,
            );
            echo json_encode($output);
        }
    }

    public function ajax_delete($id_groups)
    {
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth_acl->has_permission('manage_group_delete')) {
                $this->m_manage_groups->_delete($id_groups);
                echo json_encode(array("status" => true));
            }
        }
    }
}
