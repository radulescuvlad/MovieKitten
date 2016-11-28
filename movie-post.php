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
<?php


	require "bin/connect.php";

		$id = mysqli_real_escape_string($conn, $_GET['id']);
    

		$result = mysqli_query($conn,"SELECT Name, HEX(UserId), Text, FilePath, Rating FROM movies WHERE Id = unhex('".$id."') ");
		
		
		if($row = mysqli_fetch_array($result))
		{
		$userId=$row[1];
		$result2 = mysqli_query($conn,"SELECT Name FROM users WHERE HEX(Id) = '".$userId."' ");
		$row2=mysqli_fetch_array($result2);
		$userr=$row2[0];
		$result = mysqli_query($conn, "SELECT * FROM langlabels WHERE id = 19");
		$byRow = $result->fetch_assoc();
echo'

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">'.$row[0].'
                    <small>'.$byRow[$_SESSION["language"]].'
					<a href="#">'.$userr.'</a>
                    </small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

		<!-- Blog Sidebar Widgets Column -->
            <div style="float:right;" class="col-md-4">


                <!-- Side Widget Well -->
                <div class="well" style="  padding:0px;" >
                   <img style=" height: auto; width: 100%;" src="bin/'.$row[3].'" alt="">
                </div>

            </div>
		
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">



                <!-- Rating -->
                <input id="input-1"  name="input-1" class="rating rating-disabled " readonly data-min="0" data-max="5" data-step="1" value="'.$row[4].'" data-show-clear="false" data-show-caption="false"  data-size="xs">

                <hr>

                <!-- Post Content -->
                <p class="lead"><pre style="white-space: pre-wrap; word-break: keep-all; background:white; border:none;">'.$row[2].'</pre></p>

                <hr>

                <!-- Blog Comments -->

				
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <textarea name="commentForm" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>
	';
	
	$javascriptText='<script>
	alertBox = document.getElementById("alerter");
	alertBoxMessage = document.getElementById("alerterMessage");
	alertBoxMessage.innerHTML = "In order to post comments please log in!";
	alertBox.style.display = "block";
			</script>';
			
		$javascriptText2='<script>
	alertBox = document.getElementById("alerter");
	alertBoxMessage = document.getElementById("alerterMessage");
	alertBoxMessage.innerHTML = "This account it is not valid anymore!";
	alertBox.style.display = "block";
			</script>';
	
	if(isset($_POST['commentForm']))
	{ 
		if(isset($_SESSION['user']))
		{	
			$auxUser=$_SESSION['user'];
			$commentUserIdGet = mysqli_query($conn,"SELECT HEX(Id) FROM users WHERE Name = '".$auxUser."' ");
			$commentUserId=mysqli_fetch_array($commentUserIdGet);
			if($commentUserId)
			{
				$textt=mysqli_real_escape_string($conn, $_POST['commentForm']);
				mysqli_query($conn,"INSERT INTO coments (Id, Text, MovieId, UserId, Date) VALUES (unhex(replace(uuid(),'-','')), '".$textt."', unhex('".$id."'), unhex('".$commentUserId[0]."'), NOW())"); 
			}
			else
			{
				echo $javascriptText2;
			}			
		}
		else
		{
			echo $javascriptText;
		}
		unset($_POST['commentForm']);
	}    

	$result3 = mysqli_query($conn,"SELECT Text, HEX(UserId), Date FROM coments WHERE MovieId = unhex('".$id."') ORDER BY Date ");
	if($result3)
	{
		while($row3=mysqli_fetch_array($result3))
		{
			$dat=$row3[1];
			$result4 = mysqli_query($conn,"SELECT Name FROM users WHERE Id = unhex('".$dat."')");
			$row4=mysqli_fetch_array($result4);
		
			echo'				
                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="64" width="64" class="media-object" src="images/cat-shape.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">'.$row4[0].'
                            <small>'.$row3[2].'</small>
                        </h4>
                        <p><pre style="white-space: pre-wrap; word-break: keep-all; background:white; border:none;">'.$row3[0].'</pre></p>
                    </div>
                </div>

             <!-- Comment -->';
		}
	}
echo'
            </div>

            

        </div>
        <!-- /.row -->
		';

		}
?>
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
	

<script src="js/star-rating.js" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


	<script src="js/movieServices.js"></script> 

</body>

</html>
