
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
                                    
                                    <form action="" method="post">
										<input type="hidden" class="form-control" placeholder="Kode Buku" name="kd_buku" value="<?= $buku['kd_buku'] ?>">
										<br>
										<label for="judul">Judul Buku :</label>
										<input type="text" class="form-control" placeholder="Judul Buku" name="judul" value="<?= $buku['judul'] ?>">
										<small class="form-text text-danger"><?= form_error('judul'); ?></small>
										<br>
										<label for="penulis">Penlis :</label>
										<input type="text" class="form-control" placeholder="Pengarang Buku" name="penulis" value="<?= $buku['penulis'] ?>">
										<small class="form-text text-danger"><?= form_error('penulis'); ?></small>
										<br>
										<label for="penerbit">Penerbit :</label>
										<input type="text" class="form-control" placeholder="Penerbit Buku" name="penerbit" value="<?= $buku['penerbit'] ?>">
										<small class="form-text text-danger"><?= form_error('penerbit'); ?></small>
										<br>
										<label for="thn_terbit">Tahun Terbit :</label>
										<input type="text" class="form-control" placeholder="Tahun Terbit Buku" name="thn_terbit" value="<?= $buku['thn_terbit'] ?>">
										<small class="form-text text-danger"><?= form_error('thn_terbit'); ?></small>
                                        <br>
										<label for="thn_terbit">Jumlah Buku:</label>
										<input type="text" class="form-control" placeholder="Jumlah Buku" name="jml_buku" value="<?= $buku['jumlah'] ?>">
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
	
