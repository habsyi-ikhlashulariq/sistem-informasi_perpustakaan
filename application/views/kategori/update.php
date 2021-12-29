
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
										<input type="hidden" class="form-control" placeholder="Kode Buku" name="kd_kategori_buku" value="<?= $kategori['kd_kategori_buku'] ?>">
										<br>
										<label for="judul">Kategori Buku :</label>
										<input type="text" class="form-control" placeholder="Judul Buku" name="nama" value="<?= $kategori['nama'] ?>">
										<small class="form-text text-danger"><?= form_error('nama'); ?></small>
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
	
