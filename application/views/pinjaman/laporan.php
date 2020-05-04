
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
												<th>Kode Pengembalian</th>
												<th>ID Peminjaman</th>
												<th>Kode Petugas Pengembalian</th>
												<th>Tanggal Kembali</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($pinjaman as $pinjaman) : ?>
											<tr>
												<td><?= $pinjaman['kd_pengembalian'] ?></td>
												<td><?= $pinjaman['kd_peminjaman'] ?></td>
												<td><?= $pinjaman['kd_petugas_pengembalian'] ?></td>
												<td><?= $pinjaman['tgl_kembali'] ?></td>
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
	
