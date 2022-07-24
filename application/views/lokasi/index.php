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
                <a class="navbar-brand" href="#"> Tabel Lokasi Fotografi </a>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">#</h4>
                            <div class="toolbar">
                                <?php
                                if ($this->session->flashdata('pesan') == "Data berhasil diedit") {
                                    echo '<div class="alert alert-success">
                                                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                        <span><strong>
                                                            ' . $this->session->flashdata('pesan') . '
                                                        </strong></span>
                                                    </div>';
                                } else if ($this->session->flashdata('pesan') == "Data berhasil dihapus") {
                                    echo '<div class="alert alert-rose">
                                                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                        <span><strong>
                                                            ' . $this->session->flashdata('pesan') . '
                                                        </strong></span>
                                                    </div>';
                                }
                                ?>
                            </div>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Lokasi</th>
                                            <th>Kategori</th>
                                            <th style="width: 20%;">Alamat</th>
                                            <th>Gambar</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th class="disabled-sorting text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Lokasi</th>
                                            <th>Kategori</th>
                                            <th>Alamat</th>
                                            <th>Gambar</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th class="text-right">Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($lokasi as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?= $value->nama ?></td>
                                                <td><?= $value->nama_kategori ?></td>
                                                <td><?= $value->alamat ?></td>
                                                <td style="width:150px;">
                                                    <?php if ($value->gambar != 0) : ?>
                                                        <img src="<?= base_url('uploads/' . $value->background) ?>" class="img">
                                                    <?php else : ?>
                                                        <p>Tidak ada gambar</p>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $value->lat_coord ?></td>
                                                <td><?= $value->long_coord ?></td>
                                                <td class="text-right">
                                                    <!-- <a href="#" class="btn btn-simple btn-info btn-icon info"><i class="material-icons">info</i></a> -->
                                                    <a href="<?= site_url('lokasi/gambar/' . $value->id) ?>" class="btn btn-simple btn-primary btn-icon image"><i class="material-icons">image</i></a>
                                                    <a href="<?= site_url('lokasi/edit_lokasi/' . $value->id) ?>" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">edit</i></a>
                                                    <a href="<?= site_url('lokasi/hapus/' . $value->id) ?>" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
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