<?php 

   $filepath=realpath(dirname(__FILE__));
      include_once ($filepath.'/../lib/Session.php'); 

       Session::checkLogin();
   
   
    
   
   include_once ($filepath.'/../lib/Database.php'); 
   include_once ($filepath.'/../helpers/Format.php'); 

 
 ?>



<?php 


/*Admin Login Class*/

   class Adminlogin{

   	private $fm;
   	private $db;


    public function __construct(){

    	$this->db=new Database();
    	$this->fm=new Format();

    }

    public function AdminLogin($adminUser,$adminPass){

    	$adminUser=$this->fm->validation($adminUser);
    	$adminPass=$this->fm->validation($adminPass);

    	$adminUser=mysqli_real_escape_string($this->db->link,$adminUser);
    	$adminPass=mysqli_real_escape_string($this->db->link,$adminPass);

    	if (empty($adminUser)||empty($adminPass)) {

    		$logninmsg="User Name or Password Must not be Empty";
    		return $logninmsg;
    		  
    	}
    	else{
    		$query="SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass'";
    		$result=$this->db->select($query);
    		if ($result != false) {
    			$value=$result->fetch_assoc();
    			Session::set("adminlogin",true);
    			Session::set("adminId",$value['adminId']);
    			Session::set("adminUser",$value['adminUser']);
    			Session::set("adminName",$value['adminName']);
    			header("Location:dashbord.php");
    			
    		}
    		else{
    			$logninmsg="User Name or Password not Matched";
    		    return $logninmsg;

    		}
    	}

    }

   }


 ?>