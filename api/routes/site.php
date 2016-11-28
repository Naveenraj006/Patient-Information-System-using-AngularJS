<?php
require 'aws/vendor/autoload.php';

	use Aws\S3\S3Client;
ini_set('display_errors','on');
global $conn;
include('class/user.php');
global $user;
$user = new User($conn);
$app->get('/hello/:name', function ($name) {
  echo "Hello, $name";
});

$app->get('/fetch/patientdata',function() use($app) {
  $req = $app->request();
	
	global $conn;
	$query = "SELECT * FROM patients"; // LIMIT $position,4";// username like '%$q%' or lastname like '%$q%' order by memberId LIMIT 3";
//  or lastname like '$key' or email like '$key' or about like '$key'


	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $arr  = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  echo json_encode(array(
    "error" => 0,
    "message" => "User data fetch successfully",
		"users" => $arr
  ));
});
//insert
$app->post('/register',function() use($app) {
  $req = $app->request();
  $requiredfields = array(
    'fname','lname','gender','dob','mobile1','mobile2'
  );
  global $conn;global $user;
  // validate required fields
  if(!RequiredFields($req->post(), $requiredfields)){
    return false;
  }
	$aty = $req->post("aty");


	$fname = $req->post("fname");
	$lname = $req->post("lname");
	$gen = $req->post("gender");
	
	$dob = $req->post("dob");
	
	
	$ccty = $req->post("mobile1");
	$cctn = $req->post("mobile2");
	
	$desc = $req->post("desc");
	
	//$email = $req->post("email");

	if($gen==1){
		$gen="Male";
	}else{
	$gen="Female";	
	}
	

	if(!isset($error)){

		//hash the password
		//create the activasion code

	$stmt = $conn->prepare('INSERT INTO `patients`(`fname`, `lname`, `gender`, `dob`,`contact`,`acontact`, `brief`) VALUES (:fname,:lname,:gender,:doob,:contact,:acontact,:brief)');
			$stmt->execute(array('fname' => $fname,
				'lname' => $lname,
				'gender' => $gen,
				'doob' => $dob,
				'contact' => $ccty,
				'acontact' => $cctn,
				'brief' => $desc));
			

			//send email
	}else{
//sendrmail($_POST['email'],$_POST['username'],$id,$activasion);{
		echo json_encode(array(
			"error" => 1,
			"err" => $error,
		));
		return;
	}
	
  echo json_encode(array(
    "error" => 0,
    "message" => "Registered successfully"
  ));
});
//step2 insert

?>
