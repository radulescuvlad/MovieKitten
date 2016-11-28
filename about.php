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
	<link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
		<link href="css/searchBar.css" rel="stylesheet">
		
		
		
		<!--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">-->
<link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- data-dismiss="alert" -->
	<script src="js/jquery.js"></script>
	<script src="js/userServices.js"></script>
	<script src="js/langSettings.js"></script>
</head>

<body>

<div style="display:none; position:fixed; z-index:1031; top:0px; right:10px; width:200px; background-image:url(images/Cat-cute-background.jpg); background-size: cover; background-repeat:  no-repeat;color: #F0FFFF;border-color: #faebcc" id="alerter" class="alert alert-warning alert-dismissible fade in collapse" role="alert" >
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
							<form id="addmovie_form" class="form-inline" action="bin/addMovie.php" method="post" enctype="multipart/form-data">
								<div class="modal-body">
											<div class="form-group">
												<input type="text" name="movieTitle" class="form-control" placeholder="Movie title">
											</div>
										<br/><br/>
											<div class="form-group">
														<label for="exampleInputFile">
														<?php
															require "bin/connect.php";
															$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 8");
															$row = $result->fetch_assoc();
															echo $row[$_SESSION["language"]];
														?>
														</label>
														<input type="file" name="imageUpload" id="imageUpload" class="form-control-file" aria-describedby="fileHelp">
												</div>
										<br/><br/>
											  <div class="form-group">
														<label for="exampleTextarea">
														<?php
															require "bin/connect.php";
															$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 9");
															$row = $result->fetch_assoc();
															echo $row[$_SESSION["language"]];
														?>
														</label>
														<textarea style="resize:none;" rows="8" cols="70" name="textArea" class="form-control" style="width:100%"></textarea>
													</div>
										<br/><br/>		
											<div class="form-group">
											<label for="rating" class="control-label">
											<?php
												require "bin/connect.php";
												$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 15");
												$row = $result->fetch_assoc();
												echo $row[$_SESSION["language"]];
											?>
											</label>
											<input id="rating" name="rating" class="rating rating-loading " data-min="0" data-max="5" data-step="1" value="0" data-size="xs">
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
                <a class="navbar-brand" href="index.php">
								<span style="font-size: 1.5em;" class="glyphicon glyphicon-home"></span>
								</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
								<li>

									<form action="getSearchResult.php" method="post" class="search-form">
										<div class="form-group has-feedback">
											<label for="search" class="sr-only">Search</label>
											<input type="text" class="form-control" name="search" id="search" placeholder="search">
												<span class="glyphicon glyphicon-search form-control-feedback"></span>
										</div>
									</form>

								</li>
                    <li class="active">
                        <a href="about.php">
						<?php
							require "bin/connect.php";
							$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 4");
							$row = $result->fetch_assoc();
							echo $row[$_SESSION["language"]];
						?>
						</a>
                    </li>
                     <li>
                        <a id="loginButton" style="cursor:pointer; display:block;" data-toggle="modal" data-target=".first">Login</a>
                    </li>
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

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
					<?php
						require "bin/connect.php";
						$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 12");
						$row = $result->fetch_assoc();
						echo $row[$_SESSION["language"]];
					?>
                    MovieKitten
                </h1>
				<!--
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">About</li>
                </ol>
				-->

            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="Images/ccat.jpg" alt="">

            </div>
            <div class="col-md-6">
                <p>
				<?php
					require "bin/connect.php";
					$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 16");
					$row = $result->fetch_assoc();
					echo $row[$_SESSION["language"]];
				?>
				</p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Team Members -->









        <div class="row">





            <div class="col-lg-12">
                <h2 class="page-header">
				<?php
					require "bin/connect.php";
					$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 17");
					$row = $result->fetch_assoc();
					echo $row[$_SESSION["language"]];
				?>
				</h2>

            </div>
            <div class="col-md-4 text-center">
                <div class="thumbnail">

                    <img class="img-responsive" src="Images/pirat.png" alt="">
                    <div class="caption">
                        <h3>Eduard BABUSCOV<br>
                            <small>
							<?php
								require "bin/connect.php";
								$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 18");
								$row = $result->fetch_assoc();
								echo $row[$_SESSION["language"]];
							?>
							</small>
                        </h3>
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/eduard.babuscov?fref=hovercard"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
							<!--
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
							-->
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="Images/review-ninja-250.png" alt="">
                    <div class="caption">
                        <h3>Vlad RADULESCU<br>
                            <small><?php echo $row[$_SESSION["language"]]; ?></small>
                        </h3>
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/vlad.radulescu.5648"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
							<!--
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
							-->
                        </ul>



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

	
	






</body>

</html>
