
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
                                    
                                    <form action="<?= base_url('Import/anggota_import') ?>" method="post" enctype="multipart/form-data">
										<label for="judul">Import Anggota :</label>
                                        <input type="file" name="anggota_import" class="form-control" id="anggota_import" required>
										<small class="form-text text-danger"><?= form_error('anggota_import'); ?></small>
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
	
