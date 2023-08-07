<?php 

class Database{

	//connect to database
	private function connect()
	{
		if(!$con = mysqli_connect("localhost","root","root","farming"))
		{
			die("could not connect to the database");
		}

		return $con;	
	}

	public function db_read($query)
	{
		$con = $this->connect();
		$result = mysqli_query($con,$query);

		if($result && mysqli_num_rows($result) > 0)
		{
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				
				$data[] = $row;
			}

			return $data;
		}

		return false;

	}

}

class User extends Database
{

	function login($POST)
	{
		$Error = "";
		 
		//validate
		//email
		if(!filter_var($POST['email'],FILTER_VALIDATE_EMAIL))
		{
			$Error = "wrong email or password";
		}

		//password
		if(empty($POST['password']))
		{
			$Error = "wrong email or password";
		}

		
		if($Error == "")
		{
			$email	= addslashes($POST['email']);
			$password	= addslashes($POST['password']);
	 
			//get user
			$query = "select * from users where username = '$email' && password = '$password' ";
			$result = $this->db_read($query);
	 
	 		if($result)
			{
				$row = $result[0];
	 				
	 			$_SESSION['user_id'] = $row['id'];

	 			return "";
	 		}else{
	 			$Error = "wrong email or password";
	 		}

		}

		return $Error;
	}

	
}


