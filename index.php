<?php
session_start();

if (!isset($_SESSION["email"])) {
	header("Location: login.php");
}
require_once(dirname(__FILE__) . "/configs/database.php");
require_once("components/header.php");
require_once("components/navbar.php");
$products = $dbh->query("SELECT * FROM products");
?>

<div id="content" class="container-fluid">
	<?php if (!isset($_GET["categ"])) : ?>
		<br>
		<h1>Bienvenue sur le site de Logo</h1>
		<br>
		<br>
		<br>
		<div id="contenu">
			<div id="carouselExampleFade" class="carousel slide carousel-fade w-75 p-3" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="img/cs-1.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="img/cs-2.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="img/cs-3.png" class="d-block w-100" alt="...">
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	<?php endif ?>
	<?php if (isset($_GET["categ"])) : ?>
		<?php if (!isset($_GET["modif"])) : ?>
			<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditTitle" aria-hidden="true">
			<?php else : ?>
				<div class="modal fade show" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalEditTitle" style="display: block;" aria-modal="true" role="dialog">
				<?php endif ?>
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Modifier un produit</h5>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php if (!isset($_GET["categ"])) : ?>
								<form action="functions/edit.php" enctype="multipart/form-data" class="col-md-6" method="post">
								<?php else : ?>
									<form action="functions/edit.php?categ=<?php echo $_GET["categ"] ?><?php if (isset($_GET["id"])) echo "&id=" . $_GET["id"] ?>" enctype="multipart/form-data" class="col-md-6" method="post">
									<?php endif ?>
									<br>
									<?php if (isset($_GET["message"])) : ?>
										<div class="alert alert-danger" role="alert">
											<?php echo $_GET["message"]; ?>
										</div>
									<?php endif ?>
									<?php if (isset($_GET["modif"]) && isset($_GET["id"])) : ?>
										<?php $req = $dbh->query("SELECT * FROM products WHERE id = " . $_GET["id"]);
										$row = $req->fetch();
										?>
										<div class="form-group">
											<input type="text" name="nomprod" class="form-control" placeholder="Entrez le nom du produit" value="<?php
																																					echo $row["nom"];
																																					?>">
										</div>
										<br>
										<div class="form-group">
											<textarea name="description" class="form-control" placeholder="Entrez la description du produit"><?php echo $row["description"] ?></textarea>
										</div>
										<br>
										<div class="form-group">
											<input type="text" name="prixht" class="form-control" placeholder="Indiquez le prix ht du produit" value="<?php echo $row["prixht"] ?>">
										</div>
										<br>
										<div class="form-group">
											<input type="text" name="tva" class="form-control" placeholder="Indiquez la tva du produit" value="<?php echo $row["tva"] ?>">
										</div>
										<br>
										<div class="form-group">
											<input type="text" name="prixttc" class="form-control" placeholder="Indiquez le prix ttc du produit" value="<?php echo $row["prixttc"] ?>">
										</div>
										<br>
									<?php endif ?>
									<div class="form-group">
										<?php if (isset($_GET["categ"])) : ?>
											<input type="text" name="gender" class="form-control" value=<?php echo $_GET["categ"]; ?> readonly>
										<?php else : ?>
											<input type="text" name="gender" class="form-control" placeholder="Indiquez le genre du produit">
										<?php endif ?>
									</div>
									<br>
									<div class="form-group">
										<input type="file" name="fileToUpload" id="fileToUpload">
									</div>

									<br>
						</div>
						<div class="modal-footer">
							<?php if (isset($_GET["categ"])) : ?>
								<a href="index.php?categ=<?php echo $_GET["categ"] ?>" type="button" class="btn btn-danger">Annuler</a>
							<?php else : ?>
								<a href="index.php" type="button" class="btn btn-danger">Annuler</a>
							<?php endif ?>
							<button type="submit" class="btn btn-primary">Modifier le produit</button>
						</div>
						</form>
					</div>
				</div>
				</div>

				<br>
				<h1>Nos produits</h1>
				<?php if ($_GET["categ"] == "homme") : ?>
					<br>
					<h2>Homme</h2>
					<br>
					<div id="prod-homme">
						<div class="row row-cols-3 row-cols-md-3 g-4">
							<?php foreach ($products as $product) : ?>
								<?php if ($product["gender"] == "homme") : ?>
									<?php $img = "/img" . "/products" . "/" . $product["alt"] . ".png";
									$titre = $product["nom"];
									$description = $product["description"]
									?>
									<div class="col-xs-12 col-sm-6 col-md-4">
										<div class="card text-center">
											<img src=<?php echo $img ?> class="card-img-top img-fluid" alt="...">
											<div class="card-body">
												<h5 class="card-title"><?php echo $titre ?></h5>
												<p class="card-text"><?php echo $description ?></p>
												<button type="button" class="btn btn-primary">Acheter</button>
												<?php if (isset($_SESSION["id_role"]) and $_SESSION["id_role"] === 1) : ?>
													<a href="index.php?categ=<?php echo $_GET["categ"] ?>&id=<?php echo $product["id"] ?>&modif" class="btn btn-dark" id="prod<?php echo $product["id"] ?>">
														Modifier
													</a>
													<a href="deleteprod.php?id=<?php echo $product["id"] ?>" class="btn btn-danger" id="delete-btn">Supprimer</a>
												<?php endif ?>
											</div>
										</div>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif ?>
				<?php if ($_GET["categ"] == "femme") : ?>
					<br>
					<h2>Femme</h2>
					<br>
					<div id="prod-femme">
						<div class="row row-cols-3 row-cols-md-3 g-4">
							<?php foreach ($products as $product) : ?>
								<?php if ($product["gender"] == "femme") : ?>
									<?php $img = "/img" . "/products" . "/" . $product["alt"] . ".png";
									$titre = $product["nom"];
									$description = $product["description"]
									?>
									<div class="col">
										<div class="card">
											<img src=<?php echo $img ?> class="card-img-top" alt="...">
											<div class="card-body">
												<h5 class="card-title"><?php echo $titre ?></h5>
												<p class="card-text"><?php echo $description ?></p>
												<button type="button" class="btn btn-primary">Acheter</button>
												<?php if (isset($_SESSION["id_role"]) and $_SESSION["id_role"] === 1) : ?>
													<a href="index.php?categ=<?php echo $_GET["categ"] ?>&id=<?php echo $product["id"] ?>&modif" class="btn btn-dark" id="prod<?php echo $product["id"] ?>">
														Modifier
													</a>
													<a href="deleteprod.php?id=<?php echo $product["id"] ?>" class="btn btn-danger" id="delete-btn">Supprimer</a>
												<?php endif ?>
											</div>
										</div>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif ?>
				<?php if ($_GET["categ"] == "enfant") : ?>
					<br>
					<h2>Enfants</h2>
					<br>
					<div id="prod-enfants">
						<div class="row row-cols-3 row-cols-md-3 g-4">
							<?php foreach ($products as $product) : ?>
								<?php if ($product["gender"] == "enfant") : ?>
									<?php $img = "/img" . "/products" . "/" . $product["alt"] . ".png";
									$titre = $product["nom"];
									$description = $product["description"]
									?>
									<div class="col">
										<div class="card">
											<img src=<?php echo $img ?> class="card-img-top" alt="...">
											<div class="card-body">
												<h5 class="card-title"><?php echo $titre ?></h5>
												<p class="card-text"><?php echo $description ?></p>
												<button type="button" class="btn btn-primary">Acheter</button>
												<?php if (isset($_SESSION["id_role"]) and $_SESSION["id_role"] === 1) : ?>
													<a href="index.php?categ=<?php echo $_GET["categ"] ?>&id=<?php echo $product["id"] ?>&modif" class="btn btn-dark" id="prod<?php echo $product["id"] ?>">
														Modifier
													</a>
													<a href="deleteprod.php?id=<?php echo $product["id"] ?>" class="btn btn-danger" id="delete-btn">Supprimer</a>
												<?php endif ?>
											</div>
										</div>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif ?>
			<?php endif ?>
			</div>
			<?php if (isset($_GET["message"])) : ?>
				<div class="modal-backdrop fade show"></div>
				<div class="modal-backdrop fade show"></div>
			<?php endif ?>
			<?php if (isset($_GET["modif"])) : ?>
				<div class="modal-backdrop fade show"></div>
				<div class="modal-backdrop fade show"></div>
			<?php endif ?>
			<?php
			require_once("components/footer.php")
			?>
