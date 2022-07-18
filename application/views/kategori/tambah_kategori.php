<div class="main-panel">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                    <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> Tambah Kategori </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">person</i>
                            <p class="hidden-lg hidden-md">Profile</p>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= site_url('auth/logout') ?>">Logout</a>
                            </li>
                        </ul>
                    </li>
                    <li class="separator hidden-lg hidden-md"></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <form id="FormTambah" method="post" action="<?= site_url('kategori/tambah') ?>" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-header card-header-text" data-background-color="rose">
                                <h4 class="card-title">Form Tambah Kategori</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <?php
                                    echo validation_errors('<div class="alert alert-rose">
                                                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                        <span>', '</span>
                                                    </div>');
                                    if ($this->session->flashdata('pesan')) {
                                        echo '<div class="alert alert-success">
                                                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                        <span><strong>
                                                            ' . $this->session->flashdata('pesan') . '
                                                        </strong></span>
                                                    </div>';
                                    }
                                    ?>
                                    <label class="col-sm-4 label-on-left">Nama Kategori</label>
                                    <div class="col-sm-6">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" name="nama_kategori" class="form-control" required="true" value="<?=set_value("nama_kategori")?>">
                                            <!-- <span class="help-block">A block of help text that breaks onto a new line.</span> -->
                                        </div>
                                    </div>
                                    <label class="col-sm-4 label-on-left">Gambar</label>
                                    <div class="fileinput fileinput-new text-center col-sm-6" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="<?= base_url() ?>assets/assets/img/image_placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                            <span class="btn btn-primary btn-round btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="url_gambar" />
                                            </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                    <label class="col-md-4"></label>
                                    <div class="col-md-6">
                                        <div class="form-group form-button">
                                            <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end col-md-12 -->
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <p class="copyright pull-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="#">Muhammad Yofi Indrawan</a>, made with love for a better web
            </p>
        </div>
    </footer>
</div>
<script type="text/javascript">
    function setFormValidation(id) {
        $(id).validate({
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });
    }
    $(document).ready(function() {
        setFormValidation('#FormTambah');
    });
</script>