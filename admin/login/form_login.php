<div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card bg-light" style="border-radius: 2rem;">
                    <div class="card-body p-5 text-center ">

                        <div class="text-center mb-3"><img src="user/image/background/logo-mrt.png" width="80%"></div>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                    <input type="text" class="form-control " style="border-radius: 0.9rem" id="username" name="username"
                                    placeholder="username" required>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" style="border-radius: 0.9rem" id="password" name="password"
                                    placeholder="password" required >
                            </div>

                            <button type="submit" class="btn btn-success">Login</button>
                            <br>or</br>
                            
                            <a href='form_register.php' class="btn btn-outline-success mt-2">
                                Daftar</a>
                            	<!-- Modal -->	
								<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
									data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
									aria-hidden="true">
									<div class="modal-dialog  modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-body">
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body ">
												<h4>Anda akan menghapus Event:</h4>
													<h5> <?php echo $tampil["nama_event"] ?>, <?= $tampil['nama_user'] ?></h5>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary"
													data-bs-dismiss="modal">Kembali</button>
													<a href="event/delete.php?id_user=<?php echo $tampil["id_user"] ?>" class="link-primary">
												<button class="btn btn-danger" type="submit" name="delete">Hapus</button>	
											</a>
											</div>
										</div>
									</div>
								</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->