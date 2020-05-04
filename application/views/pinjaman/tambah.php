		<?php 
		$t =3;
		$next = mktime(0,0,0, date("m"), date("d")+$t, date("y"));
		$tglPinjam = date("Y-m-d");
		$tglKembali = date("Y-m-d", $next);
		 ?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
						<?php if ($this->session->flashdata('CekRow') ):?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								Data Anggota <strong><?= $this->session->flashdata('CekRow'); ?></strong> Ditemukan
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
							</div>
						<?php endif; ?>
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-body">
							<div class="row">					
								<div class="panel-heading">
									<h3 class="panel-title"><?= $judul; ?></h3>
								</div>
								<div class="panel-body">
                                    
                                    <form action="" method="post">
										<label for="kd">Kode Peminjaman :</label>
										<input type="text" class="form-control" placeholder="Kode Peminjaman" name="kd_peminjaman" value="<?= $kd; ?>" readonly>
										<small class="form-text text-danger"><?= form_error('kd_peminjaman'); ?></small>
										<br>
										<label for="tgl_pinjam">Tanggal Peminjaman :</label>
										<input type="text" class="form-control" placeholder="Tanggal Peminjaman" name="tgl_pinjam" value="<?= $tglPinjam; ?>" readonly>
										<small class="form-text text-danger"><?= form_error('tgl_pinjam'); ?></small>
										<br>
										<label for="tgl_kembali">Tanggal Kembali :</label>
										<input type="text" class="form-control" placeholder="Tanggal Deadline" name="tgl_deadline" value="<?= $tglKembali ?>" readonly>
										<small class="form-text text-danger"><?= form_error('tgl_deadline'); ?></small>
										<br>
										<label for="kd_buku">Kode Buku</label>
										<input type="text" class="form-control" placeholder="Kode Buku" name="kd_buku" value="<?= $buku['kd_buku'] ?>" readonly>
										<small class="form-text text-danger"><?= form_error('kd_buku'); ?></small>
                                        <br>
										<label for="kd_anggota">Kode Anggota</label>
										<input type="text" class="form-control" placeholder="Kode Anggota" name="kd_anggota">
										<small class="form-text text-danger"><?= form_error('kd_anggota'); ?></small>
										<br>
                                        <input type="submit" class="btn btn-primary" value="Simpan Data">
										<input type="hidden" name="kd_petugas" value="<?= $this->session->userdata('kd_pegawai'); ?>" readonly>
                                    </form>
								</div>
							
							
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
	
