		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

						<?php if ($this->session->flashdata('message') ):?>
								<?= $this->session->flashdata('message'); ?>
							</div>
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
							<div class="profile-right" style="height: 310px;">
							<!-- AWARDS -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading" style="margin-top: -50px;"><?= $judul; ?></h4>
										<ul class="list-unstyled list-justify">
											<li>Nomor Pegawai <span><?= $user['kd_pegawai']; ?></span></li>
											<li>Nama <span><?= $user['nama']; ?></span></li>
											<li>Username <span><?= $user['username']; ?></span></li>
											<li>Password <span>***</span></li>
											<li>Jenis Kelamin <span><?= $user['jk']; ?></span></li>
											<li>Telephone <span><?= $user['telp']; ?></span></li>
											<li>Alamat <span><?= $user['alamat']; ?></span></li>
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
		