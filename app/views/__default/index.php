<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="123">

    <title><?= $this->getTitle()?></title>

    <!-- Styles -->
     <link href="<?= $this->asset('bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?= $this->asset('css/MucuaApi.css')?>" rel="stylesheet">
    <link rel="icon" href="<?= $this->asset('icones/logotipo1.png') ?>" type="image/icon" />
</head>

<body>
   

	<div class=" container-index">


	
		<section class="col-md-12 section-1 ">

		<div class=" col-md-2"></div>

		<article class="col-md-8">
			<center>
				<h4>&copy; WELLCOME THE  MÚCUA-API FRAMEWORK &copy;</h4>

				<p>Uma forma nova de organização de projectos.</p>
			</center>

			</article>
			
		<div class="col-md-2"></div>

	</section>

	

	

		<section class=" col-md-12 section-2">

			<div class="col-md-1"></div>

				<article class="col-md-4 ">

                                    <img class="img" src="<?= $this->asset('icones/config.png')?>">

					<h5>HOW TO CONFIG</h5>

					<p>You can to config begining for study this Api framework</p>

				</article>
				<div class="col-md-2"></div>
				<article class="col-md-4 ">

                                    <img class="img" src="<?= $this->asset('icones/config.png')?>">

					<h5>HOW TO BUILD</h5>

					<p>You will need to know more this Api framework, because it doesn't have as start when don't if know it self...</p>

				</article>
				

			<div class="col-md-1"></div>

		</section>

<section class="col-md-12 section-1 ">

		<div class="col-md-1"></div>

				<article class="col-md-4 articles ">

                                    <img class="img" src="<?= $this->asset('icones/config.png')?>">

					<h5>HOW TO CONFIG</h5>

					<p>You can to config begining for study this Api framework</p>

				</article>
				<div class="col-md-2"></div>
				<article class="col-md-4 articles">

                                    <img class="img" src="<?= $this->asset('icones/config.png')?>">

					<h5>HOW TO BUILD</h5>

					<p>You will need to know more this Api framework, because it doesn't have as start when don't if know it self...</p>

				</article>
				

			<div class="col-md-1"></div>

	</section>


</div>
    <footer class="col-md-12">
			<h3>&copy; Múcua-API - <?= date('Y') ?></h3>

		</footer>

    <!-- Scripts -->
    <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
    <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
</body>
</html>
