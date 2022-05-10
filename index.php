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
							<div class="col">
								<div class="card text-center">
									<img src=<?php echo $img ?> class="card-img-top" alt="...">
									<div class="card-body">
										<h5 class="card-title"><?php echo $titre ?></h5>
										<p class="card-text"><?php echo $description ?></p>
										<button type="button" class="btn btn-primary">Acheter</button>
										<?php if (isset($_SESSION["id_role"]) and $_SESSION["id_role"] === 1) : ?>
											<a href="editprod.php?id=<?php echo $product["id"] ?>" class="btn btn-dark" id="modif-btn">Modifier</a>
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
<?php
require_once("components/footer.php")
?>
