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
                    <li>
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

	<div class="container" >
		<?php

		require "bin/connect.php";

		$movie = mysqli_real_escape_string($conn, $_POST['search']);
		$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 20");
		$row = $result->fetch_assoc();
		
		echo'

				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">'.$row[$_SESSION["language"]].'
						'.$movie.'
						</h1>
					</div>
				</div>';
    

		$result = mysqli_query($conn,"SELECT HEX(Id), Name, HEX(UserId), Text, FilePath, Rating FROM movies WHERE Name LIKE '$movie%'");
		
		while ($row = mysqli_fetch_array($result)) 
		{ 		
			
			$userId=$row[2];
			$result2 = mysqli_query($conn,"SELECT Name FROM users WHERE HEX(Id) = '".$userId."' ");
			$row2=mysqli_fetch_array($result2);
			$userr=$row2[0];
			$small = substr($row[3], 0, 300);
			$result3 = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 19");
			$row3 = $result3->fetch_assoc();
			echo '<div class="row" style="width:80%;">
            <div class="col-md-5" style="width:30%;">
                <a href="movie-post.php?id='.$row[0].'">
                    <img class="img-responsive img-hover" src="bin/'.$row[4].'" alt="">
                </a>
            </div>
            <div class="col-md-6">
                <h3>

                    <a href="movie-post.php?id='.$row[0].'">'.$row[1].'</a>
                </h3>
                <p>'.$row3[$_SESSION["language"]].' <a>'.$userr.'</a>
                </p>
                <p>'.$small.'</p>
				<input id="input-1"  name="input-1" class="rating rating-disabled " readonly data-min="0" data-max="5" data-step="1" value="'.$row[5].'" data-show-clear="false" data-show-caption="false"  data-size="xs">
                <br/>
				<a class="btn btn-primary"  href="movie-post.php?id='.$row[0].'">Read More <i class="fa fa-angle-right"></i></a>
			
            </div>
        </div>
		
		<hr>';
		

		}
		
		
		
		
		mysqli_close($conn);

		?>


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


	<script src="js/star-rating.js" type="text/javascript"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>