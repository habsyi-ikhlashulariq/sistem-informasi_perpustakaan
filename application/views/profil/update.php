		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

                        <?php if ($this->session->flashdata('message') ):?>
							<?= $this->session->flashdata('message'); ?>
						<?php endif; ?>

					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="<?= base_url() ?>assets/img/<?= $user['avatar']; ?>" class="img-circle" alt="Avatar">
										
									</div>
									<div class="profile-stat">
										<div class="row">
										<h3 class="name"><?= $user['nama']; ?></h3>
										<span class="online-status status-available">Available</span>
										
										</div>
										
									</div>
								</div>
                                <div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading"></h4>
										<ul class="list-unstyled list-justify" style="text-align: center;">
											<li><a href="<?= base_url('') ?>profil/changePass/<?= $user['kd_pegawai']; ?>" class="btn btn-primary">Change Password</a></li>
											<li><a href="<?= base_url('') ?>profil/update/<?= $user['kd_pegawai']; ?>" class="btn btn-primary">Update Profil</a></li>
										</ul>
									</div>
								</div>
								
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right" style="height: 460px;">
							<!-- AWARDS -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading" style="margin-top: -50px;"><?= $judul; ?></h4>
										<ul class="list-unstyled list-justify">
                                            <?= form_open_multipart('Profil/update') ?>
                                                <li>Username : <br>
                                                    <input class="form-control" type="text" name="username" value="<?= $this->session->userdata('username') ?>" readonly>
                                                    <small class="form-text text-danger"><?= form_error('username'); ?></small>
                                                </li>
                                                    <li>Nama <br>
                                                    <input class="form-control" type="text" name="nama" value="<?= $user['nama'] ?>">
                                                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                                                </li>
                                                <li>Jenis Kelamin : <br>
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
                                                </li>
                                                <li>Telephone : <br>
                                                    <input class="form-control" type="text" name="telp" value="<?= $user['telp'] ?>">
                                                    <small class="form-text text-danger"><?= form_error('telp'); ?></small>
                                                </li>
                                                <li>Alamat : <br>
                                                    <input class="form-control" type="text" name="alamat" value="<?= $user['alamat'] ?>">
                                                    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                                </li> 
                                                <li>Foto : <br>
                                                    <input class="form-control" type="file" name="foto">
                                                    <small class="form-text text-danger"><?= form_error('foto'); ?></small><br>
                                                    <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                                                    <input class="form-control" type="hidden" name="kd_pegawai" value="<?= $user['kd_pegawai'] ?>">
                                                </li>
                                        </form>
                                </ul>
									</div>
								</div>
								<!-- END AWARDS -->
								
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		