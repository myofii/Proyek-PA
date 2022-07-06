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
                <a class="navbar-brand" href="#"> Tambah Gambar </a>
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
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Form Tambah Gambar</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card-body">
                                        <h5>Max File: 2MB, Format: .jpg, .jpeg, .png</h5>
                                        <div class="row">
                                            <form action="<?= site_url("lokasi/add/" . $lokasi_id) ?>" enctype="multipart/form-data" id="imageUpload" class="dropzone" method="POST" style="width: 100%;">
                                        </div>
                                        <h3 class="mt-3">NB: Form akan mengupload 3 file setiap saat ketika klik tombol tambah. Jadi kalau masih ada sisa, silahkan klik tambah hingga selesai</h3>
                                        <button type="submit" id="tambah" class="btn btn-rose">Tambah</button>
                                        <a class="ml-2" href="<?= site_url("lokasi/gambar/" . $lokasi_id) ?>">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    Dropzone.autoDiscover = false;
    const myDropzone = new Dropzone(".dropzone", {
        addRemoveLinks: true,
        dictRemoveFile: "Delete",
        paramName: "files[]",
        autoProcessQueue: false,
        maxFilesize: 2,
        parallelUploads: 3,
        uploadMultiple: true,
        acceptedFiles: ".jpeg,.jpg,.png"
    });
    myDropzone.on("complete", function(file) {
        setTimeout(() => {
            myDropzone.removeFile(file);
        }, 2000);
    });
    myDropzone.on("maxfilesexceeded", (file) => {
        myDropzone.removeFile(file);
    })

    const tambah = document.getElementById("tambah");
    tambah.addEventListener('click', (e) => {
        e.preventDefault();
        myDropzone.processQueue();
    })
</script>