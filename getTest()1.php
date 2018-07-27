<?php
// getTest(sutId)
// request a test script to run from the php command/control.
include('../adodb5/adodb.inc.php');
require "./DBConnection.php";
 //require "./AutomationTest.php";    
      if (isset($_GET["action"]) ) {

    $action = $_GET["action"];
    
    $result = $_GET["result"]; 
    $newResult = $result;
    
    $sutId = $_GET["sutId"];
    $newSutId = $sutId; 
    
    $scriptName = $_GET["scriptName"];
    $newScript=$scriptName;
    
    
    if ($action == "putResult") {
        
       
       putResult ($newResult, $newScript, $newTestId);
      
    }
    elseif($action == "getTest"){
        getTest($testStart, $newTestId, $newSutId, $newScript);
        
    }
    
    
        
    }

    function getTest($testStart, $newTestId, $newSutId, $newScript){
    	 // Open a connection to the database
     	 	
     	      $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'cosctea4_cosc',     // Database user name
        		    'CoscTea4;',             // Password
        		    'cosctea4_cosc4345');   // Database       
        		   
        		  
        		   
        		   
        		   
        		$newTestId = 1;   
        		    
         $sql = "";
 
    	 $sql = "INSERT INTO testResult (testStartDateTime, testId, sutId)
    	 VALUES ( NOW() +1, '$newTestId', '$newSutId') ";
         $rs = $db->Execute($sql);
        
        
        if($rs) {
		print "<br> ----Inserted successfuly --- \n";
		print "<br> <br> scriptName".$newScript;
	}
	elseif($rs == false){
	    print "<br> insert failed   <br> scriptName".$newScript;
	}
	

}//enf function getTest()
    
    
    
    
    
    
    
    
    
     function putResult($newResult, $newScript){
    	 // Open a connection to the database
     	 		  //
     	 		  $result = $_GET['result'];
                     $newResult = $result;
                     print(" %result : <br>" .$result);
                     
     	      $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'cosctea4_cosc',     // Database user name
        		    'CoscTea4;',             // Password
        		    'cosctea4_cosc4345');   // Database    
        		    
        		     
         $sql = ""; 	
         $sql ="UPDATE testResult SET testResult = '".$newResult."' where sutId= 2 ";
         $rs = $db->Execute($sql);
        
        $sql = "UPDATE testResult SET testFinishDateTime = NOW()+1 where sutId=2";
        $rs = $db->Execute($sql);
        
        $sql = "UPDATE testResult SET testId = (select testId from Test where testScriptName LIKE '$newScript' )";
        $rs = $db->Execute($sql);
        if($rs ) {
	
	    $smsg="update";
		print_r($smsg);
		print "<br> SQL UPDATED ---> \n";
		echo "<br> result:----> " .$newScript;
	}
	elseif(!$rs){
	     $fmsg =" <br> SQL UPDATED [[ Failed ]]  "; 
            echo $fmsg;
            echo "<br> result:----> " .$newScript;
            
	}
	
}//end function putResult()

    function updateResult($SUTID, $description){
        	 // Open a connection to the database
     	 		  //
     		   $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'cosctea4_cosc',     // Database user name
        		    'CoscTea4;',             // Password
        		    'cosctea4_cosc4345');   // Database    
    	$sql = "";  
        $sql ="UPDATE testResult SET testResult = '".$description ."'   where sutId = '".$SUTId ."'";
        $rs = $db->Execute($sql);
        
        
        if($rs == false) {
            
		print_r($rs);
		print "<br> SQL UPDATED failed \n";
	}
	
    }
    
    
    

?>

     