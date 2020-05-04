
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<?php if ($this->session->flashdata('flash') ):?>
							<div class="alert alert-success alert-dismissible" role="alert">
							<?= $this->session->flashdata('flash'); ?> <strong><?= $user['nama'] ?></strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
							</div>
						<?php endif; ?>
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Hari Ini</h3>
							<p class="panel-subtitle"><?= date('l, d-m-Y'); ?></p>
						</div>
						<div class="panel-body">
							<div class="row">
							
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="lnr lnr-inbox"></i></span>
										<p>
											<span class="number"><?= $countBuku; ?></span>
											<span class="title"><a href="<?= base_url() ?>buku">Data Buku</a></span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="lnr lnr-users"></i></span>
										<p>
											<span class="number"><?= $countAnggota; ?></span>
											<span class="title"><a href="<?= base_url() ?>anggota">Data Anggota</a></span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="lnr lnr-user"></i></span>
										<p>
											<?php if ($this->session->userdata('level') == "Kepala Perpustakaan") :?>
												<span class="number"><?= $countPegawai; ?></span>
											<?php elseif ($this->session->userdata('level') == "Petugas Perpustakaan"): ?>
												<span class="number"><?= $countPegawaiPe; ?></span>
											<?php endif; ?>
											<span class="title"><a href="<?= base_url() ?>pegawai">Data Pegawai</a></span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="lnr lnr-pushpin"></i></span>
										<p>
											<span class="number"><?= $countPeminjaman; ?></span>
											<span class="title"><a href="<?= base_url() ?>pinjaman">Data Pinjaman</a></span>
										</p>
									</div>
								</div>
													
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
	
