
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
										<input type="hidden" class="form-control" placeholder="Kode Anggota" name="kd_anggota" value="<?= $anggota['kd_anggota'] ?>">
										<br>
										<label for="nama">Nama  :</label>
										<input type="text" class="form-control" placeholder="Nama Anggota" name="nama" value="<?= $anggota['nama'] ?>">
										<small class="form-text text-danger"><?= form_error('nama'); ?></small>
                                        <br>
										<label for="jk">Jenis Kelamin  :</label>
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
										<label for="jurusan">Jurusan :</label>
										<select class="form-control" name="prodi" >
											<?php foreach ($prodi as $prodi) :?>
												<?php if ($prodi == $anggota['prodi']) : ?>
													<option value="<?= $prodi ?>" selected><?= $prodi ?></option>
													<?php else : ?>
													<option value="<?= $prodi ?>"><?= $prodi ?></option>
													<?php endif; ?>
											<?php endforeach; ?>
										</select>
										<small class="form-text text-danger"><?= form_error('prodi'); ?></small>
										<br>
										<label for="alamat">Alamat :</label>
										<input type="text" class="form-control" placeholder="Alamat Anggota" name="alamat" value="<?= $anggota['alamat'] ?>">
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
	
