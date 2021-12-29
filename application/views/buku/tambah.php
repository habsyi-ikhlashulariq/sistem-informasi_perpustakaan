
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-body">
							<div class="row">					
								<div class="panel-heading">
									<h3 class="panel-title"><?= $judul; ?></h3>
								</div>
								<div class="panel-body">
                                    
                                    <form action="<?= base_url('Buku/tambah') ?>" method="post">
										<label for="kd_buku">Kode Buku :</label>
										<input type="text" class="form-control" placeholder="Kode Buku" name="kd_buku" 
										value="<?= $kd ?>" readonly>
										<small class="form-text text-danger"><?= form_error('kd_buku'); ?></small>
										<br>
										<label for="kd_buku">Kategori Buku :</label>
										<select name="kd_kategori_buku" id="" class="form-control">
											<?php 
												foreach ($kategori as $val) {
											?>
											<option value="<?= $val['kd_kategori_buku'] ?>"><?= $val['nama'] ?></option>
											<?php 
											}
											 ?>
										</select>
										<small class="form-text text-danger"><?= form_error('kd_kategori_buku'); ?></small>
										<br>
										<label for="judul">Judul Buku :</label>
										<input type="text" class="form-control" placeholder="Judul Buku" name="judul" 
										value="<?= set_value('judul'); ?>">
										<small class="form-text text-danger"><?= form_error('judul'); ?></small>
										<br>
										<label for="penuis">Penulis Buku :</label>
										<input type="text" class="form-control" placeholder="Pengarang Buku" name="penulis"
										value="<?= set_value('penulis'); ?>">
										<small class="form-text text-danger"><?= form_error('penulis'); ?></small>
										<br>
										<label for="penerbit">Penerbit Buku :</label>
										<input type="text" class="form-control" placeholder="Penerbit Buku" name="penerbit"
										value="<?= set_value('penerbit'); ?>">
										<small class="form-text text-danger"><?= form_error('penerbit'); ?></small>
										<br>
										<label for="thn_terbit">Tahun Terbit  :</label>
										<input type="text" class="form-control" placeholder="Tahun Terbit Buku" name="thn_terbit"
										value="<?= set_value('thn_terbit'); ?>">
										<small class="form-text text-danger"><?= form_error('thn_terbit'); ?></small>
                                        <br>
										<label for="thn_terbit">Jumlah  :</label>
										<input type="text" class="form-control" placeholder="Jumlah Buku" name="jml_buku"
										value="<?= set_value('jml_buku'); ?>">
										<small class="form-text text-danger"><?= form_error('jml_buku'); ?></small>
                                        <br>
                                        <input type="submit" class="btn btn-primary" value="Simpan Data">
                                    </form>
								</div>
							
							
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
	
