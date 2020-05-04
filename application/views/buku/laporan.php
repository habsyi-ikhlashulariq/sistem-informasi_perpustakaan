
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
												<th>Kode Buku</th>
												<th>Judul Buku</th>
												<th>Penulis</th>
												<th>Penerbit</th>
												<th>Tahun Terbit</th>
												<th>Jumlah Tersedia</th>
												
											</tr>
										</thead>
										<tbody>
											<?php foreach ($buku as $buku) : ?>
											<tr>
												<td><?= $buku['kd_buku'] ?></td>
												<td><?= $buku['judul'] ?></td>
												<td><?= $buku['penulis'] ?></td>
												<td><?= $buku['penerbit'] ?></td>
												<td><?= $buku['thn_terbit'] ?></td>
												<td><?= $buku['jumlah'] ?></td>
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
	
