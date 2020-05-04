
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<?php if ($this->session->flashdata('flash') ):?>
						<div class="alert alert-success alert-dismissible" role="alert">
							Buku <strong> berhasil </strong> <?= $this->session->flashdata('flash'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
						</div>
						<?php endif; ?>
						
						<div class="panel panel-headline">
							<div class="panel-body">
								<div class="row">
										<form class="navbar-form navbar-right" method="post" action="">
											<div class="input-group">
												<input type="text" value="" class="form-control" placeholder="Cari Data Peminjaman" name="keyword">
												<span class="input-group-btn"><button type="submit" class="btn btn-primary">Cari</button></span>
											</div>
										</form>
									<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
									<a href="<?= base_url('pinjaman/daftar_buku') ?>" class="btn btn-primary"> <span class=""></span><i class="lnr lnr-plus-circle"></i> <span>Tambah Data Peminjaman</span></a>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Kode Peminjaman</th>
												<th>Tanggal Peminjaman</th>
												<th>Tanggal Kembali</th>
												<th>ID Anggota</th>
												<th>ID Buku</th>
												<th>Terlambat</th>
												<th>Tools</th>
											</tr>
										</thead>
										<tbody>
											<?php if (empty($pinjaman)) : ?>
												<div class="alert alert-danger alert-dismissible" role="alert">
													Data yang anda <strong> cari </strong> tidak di temukan
														<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
												</div>
												
											<?php endif; foreach ($pinjaman as $pinjaman) : ?>
											<tr>
												<td><?= $pinjaman['kd_peminjaman'] ?></td>
												<td><?= $pinjaman['tgl_pinjam'] ?></td>
												<td><?= $pinjaman['tgl_deadline'] ?></td>
												<td><?= $pinjaman['nama'] ?></td>
												<td><?= $pinjaman['judul'] ?></td>
												<td>
												<?php
													$tgl_dateline= date_create($pinjaman['tgl_deadline']);
													$tgl_kembali= date_create(date('Y-m-d'));
													$lambat= date_diff($tgl_dateline, $tgl_kembali)->days;
													
													$denda = $lambat * 1000;
													if ($tgl_dateline < $tgl_kembali) {
														if ($lambat > 0) {
															echo "<font color='red'>$lambat hari<br>(Rp $denda)</font>";
														}
														else {
															echo $lambat." hari";
														}
													}
												?>
												</td>
												<td>
													<a href="<?= base_url() ?>pinjaman/perpanjang/<?= $pinjaman['kd_peminjaman'] ?>" class="btn btn-warning"><i class="lnr lnr-undo"></i> <span>Perpanjang</span></a>
													<a href="<?= base_url() ?>pinjaman/pengembalian/<?= $pinjaman['kd_peminjaman'] ?>" class="btn btn-danger"><i class="lnr lnr-exit-up"></i> <span>Kembalikan</span></a>
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
	
