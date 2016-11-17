<?php
	session_start();
	if (!isset($_SESSION["language"]))
		$_SESSION["language"] = "English";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MovieKitten</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
		<link href="css/searchBar.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		
		<!-- Custom Scripts 
		
		<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,ro', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
-->
<script src="js/jquery.js"></script>
<script src="js/userServices.js"></script>
<script src="js/langSettings.js"></script>
<!--<script src="js/switchLanguage.js"></script>-->
<!--  
<style>
    div#google_translate_element div.goog-te-gadget-simple{background-color:#202020;}
		div#google_translate_element div.goog-te-gadget-simple{border:none;}
    div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span{color:#808080}
		div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:hover{color:#fff}
</style>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- data-dismiss="alert" -->
</head>

<body>

<!-- alertbox -->
<div style="display:none; position:fixed; z-index:1031; top:0px; right:10px; width:200px;" id="alerter" class="alert alert-warning alert-dismissible fade in collapse" role="alert" >
  <button type="button" onclick="closeAlert()" class="close" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <p id="alerterMessage"></p>
</div>


<!--New movie -->
  	<div class="modal fade bd-example-modal-lg third" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							 <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">
									<?php
										require "bin/connect.php";
										$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 7");
										$row = $result->fetch_assoc();
										echo $row[$_SESSION["language"]];
									?>
								</h4>
								</div>
							<form class="form-inline">
								<div class="modal-body">
											<div class="form-group">
														<label for="exampleInputFile">
															<?php
																require "bin/connect.php";
																$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 8");
																$row = $result->fetch_assoc();
																echo $row[$_SESSION["language"]];
															?>
														</label>
														<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
												</div>
											<div class="form-group">
												<input type="text" class="form-control" id="exampleInputName2" placeholder="Movie title">
											</div>
										<br></br>
											  <div class="form-group">
														<label for="exampleTextarea">
															<?php
																require "bin/connect.php";
																$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 9");
																$row = $result->fetch_assoc();
																echo $row[$_SESSION["language"]];
															?>
														</label>
														<textarea class="form-control" id="exampleTextarea" style="width:100%"></textarea>
													</div>
													
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">
										<?php
											require "bin/connect.php";
											$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 10");
											$row = $result->fetch_assoc();
											echo $row[$_SESSION["language"]];
										?>
									</button>
										</form>
							</div>
						</div>
					</div>
				</div>
<!-- -->


<!-- Register -->
				<div id="registerDiv" class="modal fade bd-example-modal-sm second" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							 <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">
									<?php
										require "bin/connect.php";
										$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 5");
										$row = $result->fetch_assoc();
										echo $row[$_SESSION["language"]];
									?>
								</h4>
								</div>
							<form id="register_form" class="form-inline" action="bin/sign_up.php" method="post">
								<div class="modal-body">
											<div class="form-group">
												<input required type="text" class="form-control" name="name" placeholder="Name">
											</div>
											<div class="form-group">
												<input required type="password" class="form-control" name="p1" placeholder="Password">
											</div>
											<div class="form-group">
												<input required type="password" class="form-control" name="p2" placeholder="Confirm password">
											</div>
											<div class="form-group">
												<input required type="email" class="form-control" name="email" placeholder="E-mail">
											</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">
										<?php
											require "bin/connect.php";
											$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 10");
											$row = $result->fetch_assoc();
											echo $row[$_SESSION["language"]];
										?>
									</button>
							</form>
							</div>
						</div>
					</div>
				</div>
<!-- login -->
				<div id="loginDiv" class="modal fade bd-example-modal-sm first" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							 <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Login</h4>
								</div>
							<form id="login_form" class="form-inline" action="bin/login.php" method="post">
								<div class="modal-body">
											<div class="form-group">
												<input required type="text" class="form-control" name="name" placeholder="Name">
											</div>
											<div class="form-group">
												<input required type="password" class="form-control" name="p1" placeholder="Password">
											</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">
										<?php
											require "bin/connect.php";
											$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 10");
											$row = $result->fetch_assoc();
											echo $row[$_SESSION["language"]];
										?>
									</button>
										</form>
							</div>
						</div>
					</div>
				</div>

     <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
								<span style="font-size: 1.5em;" class="glyphicon glyphicon-home"></span>
								</a>
								<!-- MAYBE PLACE THE LANGUAGE DROPDOWN HERE
								<div id="google_translate_element" style="margin-top:1.2em;"></div>-->
            </div> 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
								<li>

									<form action="" class="search-form">
										<div class="form-group has-feedback">
											<label for="search" class="sr-only">
												<?php
													require "bin/connect.php";
													$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 11");
													$row = $result->fetch_assoc();
													echo $row[$_SESSION["language"]];
												?>
											</label>
											<input type="text" class="form-control" name="search" id="search" placeholder="search">
												<span class="glyphicon glyphicon-search form-control-feedback"></span>
										</div>
									</form>

								</li>
                    <li>
                        <a href="about.html">
							<?php
								require "bin/connect.php";
								$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 4");
								$row = $result->fetch_assoc();
								echo $row[$_SESSION["language"]];
							?>
						</a>
					</li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                     <li>
                        <a id="loginButton" style="cursor:pointer; display:block;" data-toggle="modal" data-target=".first">Login</a>
					<li>
                        <a id="registerButton" style="cursor:pointer; display:block;" data-toggle="modal" data-target="#registerDiv">
							<?php
								require "bin/connect.php";
								$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 5");
								$row = $result->fetch_assoc();
								echo $row[$_SESSION["language"]];
							?>
						</a>
                    </li>
					<li>
                        <a id="newMovieButton" style="cursor:pointer; display:none;" data-toggle="modal" data-target=".third">
							<?php
								require "bin/connect.php";
								$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 7");
								$row = $result->fetch_assoc();
								echo $row[$_SESSION["language"]];
							?>
						</a>
                    </li>
					<li>
                        <a id="logoutButton" onclick="logout()" style="cursor:pointer; display:none;">Logout</a>
                    </li>
						<!--THIS IS MY BUTTON. THERE ARE MANY LIKE IT, BUT THIS ONE IS MINE-->
					<li>
						<a id="langButton" onclick="mySwitch()" style="cursor:pointer;">
						<?php
							require "bin/connect.php";
							$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 6");
							$row = $result->fetch_assoc();
							echo $row[$_SESSION["language"]];
						?>
						</a>
					</li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
				
				
				
				
    </nav>
		

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide" >
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('images/movieKitten01.jpg');"></div>
                <div class="carousel-caption">
                    <h2>
						<?php
							require "bin/connect.php";
							$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 1");
							$row = $result->fetch_assoc();
							echo $row[$_SESSION["language"]];
						?>
					</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/colage01.jpg');"></div>
                <div class="carousel-caption">
                    <h2>
						<?php
							require "bin/connect.php";
							$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 2");
							$row = $result->fetch_assoc();
							echo $row[$_SESSION["language"]];
						?>
					</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/convo01.jpg');"></div>
                <div class="carousel-caption">
                    <h2>
						<?php
							require "bin/connect.php";
							$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 3");
							$row = $result->fetch_assoc();
							echo $row[$_SESSION["language"]];
						?>
					</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?php
						require "bin/connect.php";
						$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 1");
						$row = $result->fetch_assoc();
						echo $row[$_SESSION["language"]];
					?>
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><img src="images/movieTape01.png" style="width:1.5em;" >Movie title</img></h4>
                    </div>
                    <div class="panel-body">
											  <a href="portfolio-item.html">
													<img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
												</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <h4><img src="images/movieTape01.png" style="width:1.5em;" >Movie title</img></h4>
                    </div>
                    <div class="panel-body">
											  <a href="portfolio-item.html">
													<img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
												</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><img src="images/movieTape01.png" style="width:1.5em;" >Movie title</img></h4>
                    </div>
                    <div class="panel-body">
											  <a href="portfolio-item.html">
													<img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
												</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; MovieKitten 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
