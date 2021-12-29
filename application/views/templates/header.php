<!doctype html>
<html lang="en">

<head>
	<title>Sistem Informasi Perpustakaan</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href=""><img src="<?=base_url() ?>assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
			<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">	
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url() ?>assets/img/<?= $user['avatar']; ?>" class="img-circle" alt="Avatar"> <span><?= $user['nama']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?=base_url('profil') ?>"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="<?= base_url('login/logout') ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li <?php if( $this->uri->segment(1) == "Welcome"){ "class:'acive';";} ?>>
							<a href="<?= site_url('Welcome') ?>" ><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
						</li>
						<li <?= $this->uri->segment('1') == "Buku" ? 'class="active"': '' ?>>
							<a href="<?= base_url('Kategori') ?>" ><i class="lnr lnr-inbox"></i> <span>Data Kategori Buku</span></a>
						</li>
						<li <?= $this->uri->segment('1') == "Buku" ? 'class="active"': '' ?>>
							<a href="<?= base_url('Buku') ?>" ><i class="lnr lnr-inbox"></i> <span>Data Buku</span></a>
						</li>
						<li>
							<a href="<?= base_url('Anggota/index') ?>" class=""><i class="lnr lnr-users"></i> <span>Data Anggota</span></a>
						</li>
						<li>
							<a href="<?= base_url('Pegawai/index') ?>" class=""><i class="lnr lnr-user"></i> <span>Data Pegawai</span></a>
						</li>
						<li>
							<a href="<?= base_url('Pinjaman/index') ?>" class=""><i class="lnr lnr-pushpin"></i> <span>Data Pinjaman</span></a>
						</li>
						<?php if ($this->session->userdata('level') == "Kepala Perpustakaan") : ?>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="<?= base_url('buku/laporanBuku') ?>" class="">Laporan Data Buku</a></li>
									<li><a href="<?= base_url('anggota/laporanAnggota') ?>" class="">Laporan Data Anggota</a></li>
									<li><a href="<?= base_url('pinjaman/laporanPeminjaman') ?>" class="">Laporan Data Pinjam Buku</a></li>
								</ul>
							</div>
						</li>
						<?php endif; ?>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->