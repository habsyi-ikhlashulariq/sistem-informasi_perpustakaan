
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
										<label for="kd_anggota">Kode Anggota :</label>
										<input type="text" class="form-control" placeholder="Kode Anggota" name="kd_anggota">
										<small class="form-text text-danger"><?= form_error('kd_anggota'); ?></small>
										<br>
										<label for="nama">Nama Anggota :</label>
										<input type="text" class="form-control" placeholder="Nama Anggota" name="nama">
										<small class="form-text text-danger"><?= form_error('nama'); ?></small>
										<br>
										<label for="jk">Jenis Kelamin :</label>
										<select class="form-control" name="jk" >
										<option value="">Pilih Jenis Kelamin</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
										</select>
										<small class="form-text text-danger"><?= form_error('jk'); ?></small>
										<br>
										<label for="jurusan">Jurusan :</label>
										<select class="form-control" name="prodi" >
										<option value="">Pilih Kelas Dan Jurusan</option>
										<option value="Sistem Informasi">Sistem Informasi</option>
										<option value="Teknik Informatika">Teknik Informatika</option>
										</select>
										<small class="form-text text-danger"><?= form_error('prodi'); ?></small>
										<br>
										<label for="alamat"> Alamat :</label>
										<input type="text" class="form-control" placeholder="Alamat Anggota" name="alamat">
										<small class="form-text text-danger"><?= form_error('alamat'); ?></small>
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
	
