
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
                                    
                                    <form action="<?= base_url('Import/pegawai_import') ?>" method="post" enctype="multipart/form-data">
										<label for="judul">Pegawai :</label>
                                        <input type="file" name="pegawai_import" class="form-control" placeholder="Enter Kategori File" id="pegawai_import" required>
										<small class="form-text text-danger"><?= form_error('pegawai_import'); ?></small>
										<br>
                                        <input type="submit" class="btn btn-primary" value="Import">
                                    </form>
								</div>
							
							
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
	
