
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
										<label for="nama">Nama :</label>
										<input type="text" class="form-control" placeholder="Nama pegawai" name="nama" value="<?= $pegawai['nama'] ?>">
										<small class="form-text text-danger"><?= form_error('nama'); ?></small>
										<br>
										<label for="jk">Jenis Kelamin :</label>
										<select class="form-control" name="jk" >
											<?php foreach ($jk as $jk) :?>
												<?php if ($jk == $anggota['jk']) : ?>
													<option value="<?= $jk ?>" selected><?= $jk ?></option>
													<?php else : ?>
													<option value="<?= $jk ?>"><?= $jk ?></option>
													<?php endif; ?>
											<?php endforeach; ?>
										</select>
										<small class="form-text text-danger"><?= form_error('jk'); ?></small>
										<br>
										<label for="telp">Telephone :</label>
										<input type="text" class="form-control" placeholder="telp" name="telp" value="<?= $pegawai['telp'] ?>">
										<small class="form-text text-danger"><?= form_error('telp'); ?></small>
										<br>
										<label for="alamat">Alamat :</label>
										<input type="text" class="form-control" placeholder="Alamat pegawai" name="alamat" value="<?= $pegawai['alamat'] ?>">
										<small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                        <br>
										
                                        <br>
										<input type="submit" class="btn btn-primary" value="Simpan Data"><br>
										<input type="hidden" class="form-control" name="kd_pegawai" value="<?= $pegawai['kd_pegawai'] ?>">
										<input type="hidden" class="form-control" name="level" value="<?= $pegawai['level'] ?>">
										<input type="hidden" class="form-control" name="username" value="<?= $pegawai['username'] ?>">
										<input type="hidden" class="form-control" name="password" value="<?= $pegawai['password'] ?>">
                                    </form>
								</div>
							
							
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
	
