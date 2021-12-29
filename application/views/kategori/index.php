
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<?php if ($this->session->flashdata('flash') ):?>
						<div class="alert alert-success alert-dismissible" role="alert">
							Data Kategori <strong> berhasil </strong> <?= $this->session->flashdata('flash'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
						</div>
						<?php endif; ?>
						<div class="panel panel-headline">
							<div class="panel-body">
								<div class="row">
								<form class="navbar-form navbar-right" method="post" action="">
										<div class="input-group">
											<input type="text" value="" class="form-control" placeholder="Cari Kategori Buku" name="keyword">
											<span class="input-group-btn"><button type="submit" class="btn btn-primary">Cari</button></span>
										</div>
								</form>
									<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
										<a href="<?= base_url('kategori/tambah') ?>" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Tambah Kategori</span></a>

										<a class="btn btn-default" href="<?php echo base_url('import/kategori_format');?>" target="_blank"><i class="lnr lnr-download"></i> <span>Download Excel Format</a>
										<a href="<?= base_url('import/kategori') ?>" class="btn btn-success"><i class="lnr lnr-upload"></i> <span>Import Kategori</span></a>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Kode Kategori Buku</th>
												<th>Kategori Buku</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php if (empty($kategori)) : ?>
												<div class="alert alert-danger alert-dismissible" role="alert">
													Data yang anda <strong> cari </strong> tidak di temukan
														<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
												</div>
											<?php endif; foreach ($kategori as $val) : ?>
											<tr>
												<td><?= $val['kd_kategori_buku'] ?></td>
												<td><?= $val['nama'] ?></td>
												<td>
													<a href="<?= base_url() ?>kategori/update/<?= $val['kd_kategori_buku'] ?>" class="btn btn-warning"><i class="lnr lnr-sync"></i> <span>Update</span></a>
													<a href="<?= base_url() ?>kategori/hapus/<?= $val['kd_kategori_buku'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau DI Hapus');"><i class="lnr lnr-trash"></i> <span>Delete</span></a>
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
	
