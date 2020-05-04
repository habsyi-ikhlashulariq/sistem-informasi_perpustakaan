
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<?php if ($this->session->flashdata('flash') ):?>
						<div class="alert alert-success alert-dismissible" role="alert">
							Data Buku <strong> berhasil </strong> <?= $this->session->flashdata('flash'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
						</div>
						<?php endif; ?>
						<div class="panel panel-headline">
							<div class="panel-body">
								<div class="row">
								<form class="navbar-form navbar-right" method="post" action="">
										<div class="input-group">
											<input type="text" value="" class="form-control" placeholder="Cari Buku" name="keyword">
											<span class="input-group-btn"><button type="submit" class="btn btn-primary">Cari</button></span>
										</div>
								</form>
									<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
										<a href="<?= base_url('buku/tambah') ?>" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Tambah Data Buku</span></a>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Kode Buku</th>
												<th>Judul Buku</th>
												<th>Penulis</th>
												<th>Penerbit</th>
												<th>Tahun Terbit</th>
												<th>Jumlah</th>
												<th>Tools</th>
											</tr>
										</thead>
										<tbody>
											<?php if (empty($buku)) : ?>
												<div class="alert alert-danger alert-dismissible" role="alert">
													Data yang anda <strong> cari </strong> tidak di temukan
														<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
												</div>
											<?php endif; foreach ($buku as $buku) : ?>
											<tr>
												<td><?= $buku['kd_buku'] ?></td>
												<td><?= $buku['judul'] ?></td>
												<td><?= $buku['penulis'] ?></td>
												<td><?= $buku['penerbit'] ?></td>
												<td><?= $buku['thn_terbit'] ?></td>
												<td><?= $buku['jumlah'] ?></td>
												<td>
													<a href="<?= base_url() ?>buku/update/<?= $buku['kd_buku'] ?>" class="btn btn-warning"><i class="lnr lnr-sync"></i> <span>Update</span></a>
													<a href="<?= base_url() ?>buku/hapus/<?= $buku['kd_buku'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau DI Hapus');"><i class="lnr lnr-trash"></i> <span>Delete</span></a>
												</td>
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
	
