
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<?php if ($this->session->flashdata('flash') ):?>
						<div class="alert alert-success alert-dismissible" role="alert">
							Data Anggota <strong> berhasil </strong> <?= $this->session->flashdata('flash'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
						</div>
						<?php endif; ?>
						
						<div class="panel panel-headline">
							<div class="panel-body">
								<div class="row">
										<form class="navbar-form navbar-right" method="post" action="">
											<div class="input-group">
												<input type="text" value="" class="form-control" placeholder="Cari Pegawai" name="keyword">
												<span class="input-group-btn"><button type="button" class="btn btn-primary">Cari</button></span>
											</div>
										</form>
										<div class="panel-heading">
											<h3 class="panel-title"><?= $judul; ?></h3><br>
											<?php if ($this->session->userdata('level') == "Kepala Perpustakaan") : ?>
												<a href="<?= base_url('pegawai/tambah') ?>" class="btn btn-primary"> <i class="lnr lnr-plus-circle"></i> <span>Tambah Data Pegawai</span></a>

												<a class="btn btn-default" href="<?php echo base_url('import/pegawai_format');?>" target="_blank"><i class="lnr lnr-download"></i> <span>Download Excel Format</a>

												<a href="<?= base_url('import/pegawai') ?>" class="btn btn-success"><i class="lnr lnr-upload"></i> <span>Import Pegawai</span></a>

											<?php endif; ?>
											</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Kode Anggota</th>
												<th>Nama</th>
												<th>Username</th>
												<th>Alamat</th>
												<th>Tools</th>
												
											</tr>
										</thead>
										<tbody>
											<?php if (empty($pegawai)) : ?>
												<div class="alert alert-danger alert-dismissible" role="alert">
													Data yang anda <strong> cari </strong> tidak di temukan
														<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
												</div>
											<?php endif; foreach ($pegawai as $pegawai) : ?>
											<tr>
												<td><?= $pegawai['kd_pegawai'] ?></td>
												<td><?= $pegawai['nama'] ?></td>
												<td><?= $pegawai['username'] ?></td>
												<td><?= $pegawai['alamat'] ?></td>
												<?php if ($this->session->userdata('level') == "Kepala Perpustakaan") : ?>
												<td>
													<a href="<?= base_url() ?>pegawai/update/<?= $pegawai['kd_pegawai'] ?>" class="btn btn-warning"><i class="lnr lnr-sync"></i> <span>Update</span></a>
													<a href="<?= base_url() ?>pegawai/delete/<?= $pegawai['kd_pegawai'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Di Hapus');"><i class="lnr lnr-trash"></i> <span>Delete</span></a>
												</td>
												<?php endif; ?>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
	
