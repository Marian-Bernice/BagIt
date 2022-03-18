<?php
//connect to database class
require("../Settings/db_class.php");

/**
*User class to handle everything user related
*/
/**
 *@author Marian-Bernice Haligah
 *
 */
class user_class extends db_connection
{
	/**
	*method to add new user 
	*takes the name, email, password, country, city, contact and user role
	*/
	public function add_new_user($a, $b, $c, $d, $e, $f){

		//write the sql query to add new user
		$sql = "INSERT INTO `user`(`user_name`, `user_email`, `user_pass`, `user_country`, `user_city`, `user_contact`, `user_role`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f',2 )";
		
		//return the executed the query
		return $this->db_query($sql);
	}

	/**
	*method to edit a user
	*takes the id, name, number, email, password, country, city and contact 
	*/
	public function edit_a_user($a, $b, $c, $d, $e, $f, $g){
		
		//write the sql query to edit user
		$sql = "UPDATE `user` SET `user_name`='$b', `user_email`='$c', `user_pass`='$d', `user_country`='$e', `user_city`='$f', `user_contact`='$g'  WHERE `user_id`= '$a'";
		
		//return the executed the query
		return $this->db_query($sql);
	}

	/**
	*method to delete a user using an id
	*takes the id
	*/
	public function delete_a_user($a){
		
		//write the sql query to delete user
		$sql = "DELETE FROM `user` WHERE `user_id` = '$a'";

		//return the executed the query
		return $this->db_query($sql);
	}


	/**
	*method to check if user mail already exists
	*takes the mail
	*/
	public function verifymail($sterm){
		
		//write the sql query to check if name exists
		$sql = "SELECT `user_email` FROM `user` WHERE `user_email` = '$sterm'";

		//return the executed the query
		return $this->db_query($sql);
	}


	/**
	*method for login informaton 
	*/
	public function verify_login($um){
		//a query to get all login information base on email
		$sql = "SELECT * FROM `user` WHERE `user_email` = '$um'";

		//execute the query
		return $this->db_query($sql);
	}

}

?>