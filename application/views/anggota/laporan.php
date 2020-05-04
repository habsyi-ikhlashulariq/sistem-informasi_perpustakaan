
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
										<h3 class="panel-title"><?= $judul; ?></h3><br>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Kode Anggota</th>
												<th>Nama</th>
												<th>Jenis Kelamin</th>
												<th>Prodi</th>
												<th>Alamat</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($anggota as $anggota) : ?>
											<tr>
												<td><?= $anggota['kd_anggota'] ?></td>
												<td><?= $anggota['nama'] ?></td>
												<td><?= $anggota['jk'] ?></td>
												<td><?= $anggota['prodi'] ?></td>
												<td><?= $anggota['alamat'] ?></td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
	
