<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:29:18 GMT -->

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $title ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
    <meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg" />
    <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Bootstrap core CSS     -->
    <link href="<?= base_url() ?>assets/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?= base_url() ?>assets/assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?= base_url() ?>assets/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="<?= base_url() ?>assets/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/assets/css/google-roboto-300-700.css" rel="stylesheet" />
    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="<?= base_url('assets/leaflet-search/src/leaflet-search.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/leaflet-search/src/leaflet-search.css') ?>" />
    <!-- DropZone -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?= base_url() ?>assets/assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="#" class="simple-text">
                    GIS Fotografi
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
                    gf
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class=" <?= ($active == "lokasi") ? "active" : "" ?>">
                        <a data-toggle="collapse" href="#tablesFotografi">
                            <i class="material-icons">place</i>
                            <p>Lokasi Fotografi
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse <?= ($active == "lokasi") ? "in" : "" ?>" id="tablesFotografi">
                            <ul class="nav">
                                <li class=" <?= ($active_nav == "tambah_lokasi") ? "active" : "" ?>">
                                    <a href="<?= site_url('lokasi/tambah_lokasi') ?>">Tambah Lokasi</a>
                                </li>
                                <li class=" <?= ($active_nav == "tabel_lokasi") ? "active" : "" ?>">
                                    <a href="<?= site_url('lokasi') ?>">Tabel Lokasi</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class=" <?= ($active == "kategori") ? "active" : "" ?>">
                        <a data-toggle="collapse" href="#tablesKategori">
                            <i class="material-icons">category</i>
                            <p>Kategori
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse <?= ($active == "kategori") ? "in" : "" ?>" id="tablesKategori">
                            <ul class="nav">
                                <li class=" <?= ($active_nav == "tambah_kategori") ? "active" : "" ?>">
                                    <a href="<?= site_url('kategori/tambah') ?>">Tambah Kategori</a>
                                </li>
                                <li class=" <?= ($active_nav == "tabel_kategori") ? "active" : "" ?>">
                                    <a href="<?= site_url('kategori') ?>">Tabel Kategori</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li class=" <?= ($active == "titik_rute") ? "active" : "" ?>">
                        <a href="<?= site_url('titik_rute') ?>">
                            <i class="material-icons">my_location</i>
                            <p>Tabel Titik Rute</p>
                        </a>
                    </li>
                    <li class=" <?= ($active == "rute") ? "active" : "" ?>">
                        <a href="<?= site_url('rute') ?>">
                            <i class="material-icons">timeline</i>
                            <p>Tabel Rute</p>
                        </a>
                    </li> -->
                    <li class=" <?= ($active == "map") ? "active" : "" ?>">
                        <a href="<?= site_url('map') ?>">
                            <i class="material-icons">explore</i>
                            <p>Peta</p>
                        </a>
                    </li>
                    <li class=" <?= ($active == "pengguna") ? "active" : "" ?>">
                        <a href="<?= site_url('pengguna') ?>">
                            <i class="material-icons">people</i>
                            <p>Tabel Pengguna</p>
                        </a>
                    </li>
                    <li class=" <?= ($active == "saran") ? "active" : "" ?>">
                        <a href="<?= site_url('saran') ?>">
                            <i class="material-icons">trending_up</i>
                            <p>Tabel Saran</p>
                        </a>
                    </li>
                    <li class=" <?= ($active == "rating") ? "active" : "" ?>">
                        <a href="<?= site_url('rating') ?>">
                            <i class="material-icons">star_rate</i>
                            <p>Tabel Rating</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>