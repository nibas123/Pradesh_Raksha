<?php

/**
 * PHP MySQL Transaction Demo
 */
class Transaction{
    const DB_HOST = 'localhost';
    const DB_NAME = 'aleppyco_hospitals';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    /**
     * PDO instance
     * @var PDO 
     */
    private $pdo = null;

    /**
     * Transfer money between two accounts
     * @param int $from
     * @param int $to
     * @param float $amount
     * @return true on success or false on failure.
     */

public function getSingleColumn($sql,$param){
	try{
		    $stmt = $this->pdo->prepare($sql);
            $stmt->execute($param);
			$column = (string) $stmt->fetchColumn();
            $stmt->closeCursor();
			return $column;
		} catch (PDOException $e) {
            die($e->getMessage());
        }
	
}


public function setLoginAccount($param1,$param2) {

try{
        $this->pdo->beginTransaction();
  //insert row to people_login table
            $sql1="insert into m_login (username,password,isactive,createdDate) values(:username,:password,'0',now())";		
            $stmt = $this->pdo->prepare($sql1);
            $stmt->execute($param1);
            $stmt->closeCursor();
//get the inserted row s unique id [loginid]
            $sql2="select max(loginid) as loginid from m_login";
            $stmt = $this->pdo->prepare($sql2);
            $stmt->execute();
			$loginid = (int) $stmt->fetchColumn();
            $stmt->closeCursor();
            
 //insert the address details with this loginid
            $sql3="insert into m_address (loginid,proofid,proofnumber,nameofuser,dob,catid,districtid,estname,street,city,primarycontact,secondarycontact,isactive,createdDate) values (:loginid,:proofid,:proofnumber,:nameofuser,:dob,:catid,:districtid,:estname,:street,:city,:primarycontact,:secondarycontact,'0',now())";
            $stmt = $this->pdo->prepare($sql3);
			$param2[":loginid"] =$loginid;
            $stmt->execute($param2);
            $stmt->closeCursor();
            // commit the transaction
            $this->pdo->commit();

            //echo 'The login account created successfully';
        return true;
            
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            die($e->getMessage());
        }
    }


public function setSampleInsert($param1) {

        try {
            $this->pdo->beginTransaction();
  //insert row to people_login table
            $sql1="insert into people_login (username,password,isActive,createdDate) values(:username,:password,'1',now())";		
            $stmt = $this->pdo->prepare($sql1);
            $stmt->execute($param1);
            $stmt->closeCursor();
//get the inserted row s unique id [peopleid]
            $sql2="select max(peopleid) from people_login";
            $stmt = $this->pdo->prepare($sql2);
            $stmt->execute();
			$peopleid = (int) $stmt->fetchColumn();
            $stmt->closeCursor();

            // commit the transaction
            $this->pdo->commit();
			
            return $peopleid;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            die($e->getMessage());
        }
    }

    /**
     * Open the database connection
     */
    public function __construct() {
        // open database connection
        $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false );
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * close the database connection
     */
    public function __destruct() {
        // close the database connection
        $this->pdo = null;
    }

}

// test the transfer method
//$obj = new TransactionDemo();

// transfer 30K from from account 1 to 2
//$obj->transfer(1, 2, 30000);


// transfer 5K from from account 1 to 2
//$obj->transfer(1, 2, 5000);
//parameter sample : array(":to" => $to, ":amount" => $amount)
?>