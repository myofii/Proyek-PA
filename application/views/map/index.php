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
                <a class="navbar-brand" href="#"> Maps </a>
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
                            <i class="material-icons">add_location</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Maps Lokasi Fotografi</h4>
                            <div id="mapsLokasi" style="width: stretch; height: 500px;" class="map"></div>
                            <script>
                                // Jenis Peta
                                var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibXlvZmlpMjEiLCJhIjoiY2w1N3Fpd241MXVjNjNwdDduaDJwdzg5ZSJ9.qu1fg1kV_P8SFC_hJ31jcw', {
                                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                    id: 'mapbox/streets-v11'
                                });

                                var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibXlvZmlpMjEiLCJhIjoiY2w1N3Fpd241MXVjNjNwdDduaDJwdzg5ZSJ9.qu1fg1kV_P8SFC_hJ31jcw', {
                                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                    id: 'mapbox/satellite-v9'
                                });

                                var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                });

                                var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibXlvZmlpMjEiLCJhIjoiY2w1N3Fpd241MXVjNjNwdDduaDJwdzg5ZSJ9.qu1fg1kV_P8SFC_hJ31jcw', {
                                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                    id: 'mapbox/dark-v10'
                                });

                                var mymap = L.map('mapsLokasi', {
                                    center: [0.5071, 101.4478],
                                    zoom: 13,
                                    layers: [peta3]
                                });

                                setTimeout(function() {
                                    mymap.invalidateSize()
                                }, 500);

                                // <?php foreach ($kategori as $key => $value) { ?>
                                //     var <?= $value->nama ?> = L.layerGroup();
                                // <?php } ?>

                                var baseMaps = {
                                    "Street": peta3,
                                    "Light": peta1,
                                    "Satellite": peta2,
                                    "Dark": peta4
                                };

                                // geojson
                                var kota = L.layerGroup();
                                var geo = $.getJSON("<?= base_url('json/pekanbaru.json') ?>", function(data) {
                                    geoLayer = L.geoJson(data, {
                                        style: function(feature) {
                                            return {
                                                opacity: 0.5,
                                                color: 'gray',
                                                fillopacity: 1.0,
                                                fillcolor: 'blue',
                                            }
                                        },
                                    }).addTo(kota);

                                });

                                var controlSearch = new L.Control.Search({
                                    position: 'topright',
                                    layer: allLokasi,
                                    initial: false,
                                    zoom: 19,
                                    marker: false
                                });

                                mymap.addControl(controlSearch);

                                // layer semua lokasi
                                var allLokasi = new L.LayerGroup();

                                <?php foreach ($allLokasi as $key => $value) { ?>
                                    lokasi = L.marker([<?= $value->lat_coord ?>, <?= $value->long_coord ?>]).addTo(allLokasi)
                                        .bindPopup("<h2>Detail Point</h2><h3><img src='<?= base_url('uploads/'.$value->background) ?>'><table><tr><td>Nama Lokasi</td><td>:</td><td><?= $value->nama ?></td></tr><tr><td>Alamat</td><td>:</td><td><?= $value->alamat ?></td></tr><tr><td>Kategori</td><td>:</td><td><?= $value->nama_kategori ?></td></tr><tr><td>Latitude</td><td>:</td><td><?= $value->lat_coord ?></td></tr><tr><td>Longitude</td><td>:</td><td><?= $value->long_coord ?></td></tr><tr><td>Rating</td><td>:</td><td><?= $value->rating ?></td></tr></h3></table>");
                                <?php } ?>

                                mymap.addLayer(allLokasi);

                                mymap.invalidateSize(1);
                                var geoj = L.layerGroup([kota])
                                var marker = L.layerGroup([allLokasi])
                                var overlayMaps = {
                                    "<strong>Search Point </strong>": marker,
                                    "<strong>Poligon Pekanbaru</strong>": geoj
                                };

                                L.control.layers(baseMaps, overlayMaps).addTo(mymap);
                            </script>
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