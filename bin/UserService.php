<?php

	class UserService
	{
		private $stringSize = 30;
		private $errorMessages = "";
		private $user;
		
		#region PasswordEncoding/DecodingMethods
		private function GetSalt()
		{
			$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
			return $salt;
		}
		
		private function HashPassword($p)
		{
			$hash = password_hash($p,PASSWORD_DEFAULT);
			return $hash;
		}
		
		
		#endregion
		
		#region ErrorMessagesMethods
		private function AddErrorMessage($message)
		{
			if($this->errorMessages == "")
			{
				$this->errorMessages=$message;
			}
			else
			{
				$this->errorMessages=$this->errorMessages." <br> ".$message;
			}
		}
		
		public function GetErrorMessages()
		{
			$messages=$this->errorMessages;
			$this->errorMessages="";
			
			return $messages;
		}
		#endregion
		
		#region IsValidForRegisterMethods
		
		private function UserIsValid($user)
		{
			$ok=true;
			
			if(strlen($user)>$this->stringSize)
			{
				$this->AddErrorMessage("The maximum size for username is 30 characters.");
				$ok=false;
			}
			require "connect.php";
			$result = mysqli_query($conn, "SELECT * FROM users WHERE Name = '".$user."' ");
			if(mysqli_num_rows($result)>0)
			{
				$this->AddErrorMessage("This username is already taken.");
				$ok=false;
			}

			if (preg_match('/[^A-Za-z0-9]/', $user))
			{
				$this->AddErrorMessage("Use only letters and numbers.");
				$ok=false;
			}
			
			return $ok;

		}
		
		private function PasswordIsValid($p1,$p2)
		{
			$ok=true;
						
			if($p1!=$p2)
			{
				$this->AddErrorMessage("The password and the confirmation password do not match.");
				$ok=false;
			}
			
			return $ok;
		}
		
		private function EmailIsValid($email)
		{
			$ok=true;
			require "connect.php";
			$result = mysqli_query($conn, "SELECT * FROM users WHERE Email = '".$email."' ");
			if(mysqli_num_rows($result)>0)
			{
				$this->AddErrorMessage("This email is already taken.");
				$ok=false;
			}
			if(strlen($email)>$this->stringSize)
			{
				$this->AddErrorMessage("The maximum size for email is 30 characters.");
				$ok=false;
			}
			
			return $ok;
		}
		
		private function UserIsNotAlreadySet()
		{
			session_start();
			if($this->user == NULL && (!isset($_SESSION['user'])))
			{
				return true;
			}
			else
			{
				$this->AddErrorMessage("An user session already exists!");
				return false;
			}
		}
		#endregion 
		
		public function RegisterUser($user,$p1,$p2,$email)
		{
			$isPasswordValid = $this->UserIsValid($user);
			$isUserValid = $this->PasswordIsValid($p1,$p2);
			$isEmailValid = $this->EmailIsValid($email);
			$sess = $this->UserIsNotAlreadySet();
			
			if($isPasswordValid&&$isUserValid&&$isEmailValid&&$sess)
			{
				$p1=$this->HashPassword($p1);
				
				$this->user = $user;
				require "connect.php";
				mysqli_query($conn,"INSERT INTO users (Name, Password, Email) VALUES ('".$user."', '".$p1."', '".$email."')"); 
				$_SESSION['user'] = $this;
				return array(true,NULL);
			}
			else
			{
				$nMessages=$this->GetErrorMessages();
				return array(false,$nMessages);
			}
		}

		public function LoginUser($user,$p)
		{   require "connect.php";
			$result = mysqli_query($conn,"SELECT * FROM users WHERE Name = '".$user."' ");
			$sess = $this->UserIsNotAlreadySet();
			
			if(!$sess)
			{
				$nMessages=$this->GetErrorMessages();
				return array(false,$nMessages);
			}
			
			if(mysqli_num_rows($result)==0)
			{
				$this->AddErrorMessage("This user doesn't exist");
				$nMessages=$this->GetErrorMessages();
				return array(false,$nMessages);
			}
			
		
			$row=mysqli_fetch_assoc($result);
			$password=$row['Password'];
			#echo"$password";
			
			if(!password_verify($p,$row['Password']))
			{
				$this->AddErrorMessage("Invalid Password.");
				$nMessages=$this->GetErrorMessages();
				return array(false,$nMessages);
			}
			else
			{
				$this->user = $user;
				$_SESSION['user'] = $this;
				return array(true,NULL);
			}
			
		}
		
		
		
	}




?>