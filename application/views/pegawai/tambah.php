
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
										<label for="kd_pegawai">Kode Pegawai :</label>
										<input type="text" class="form-control" placeholder="Kode Pegawai" name="kd_pegawai" value="<?= set_value('kd_pegawai'); ?>">
										<small class="form-text text-danger"><?= form_error('kd_pegawai'); ?></small>
										<br>
										<label for="nama">Nama Pegawai :</label>
										<input type="text" class="form-control" placeholder="Nama" name="nama" value="<?= set_value('nama'); ?>">
										<small class="form-text text-danger"><?= form_error('nama'); ?></small>
										<br>
										<label for="username">Username :</label>
										<input type="text" class="form-control" placeholder="Username" name="username" >
										<small class="form-text text-danger"><?= form_error('username'); ?></small>
										<br>
										<label for="password1">Password :</label>
										<input type="password" class="form-control" placeholder="Password" name="password1">
										<small class="form-text text-danger"><?= form_error('password1'); ?></small>
										<br>
										<label for="password">Confirm Password :</label>
										<input type="password" class="form-control" placeholder="Confirm Password" name="password2">
										<small class="form-text text-danger"><?= form_error('password2'); ?></small>
										<br>
										<label for="jk">Jenis Kelamin :</label>
										<select class="form-control" name="jk" value="<?= set_value('jk'); ?>">
										<option value="">Pilih Jenis Kelamin</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
										</select>
										<small class="form-text text-danger"><?= form_error('jk'); ?></small>
										<br>
										<label for="tgl_kembali">Telephone :</label>
										<input type="text" class="form-control" placeholder="Telephone" name="telp" value="<?= set_value('telp'); ?>">
										<small class="form-text text-danger"><?= form_error('telp'); ?></small>
										<br>
										<label for="alamat">Alamat Pegawai  :</label>
										<input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= set_value('alamat'); ?>">
										<small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                        <br>
										<input type="hidden" class="form-control" name="level" value="Petugas Perpustakaan">
										<input type="hidden" class="form-control" name="avatar" value="default.png">
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
	
