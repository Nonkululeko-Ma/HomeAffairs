<?php
require_once __DIR__."/db/entities/AllEntities.php";
header('Content-Type: application/json');

$response = (object) array("success" => true);

$action = null;
if(isset($_GET["action"])) {
  $action = htmlspecialchars($_GET["action"]);
} else if(isset($_POST["action"])) {
  $action = htmlspecialchars($_POST["action"]);
}

if(!is_null($action)) {
  switch(strtoupper($action)) {
    case "GET_USERS":
      $response->users = User::getDTOs(User::findAll());
      break;
    case "CREATE_USER":
      if(isset($_POST["user"])) {
        $userParam = json_decode(json_encode($_POST["user"]));
        $user = new User();
        $user->setName($userParam->name);
        $user->setSurname($userParam->surname);
        $user->setIdnumber($userParam->id_number);
        $user->setGender($userParam->gender);
        $user->setEmail($userParam->email);
        $user->setAge($userParam->age);
        $user->setPhonenumber($userParam->phone_number);
        $user->setTown($userParam->town);
        $user->setServices($userParam->services);
        $user->setNotifications($userParam->notifications);
        try {
          $user->save();
          $response->users = User::getDTOs($user::findAll());
        } catch (Exception $e) {
          $response->success = false;
          $response->message = $e->getMessage();
        }
      } else {
        $response->success = false;
        $response->message = "User not passed";
      }
      break;
    case "UPDATE_USER":
      if(isset($_POST["user"])) {
        $userParam = json_decode(json_encode($_POST["user"]));
        $user = User::findById($userParam->id);
        if(!is_null($user)) {
          $user->setName($userParam->name);
          $user->setSurname($userParam->surname);
          $user->setIdnumber($userParam->id_number);
          $user->setGender($userParam->gender);
          $user->setEmail($userParam->email);
          $user->setAge($userParam->age);
          $user->setPhonenumber($userParam->phone_number);
          $user->setTown($userParam->town);
          $user->setServices($userParam->services);
          $user->setNotifications($userParam->notifications);
          try {
            $user->save();
            $response->user = $user->getDTO();
          } catch (Exception $e) {
            $response->success = false;
            $response->message = $e->getMessage();
          }
        } else {
          $response->success = false;
          $response->message = "User not found";
        }
      } else {
        $response->success = false;
        $response->message = "User not passed";
      }
      break;
    default:
      $response->success = false;
      $response->message = "Action '$action' unknown";
      break;
  }
} else {
  $response->success = false;
  $response->message = "You must provide an action";
}

echo json_encode($response);