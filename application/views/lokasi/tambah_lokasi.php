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
                <a class="navbar-brand" href="#"> Tambah Lokasi Fotografi </a>
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
                        <form id="FormTambah" method="post" action="<?= site_url('lokasi/tambah_lokasi') ?>" class="form-horizontal">
                            <div class="card-header card-header-text" data-background-color="rose">
                                <h4 class="card-title">Form Tambah Lokasi</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="inputMap" style="width: stretch; height: 400px;" class="map"></div>
                                    </div>
                                    <div class="col-md-5 col-md-offset">
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
                                        <div class="row">
                                            <label class="col-sm-3 label-on-left">Nama Lokasi</label>
                                            <div class="col-sm-8">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="nama" class="form-control" required="true" value="<?= set_value('nama') ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 label-on-left">Kategori</label>
                                            <br>
                                            <div class="col-lg-5 col-md-6 col-sm-3">
                                                <select class="selectpicker" name="kategori" data-style="btn btn-rose btn-round" title="Single Select" data-size="5" required="required">
                                                    <option disabled selected value="">Pilih Kategori</option>
                                                    <?php
                                                    foreach ($kategori as $key => $value) {
                                                    ?>
                                                        <option value="<?= $value->id ?>"><?= $value->nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 label-on-left">Alamat</label>
                                            <div class="col-sm-8">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="alamat" class="form-control" required="true" value="<?= set_value('alamat') ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 label-on-left">Latitude</label>
                                            <div class="col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" name="lat_coord" type="text" required="true" name="number" number="true" id="Latitude" value="<?= set_value('lat_coord') ?>" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                                <code>*number</code>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 label-on-left">Longitude</label>
                                            <div class="col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" name="long_coord" type="text" required="true" name="number" number="true" id="Longitude" value="<?= set_value('long_coord') ?>" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                                <code>*number</code>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 label-on-left">Deskripsi</label>
                                            <div class="col-sm-8">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="deskripsi" class="form-control" value="<?= set_value('deskripsi') ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4"></label>
                                            <div class="col-md-6">
                                                <div class="form-group form-button">
                                                    <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                                                </div>
                                            </div>
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
<script>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [0.5071, 101.4478];
    }

    var mymap = L.map('inputMap').setView([0.5071, 101.4478], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibXlvZmlpMjEiLCJhIjoiY2w1N3Fpd241MXVjNjNwdDduaDJwdzg5ZSJ9.qu1fg1kV_P8SFC_hJ31jcw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    setTimeout(function() {
        mymap.invalidateSize()
    }, 500);

    mymap.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng).mouseup();
    });

    $("#Latitude, #Longitude").change(function() {
        var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        mymap.panTo(position);
    });
    mymap.addLayer(marker);
</script>
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