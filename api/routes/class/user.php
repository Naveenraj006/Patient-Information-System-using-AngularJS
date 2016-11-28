<?php
include('password.php');
class User extends Password{

    private $_db;
	public $name;
	public $mid;
	public $mtype;

    function __construct($db){
    	parent::__construct();
    
    	$this->_db = $db;
    }

	private function get_user_hash($username){	

		try {
			$stmt = $this->_db->prepare('SELECT mtype,username,memberID,p_image,email,ctype,sctype,password ,active FROM members WHERE email = :mail AND (active=1 or active="Yes" )');
			$stmt->execute(array('mail' => $username));
			
			$row = $stmt->fetch();

			$_SESSION['mtype'] = $row['mtype'];
			$_SESSION['name']= $row['username'];
			$_SESSION['mid']= $row['memberID'];
			$_SESSION['p_image']= $row['p_image'];
			$_SESSION['email']= $row['email'];
			$_SESSION['cat']= $row['ctype'];
			$_SESSION['scat']= $row['sctype'];
			$_SESSION['login']= $row['active'];

			return $row['password'];

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($username,$password){

		$hashed = $this->get_user_hash($username);
		
		if($this->password_verify($password,$hashed) == 1){
		    
		    $_SESSION['loggedin'] = true;

		    return true;
		} 	
	}
		
	public function logout(){
		session_destroy();

	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}


//
	public function send_msg($text ,$to){	

		try {
			$stmt = $this->_db->prepare('INSERT INTO `messages`( `message`, `sid`, `rid`) VALUES (:text,:f,:to)');
			if($stmt->execute(array('text' => $text ,'f' => $_SESSION['mid'],':to' => $to )))
		$this->ialert("Message Sent",0,$_SESSION['mid'],0,'','');
return true;
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}


//
//
	public function send_pmsg($text ,$to){	

		try {
			$stmt = $this->_db->prepare('INSERT INTO `messages`( `message`, `sid`, `rid`) VALUES (:text,:f,:to)');
			$stmt->execute(array('text' => $text ,'f' => $_SESSION['mid'],':to' => $to ));
		$this->ialert("Group Message Sent",0,$_SESSION['mid'],0,'',$to);
		$this->ialert("Group Message Sent",2,$_SESSION['mid'],$to,'','');
return true;
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}


//
//
	public function del_msg($mid){	

		try {
			$stmt = $this->_db->prepare('DELETE FROM `messages` WHERE `mid` = :meid');
			$stmt->execute(array('meid' => $mid ));
		return true;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}


//
//
	public function add_srv($ct,$sc,$title,$desc,$icon){	

		try {
			$stmt = $this->_db->prepare('INSERT INTO `services`( `memberID`, `ctype`, `sctype`, `title`, `desc`, `s_icon`) VALUES (:mid,:c,:sc ,:tit,:desc,:ico )');
			$stmt->execute(array('mid' => $_SESSION['mid'] ,
			'c' => $ct,'sc' => $sc ,'tit' => $title , 'desc' => $desc , 'ico' => $icon));
		return true;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}


//
//
	public function del_srv($seid){	

		try {
			$stmt = $this->_db->prepare('DELETE FROM `services` WHERE `seid` = :sid');
			$stmt->execute(array('sid' => $seid ));
		
return true;
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}


//
//
	public function add_prd($cid , $scid , $name , $desc , $spec ,$arg, $price , $qty , $avail ,$imgs,$icon){	

		try {

			$stmt = $this->_db->prepare('INSERT INTO `products`( `category`, `subcategory`, `name`, `description`, `specification`, `mid`, `arg1`, `arg2`, `arg3`, `arg4`, `arg5`, `arg6`, `arg7`, `arg8`, `arg9`, `arg10`, `arg11`, `arg12`, `arg13`, `arg14`, `arg15`, `price`, `qty`, `available`, `images`,`icon`) VALUES (:cid,:scid,:name,:desc ,:spec,:mid ,:arg1,:arg2,:arg3,:arg4,:arg5,:arg6,:arg7,:arg8,:arg9,:arg10,:arg11,:arg12,:arg13,:arg14,:arg15,:price,:qty,:avail,:imgs ,:icon)');
			$stmt->execute(array('cid' => $cid ,
			'scid' => $scid,'name' => $name ,'desc' => $desc , 'spec' => $spec , 'mid' => $_SESSION['mid'],
'arg1' => $arg[0],'arg2' => $arg[1],'arg3' => $arg[2],'arg4' => $arg[3],'arg5' => $arg[4],
'arg6' => $arg[5],'arg7' => $arg[6],'arg8' => $arg[7],'arg9' => $arg[8],'arg10' => $arg[9],
'arg11' => $arg[10],'arg12' => $arg[11],'arg13' => $arg[12],'arg14' => $arg[13],'arg15' => $arg[14],
			 'price' => $price ,
			'qty' => $qty,'avail' => $avail ,'imgs' => $imgs ,'icon' => $icon));
		
return true;
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}


//
//
	public function del_prd($id){	

		try {
			$stmt = $this->_db->prepare('DELETE FROM `products` WHERE `id` = :id  and  `mid`= :mid');
			$stmt->execute(array('id' => $id , 'mid' => $_SESSION['mid'] ));
		return true;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}


//
	public  function get_msges($type){	

		try {
			$stmt = $this->_db->prepare('SELECT `mid`, `message`, `rid`, `timestamp`, `view` FROM `messages` WHERE 1 and `sid` = :sid');
			$stmt->execute(array('mail' => $username));
			
			$row = $stmt->fetch();


			$_SESSION['mtype'] = $row['mtype'];
			$_SESSION['name']= $row['username'];
			$_SESSION['mid']= $row['memberID'];

			return $row['password'];
			return true;

		} catch(PDOException $e) {
		   exit;
		}
	}

//

//
	public function add_eshop($id){	

		try {
			$stmt = $this->_db->prepare('UPDATE `products` SET `eshop`=1 WHERE `mid`= :mid and `id`=:id');
			
			$stmt->execute(array('mid' => $_SESSION['mid'] ,
			'id' => $id));
		
return true;
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

/////
public function ialert($alert,$t,$md,$gid,$href,$data){
		
		$sql = "INSERT INTO `alerts`( `alert`,`t`, `mid`, `gid`, `href`, `data`) VALUES (:alt,:t,:mid,:gid,:href,:data)";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindValue(":alt", $alert);
		$stmt->bindValue(":mid", $md);
		$stmt->bindValue(":t", $t);
		$stmt->bindValue(":gid", $gid);
		$stmt->bindValue(":href", $href);
		$stmt->bindValue(":data", $data);
        $stmt->execute();
		return true;
		
	}
////
	public function del_eshop($id){	

		try {
			$stmt = $this->_db->prepare('UPDATE `products` SET `eshop`=0 WHERE `mid`= :mid and `id`=:id');
			
			$stmt->execute(array('mid' => $_SESSION['mid'] ,
			'id' => $id));
		
return true;
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}


//

	
}


?>