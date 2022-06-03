<?php defined('BASEPATH') or exit('No direct script access allowed');
class C_manage_user extends CI_Controller
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
        $this->load->model('main_manage/m_manage_users');
    }

    public function index()
    {
        redirectDashboard();
    }

    public function ajax_list()
    {
        if ($this->ion_auth->logged_in()) {
            $list = $this->m_manage_users->get_datatables();
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $output) {
                $no++;
                $row = array();
                
                if ($output->last_login) {
                    $last_login = unTohum($output->last_login);
                } else {
                    $last_login = "Belum Login";
                }

                $row[] = "#" . $output->unique_id;

                if ($output->username == true) {
                    $username = $output->username;
                } else {
                    $username = "-";
                }

                $row[] = $username;
                $row[] = $output->full_name;
                $row[] = $last_login;
                $row[] = groupBadge($output->group_name);

                $id_encode = encrypt_code($output->idUser);

                $out_url = base_url('manage/user/edit/'.$id_encode);
                
                $groupsModal = $this->m_manage_users->get_id_name_group();
                $currentGroupsModal = $this->ion_auth->get_users_groups($output->idUser)->row();
                
                if ($groupsModal) {
                    $outGroups = "";
                    foreach ($groupsModal as $key => $value) {
                        $outGroups .= "{ id: '".$value->id."', text: '".strtoupper($value->name)." - #".$value->description."'},";
                    }
                }
                
                $edit = "<button class=\"btn btn-warning btn-sm\" id=\"modal-edit-".$id_encode."\"><i class=\"far fa-edit fa-fw\"></i> Ubah</button>

                        <script>
                            var modal_body_".$id_encode." = '';
                            modal_body_".$id_encode." += '<form action=\"#\" id=\"form-".$id_encode."\" class=\"needs-validation\" novalidate=\"\" method=\"POST\" accept-charset=\"utf-8\">';

                            modal_body_".$id_encode." +=    '<div class=\"row\">';
                            modal_body_".$id_encode." +=    '    <div class=\"form-group col-lg-5 col-xs-12 col-md-12 mb-3 input-".$id_encode."\">';
                            modal_body_".$id_encode." +=    '        <label for=\"inputUserName-".$id_encode."\">Nama Pengguna</label>';
                            modal_body_".$id_encode." +=    '        <input type=\"text\" name=\"inputUserName-".$id_encode."\" value=\"". $username ."\" id=\"inputUserName-".$id_encode."\" class=\"form-control\" placeholder=\"Nama pengguna\" required=\"required\"  pattern=\"^[a-zA-Z0-9_.-]*$\">';
                            modal_body_".$id_encode." +=    '        <div class=\"help-block with-errors\"></div>';
                            modal_body_".$id_encode." +=    '    </div>';

                            modal_body_".$id_encode." +=    '    <div class=\"form-group col-lg-7 col-xs-12 col-md-12 mb-3 input-".$id_encode."\">';
                            modal_body_".$id_encode." +=    '        <label for=\"inputUserFullName-".$id_encode."\">Nama Lengkap</label>';
                            modal_body_".$id_encode." +=    '        <input type=\"text\" name=\"inputUserFullName-".$id_encode."\" value=\"". $output->full_name ."\" id=\"inputUserFullName-".$id_encode."\" class=\"form-control\" placeholder=\"Nama lengkap pengguna\" required=\"required\"  pattern=\"^[a-zA-Z ]*$\">';
                            modal_body_".$id_encode." +=    '        <div class=\"help-block with-errors\"></div>';
                            modal_body_".$id_encode." +=    '    </div>';
                            modal_body_".$id_encode." +=    '</div>';
                            
                            modal_body_".$id_encode." +=    '<div class=\"row\">';
                            modal_body_".$id_encode." +=    '    <div class=\"form-group col-lg-6 col-xs-12 col-md-12 mb-3 input-".$id_encode."\">';
                            modal_body_".$id_encode." +=    '        <label for=\"inputUserPhone-".$id_encode."\">Nomor Handphone <small><i>(Contoh: 0897859xxxx)</i></small></label>';
                            modal_body_".$id_encode." +=    '        <input type=\"tel\" name=\"inputUserPhone-".$id_encode."\" value=\"". $output->phone ."\" id=\"inputUserPhone-".$id_encode."\" class=\"form-control phone-number-".$id_encode."\" placeholder=\"Nomor Handphone\" required=\"required\">';
                            modal_body_".$id_encode." +=    '        <div class=\"help-block with-errors\"></div>';
                            modal_body_".$id_encode." +=    '    </div>';
                            modal_body_".$id_encode." +=    '    <div class=\"form-group col-lg-6 col-xs-12 col-md-12 mb-3 input-".$id_encode."\">';
                            modal_body_".$id_encode." +=    '        <label for=\"inputUserEmail\">Surat Elektronik (E-mail) <small><i>(Contoh: username@domain.com)</i></small></label>';
                            modal_body_".$id_encode." +=    '        <input type=\"email\" name=\"inputUserEmail-".$id_encode."\" value=\"". $output->email ."\" id=\"inputUserEmail-".$id_encode."\" class=\"form-control\" placeholder=\"Surat Elektronik (E-mail)\" required=\"required\" pattern=\"^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$\">';
                            modal_body_".$id_encode." +=    '        <div class=\"form-text text-muted\">Tulis dalam huruf kecil semua</div>';
                            modal_body_".$id_encode." +=    '        <div class=\"help-block with-errors\"></div>';
                            modal_body_".$id_encode." +=    '    </div>';
                            modal_body_".$id_encode." +=    '</div>';

                            modal_body_".$id_encode." +=    '<div class=\"row\">';
                            modal_body_".$id_encode." +=    '    <div class=\"form-group col-lg-12 col-xs-12 col-md-12 mb-3 input-".$id_encode."\">';
                            modal_body_".$id_encode." +=    '        <label for=\"inputUserGroupsSelect-".$id_encode."\">Grup Pengguna</label>';
                            modal_body_".$id_encode." +=    '        <select name=\"inputUserGroupsSelect-".$id_encode."\" class=\"form-control select2 custom-select groups_select-".$id_encode."\" id=\"inputUserGroupsSelect-".$id_encode."\" required=\"required\" data-width=\"100%\">';
                            modal_body_".$id_encode." +=    '            <option></option>';
                            modal_body_".$id_encode." +=    '        </select>';
                            modal_body_".$id_encode." +=    '        <div class=\"help-block with-errors\"></div>';
                            modal_body_".$id_encode." +=    '    </div>';
                            modal_body_".$id_encode." +=    '</div>';

                            modal_body_".$id_encode." +=    '<div class=\"row\">';
                            modal_body_".$id_encode." +=    '    <div class=\"form-group col-lg-6 col-xs-12 col-md-12 mb-3\">';
                            modal_body_".$id_encode." +=    '        <label for=\"inputUserPassword-".$id_encode."\">Kata Sandi <small><i>Pastikan kata sandi yang Anda tuliskan kuat!</i></small></label>';
                            modal_body_".$id_encode." +=    '        <input type=\"password\" name=\"inputUserPassword-".$id_encode."\" id=\"inputUserPassword-".$id_encode."\" class=\"form-control pwstrength-".$id_encode."\" placeholder=\"Kata Sandi\" autocomplete=\"new-password\" minlength=\"8\" data-indicator=\"pwindicator-".$id_encode."\">';
                            modal_body_".$id_encode." +=    '        <small class=\"form-text text-muted\">Minimal 8 karakter, maksimal 30 karakter.</small>';
                            modal_body_".$id_encode." +=    '        <div class=\"help-block with-errors\"></div>';
                            modal_body_".$id_encode." +=    '        <div id=\"pwindicator-".$id_encode."\" class=\"pwindicator\">';
                            modal_body_".$id_encode." +=    '            <div class=\"bar\"></div>';
                            modal_body_".$id_encode." +=    '            <div class=\"label\"></div>';
                            modal_body_".$id_encode." +=    '        </div>';
                            modal_body_".$id_encode." +=    '    </div>';
                            modal_body_".$id_encode." +=    '    <div class=\"form-group col-lg-6 col-xs-12 col-md-12 mb-3\">';
                            modal_body_".$id_encode." +=    '        <label for=\"inputUserPasswordConfirm-".$id_encode."\">Konfirmasi Kata Sandi</label>';
                            modal_body_".$id_encode." +=    '        <input type=\"password\" name=\"inputUserPasswordConfirm-".$id_encode."\" id=\"inputUserPasswordConfirm-".$id_encode."\" class=\"form-control\" placeholder=\"Konfirmasi Kata Sandi\" autocomplete=\"new-password\" minlength=\"8\" data-match=\"#inputUserPassword-".$id_encode."\" data-match-error=\"Bidang Konfirmasi Kata Sandi tidak sama dengan bidang Kata Sandi.\">';
                            modal_body_".$id_encode." +=    '        <small class=\"form-text text-muted\">Minimal 8 karakter, maksimal 30 karakter.</small>';
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
                                title: 'Ubah Pengguna ".$output->unique_id."',
                                footerClass: 'bg-whitesmoke',
                                body: modal_body_".$id_encode.",
                                created: function(modal) {
                                    modal.find('.modal-footer').prepend(
                                        '<button type=\"button\" class=\"btn btn-secondary\" id=\"cancelBtn\" data-dismiss=\"modal\" onclick=\"reload_page()\">Batal</button>'
                                    );
                                    modal.find('.modal-md').toggleClass('modal-lg');
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
                                $('.groups_select-".$id_encode."').attr(
                                    'data-placeholder', 'Pilih satu grup'
                                );

                                var dataSelect = [ ". $outGroups . " ];

                                $('.groups_select-".$id_encode."').select2({
                                    data: dataSelect,
                                    language: 'id'
                                }).val('". $currentGroupsModal->id ."').trigger('change');

                                $('.pwstrength-".$id_encode."').pwstrength();

                                $('.phone-number-".$id_encode."').toArray().forEach(function(field){
                                    new Cleave(field, {
                                    phone: true,
                                    phoneRegionCode: 'id'
                                    });
                                });
                            });
                        </script>

                        ";

                $delete = '<a href="#" id="btn-delete" class="btn btn-icon btn-danger btn-sm"
                            title="Menghapus pengguna" onclick="_delete(' . "'" . $id_encode . "'" . ')">
                            <i class="far fa-trash-alt fa-fw"></i> Hapus
                        </a>';

                if ($this->ion_auth_acl->has_permission('manage_user_edit') && $this->ion_auth_acl->has_permission('manage_user_delete')) {
                    $row[] = '<div class="buttons">' . $edit . '' . $delete . '</div>';
                } elseif ($this->ion_auth_acl->has_permission('manage_user_edit')) {
                    $row[] = '<div class="buttons">' . $edit . '</div>';
                } elseif ($this->ion_auth_acl->has_permission('manage_user_delete')) {
                    $row[] = '<div class="buttons">' . $delete . '</div>';
                }
                
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->m_manage_users->count_all(),
                "recordsFiltered" => $this->m_manage_users->count_filtered(),
                "data" => $data,
            );

            echo json_encode($output);
        }
    }

    public function ajax_delete($id_users)
    {
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth_acl->has_permission('manage_user_delete')) {
                $this->m_manage_users->_delete(decrypt_code($id_users));
                echo json_encode(array("status" => true));
            }
        }
    }
}
