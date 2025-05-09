<?php
require_once __DIR__.'/../DBConnection.php';
require_once __DIR__.'/../../GeneralUtils.php';
require_once __DIR__.'/../../GeneralException.php';
require_once __DIR__.'/EntityBaseClass.php';

class User extends EntityBaseClass {
	private $id;
	private $name;
	private $surname;
	private $idnumber;
	private $gender;
	private $email;
	private $age;
	private $phonenumber;
	private $town;
	private $services;
	private $notifications;
	private $version;
	private $lastModified;

	public function __construct() {
		$this->id = null;
		$this->name = null;
		$this->surname = null;
		$this->idnumber = null;
		$this->gender = null;
		$this->email = null;
		$this->age = null;
		$this->phonenumber= null;
		$this->town = null;
		$this->services = null;
		$this->notifications = null;
		$this->version = null;

		$this->lastModified = null;
	}	

	public function copy($user) {
		$this->id = $user->id;
		$this->name = $user->name;
		$this->surname = $user->surname;
		$this->idnumber= $user->idnumber;
		$this->gender = $user->gender;
		$this->email= $user->email;
		$this->age = $user->age;
		$this->phonenumber = $user->phonenumber;
		$this->town = $user->town;
		$this->services= $user->services;
		$this->notifications = $user->notifications;
		$this->version = $user->version;
		$this->lastModified = $user->lastModified;
	}	

	public function getDTO() {
		return (object) array(
			'id' => $this->id,
			'name' => $this->name,
			'surname' => $this->surname,
			'id_number' => $this->idnumber,
			'gender' => $this->gender,
			'email' => $this->email,
			'age' => $this->age,
			'phone_number' => $this->phonenumber,
			'town' => $this->town,
			'services' => $this->services,
			'notifications' => $this->notifications,
			'version' => $this->version,
			'last_modified' => $this->lastModified
		);
	}

	public function getDTOShort() {
		return (object) array(
			'id' => $this->id,
			'name' => $this->name,
			'surname' => $this->surname,
			'id_number' => $this->idnumber,
			'gender' => $this->gender,
			'email' => $this->email,
			'age' => $this->age,
			'phone_number' => $this->phonenumber,
			'town' => $this->town,
			'services' => $this->services,
			'notifications' => $this->notifications,
			'version' => $this->version,
			'last_modified' => $this->lastModified
		);
	}

	public static function getDTOs($users) {
		$dtos = array();
		foreach($users as $user) {
			array_push($dtos, $user->getDTO());
		}
		return $dtos;
	}

	public static function getShortDTOs($users) {
		$dtos = array();
		foreach($users as $user) {
			array_push($dtos, $user->getDTOShort());
		}
		return $dtos;
	}

	/**
	* @return $id or null if not set
	*/
	public function getId() {
		return $this->id;
	}

	/**
	* @param $id
	*/
	public function setId($id) {
		if($id != null && ctype_digit($id)) {
			$this->id = intval($id);
		} else {
			$this->id = $id;
		}
	}

	/**
	* @return $name or null if not set
	*/
	public function getName() {
		return $this->name;
	}

	/**
	* @param $name
	*/
	public function setName($name) {
		$this->name = $name;
	}

	/**
	* @return $surname or null if not set
	*/
	public function getSurname() {
		return $this->surname;
	}

	/**
	* @param $surname
	*/
	public function setSurname($surname) {
		$this->surname = $surname;
	}



	/**
	* @return $idnumber or null if not set
	*/
	public function getIdNumber() {
		return $this->idnumber;
	}

	/**
	* @param $idnumber
	*/
	public function setIdnumber($idnumber) {
		if($idnumber != null && ctype_digit($idnumber)) {
			$this->idnumber = intval($idnumber);
		} else {
			$this->idnumber = $idnumber;
		}
	}


	/**
	* @return $gender or null if not set
	*/
	public function getGender() {
		return $this->gender;
	}

	/**
	* @param $gender
	*/
	public function setGender($gender) {
		$this->gender = $gender;
	}

	/**
	* @return $email or null if not set
	*/
	public function getEmail() {
		return $this->email;
	}

	/**
	* @param $email
	*/
	public function setEmail($email) {
		$this->email = $email;
	}


	/**
	* @return $age or null if not set
	*/
	public function getAge() {
		return $this->age;
	}

	/**
	* @param $age
	*/
	public function setAge($age) {
		if($age != null && ctype_digit($age)) {
			$this->age = intval($age);
		} else {
			$this->age = $age;
		}
	}

/**
	* @return $phonenumber or null if not set
	*/
	public function getPhonenumber() {
		return $this->phonenumber;
	}

	/**
	* @param $phonenumber
	*/
	public function setPhonenumber($phonenumber) {
		if($phonenumber != null && ctype_digit($phonenumber)) {
			$this->phonenumber = intval($phonenumber);
		} else {
			$this->phonenumber = $phonenumber;
		}
	}


/**
	* @return $town or null if not set
	*/
	public function getTown() {
		return $this->town;
	}

	/**
	* @param $town
	*/
	public function setTown($town) {
		$this->town = $town;
	}


	/**
	* @return $services or null if not set
	*/
	public function getServices() {
		return $this->services;
	}

	/**
	* @param $services
	*/
	public function setServices($services) {
		$this->services = $services;
	}


	/**
	* @return $notificatons or null if not set
	*/
	public function getNotifications() {
		return $this->Notifications;
	}

	/**
	* @param $notifications
	*/
	public function setNotifications($notifications) {
		$this->notifications = $notifications;
	}


	/**
	* @return $version or null if not set
	*/
	public function getVersion() {
		return $this->version;
	}

	/**
	* @param $version
	*/
	public function setVersion($version) {
		if($version != null && ctype_digit($version)) {
			$this->version = intval($version);
		} else {
			$this->version = $version;
		}
	}

	/**
	* @return $lastModified or null if not set
	*/
	public function getLastModified() {
		return $this->lastModified;
	}

	/**
	* @param $lastModified
	*/
	public function setLastModified($lastModified) {
		$this->lastModified = $lastModified;
	}

	public static function findAll() {
		$db = new Database();
		$query = $db->doQuery("SELECT * FROM user");

		return self::executeFindAllByQuery($query);
	}

	public static function findById($id) {
		return self::findByProperty('id', $id);
	}

	public static function findAllById($id) {
		return self::executeFindAll('id', $id);
	}

	public static function findByName($name) {
		return self::findByProperty('name', $name);
	}

	public static function findAllByName($name) {
		return self::executeFindAll('name', $name);
	}

	public static function findBySurname($surname) {
		return self::findByProperty('surname', $surname);
	}

	public static function findAllBySurname($surname) {
		return self::executeFindAll('surname', $surname);
	}

	public static function findByIdNumber($idnumber) {
		return self::findByProperty('id_number', $idnumber);
	}

	public static function findAllByIdnumber($idnumber) {
		return self::executeFindAll('id_number', $idnumber);
	}

	public static function findByGender($gender) {
		return self::findByProperty('gender', $gender);
	}

	public static function findAllByGender($gender) {
		return self::executeFindAll('gender', $gender);
	}

	public static function findByEmail($email) {
		return self::findByProperty('email', $email);
	}

	public static function findAllByEmail($email) {
		return self::executeFindAll('email', $email);
	}


	public static function findByAge($age) {
		return self::findByProperty('age', $age);
	}

	public static function findAllByAge($age) {
		return self::executeFindAll('age', $age);
	}


	public static function findByPhonenumber($phonenumber) {
		return self::findByProperty('phone_number', $phonenumber);
	}

	public static function findAllByPhonenumber($phonenumber) {
		return self::executeFindAll('phone_number', $phonenumber);
	}

	public static function findByTown($town) {
		return self::findByProperty('town', $town);
	}

	public static function findAllByTown($town) {
		return self::executeFindAll('town', $town);
	}

    public static function findByServices($services) {
		return self::findByProperty('services', $services);
	}

	public static function findAllByServices($services) {
		return self::executeFindAll('services', $services);
	}
     

     public static function findByNotifications($notifications) {
		return self::findByProperty('notifications', $notifications);
	}

	public static function findAllByNotifications($notifications) {
		return self::executeFindAll('notifications', $notifications);
	}


	public static function findByVersion($version) {
		return self::findByProperty('version', $version);
	}

	public static function findAllByVersion($version) {
		return self::executeFindAll('version', $version);
	}

	public static function findByLastModified($lastModified) {
		return self::findByProperty('last_modified', $lastModified);
	}

	public static function findAllByLastModified($lastModified) {
		return self::executeFindAll('last_modified', $lastModified);
	}

	private static function findByProperty($property, $value) {
		return self::executeFind($property, $value);
	}

	public static function executeFind($property, $value) {
		$db = new Database();
		$query = $db->doQuery("SELECT * FROM user WHERE $property='$value'");

		return self::executeFindByQuery($query);
	}

	public static function executeFindByQuery($query) {
		$user = null;

		while($thisUser = mysqli_fetch_assoc($query)) {
			$user = self::unpack($thisUser);
		}

		return $user;
	}

	public static function executeCountByQuery($query) {
		$count = 0;

		while($thisCount = mysqli_fetch_assoc($query)) {
			$count = intval($thisCount['count']);
		}

		return $count;
	}

	public static function executeAvgByQuery($query) {
		$avg = 0;

		while($thisAvg = mysqli_fetch_assoc($query)) {
			$avg = intval($thisAvg['avg']);
		}

		return $avg;
	}

	public static function executeFindAll($property, $value) {
		$db = new Database();
		$query = $db->doQuery("SELECT * FROM user WHERE $property='$value'");

		return self::executeFindAllByQuery($query);
	}

	public static function executeFindAllByQuery($query) {
		$users = array();

		while($thisUser = mysqli_fetch_assoc($query)) {
			array_push($users,self::unpack($thisUser));
		}

		return $users;
	}

	private static function unpack($thisUser) {
		$user = new User();
		$user->id = intval($thisUser['id']);
		$user->name = $thisUser['name'];
		$user->surname = $thisUser['surname'];
		$user->idnumber = $thisUser['id_number'];
		$user->gender = $thisUser['gender'];
		$user->email = $thisUser['email'];
		$user->age = intval($thisUser['age']);
		$user->phonenumber = $thisUser['phone_number'];
		$user->town = $thisUser['town'];
		$user->services = $thisUser['services'];
		$user->notifications = $thisUser['notifications'];
		$user->version = intval($thisUser['version']);
		$user->lastModified = $thisUser['last_modified'];

		return $user;
	}

	public function validate() {
		$response = (object) array("valid" => true, "error_fields" => array());

		if($this->name === null) {
			$response->valid = false;
			array_push($response->error_fields, 'name');
		}
		if($this->surname === null) {
			$response->valid = false;
			array_push($response->error_fields, 'surname');
		}
        if($this->idnumber === null) {
			$response->valid = false;
			array_push($response->error_fields, 'id_number');
		}

		if($this->gender === null) {
			$response->valid = false;
			array_push($response->error_fields, 'gender');
		}

		if($this->email === null) {
			$response->valid = false;
			array_push($response->error_fields, 'email');
		}

		if($this->age === null) {
			$response->valid = false;
			array_push($response->error_fields, 'age');
		}

		if($this->phonenumber === null) {
			$response->valid = false;
			array_push($response->error_fields, 'phone_number');
		}
        if($this->town === null) {
			$response->valid = false;
			array_push($response->error_fields, 'town');
		}

		if($this->services === null) {
			$response->valid = false;
			array_push($response->error_fields, 'services');
		}
		if($this->notifications === null) {
			$response->valid = false;
			array_push($response->error_fields, 'notifications');
		}


		if(!$response->valid) {
			$response->error_message = 'The following properties are null and can not be null (' . implode(", ", $response->error_fields) . ')';
		}

		return $response;
	}

	public function save() {
		$validation = $this->validate();
		if(!$validation->valid) {
			throw new Exception($validation->error_message);
		}

		$db = new Database();

		$id = $this->id;
		$lastModified = "'".GeneralUtils::getSATime()."'";
		
		if($id === null) {
			$name = $this->name === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->name)."'";
			$surname = $this->surname === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->surname)."'";
			$idnumber = $this->idnumber === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->idnumber)."'";
			$gender = $this->gender === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->gender)."'";
      $email = $this->email === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->email)."'";
			$age = $this->age === null ? 'NULL' : mysqli_real_escape_string($db->getDbConn(), $this->age);
			$phonenumber = $this->phonenumber === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->phonenumber)."'";
			$town = $this->town === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->town)."'";
			$services = $this->services === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->services)."'";
			$notifications = $this->notifications === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->notifications)."'";


			$columns = "INSERT INTO user (name,surname,id_number,gender,email, age, phone_number, town, services, notifications, last_modified)";
			$values = "VALUES($name,$surname,$idnumber,$gender,$email, $age, $phonenumber,$town,$services,$notifications,$lastModified)";
			$qry = "$columns $values";
      
      //echo $qry;

			if($db->doQuery($qry)) {
				$this->copy(self::findById($db->getInsertId()));
			} else {
				throw new Exception("Problem saving new user to database. $qry");
			}
		} else {
			$testObj = self::findById($id);

			if($testObj != null) {
				$version = intval($this->version)+1;
				$name = $this->name === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->name)."'";
				$surname = $this->surname === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->surname)."'";
				$idnumber = $this->idnumber === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->idnumber)."'";
				$gender = $this->gender === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->gender)."'";
        $email = $this->email === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->email)."'";
				$age = $this->age === null ? 'NULL' : mysqli_real_escape_string($db->getDbConn(), $this->age);
        $phonenumber = $this->phonenumber === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->phonenumber)."'";
				$town = $this->town === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->town)."'";
				$services = $this->services === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->services)."'";
				$notifications = $this->notifications === null ? 'NULL' : "'".mysqli_real_escape_string($db->getDbConn(), $this->notifications)."'";
    
				$fields = "name=$name, surname=$surname, id_number=$idnumber, gender=$gender, email=$email, age=$age, phone_number=$phonenumber, services=$services, notifications=$notifications, version=$version, last_modified=$lastModified";

				$qry = "UPDATE user SET $fields WHERE id=$id";
        
        //echo $qry;

				if($db->doQuery($qry)) {
					$this->copy(self::findById($id));
				} else {
					throw new Exception("Problem updating user to database. $qry");
				}
			} else {
				throw new Exception("Problem updating user to database.");
			}
		}
	}

	public static function delete($id) {
		$qry = "DELETE FROM user where id=$id";

		$db = new Database();
		if(!$db->doQuery($qry)) {
			throw new Exception("Problem deleting user from database.");
		}
	}

}