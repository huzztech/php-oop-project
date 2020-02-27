<?php


class Users extends Dbh{


    public $table   = 'signup';
    public $pk      = 'user_id';
    public $oby     = "";
    public $tabrows = 0;

    public $id              = '';
    public $name            = '';
    public $email           = '';
    public $password        = '';
    public $dob             = '';
    public $status          = '';
    public $company_id      = '';
    public $user_type       = '';
    public $master          = '';
    public $verifyToken     = '';
    public $remember_token  = '';
    public $created_at      = '';
    public $updated_at      = '';

    public $Query;


    function setvalues($name, $email, $password, $dob){

      $this->name     = $name;
      $this->email    = $email;
      $this->password = $password;
      $this->dob      = $dob;
  }

  public function FetchAll(){
        return $this->Query->fetchAll(PDO::FETCH_OBJ);
    }

    /*
        * fetch single row from specific table
    */ 

    public function Single(){
        return $this->Query->fetch(PDO::FETCH_OBJ);
    }


  public function Query($query, $param = []){
    if(empty($param)){
     /*
        * if we dont have the parameters
     */ 
     $this->Query = $this->connect()->prepare($query);
     return $this->Query->execute();
    } else {
     /*
        * if we have some parameters
     */ 

     $this->Query = $this->connect()->prepare($query);
     return $this->Query->execute($param);
    }

    }


  public function CountRows(){
        return $this->Query->rowCount();
    }



    function insert(){

      $name     = $this->name;
      $email    = $this->email;
      $password = encryptdata($this->password);
      $dob      = $this->dob;
      $verifyToken  = random_string(50);

      $sql = "INSERT INTO users (name,email,password,dob,verifyToken) VALUES (?,?,?,?,?)";
      $results = $this->connect()->prepare($sql);
      return $results->execute([$name, $email, $password, $dob, $verifyToken]);
      
  }



  function activate($token) {


    $this->Query("SELECT * FROM users WHERE verifyToken = ?", [$token]);

    $counter = $this->CountRows();

    if($counter > 0) {

    $sql =  "UPDATE  users 
              SET
                status = 1,
                verifyToken = ''

                          WHERE verifyToken = ?";

    $results = $this->connect()->prepare($sql);

    $results->execute([$token]);

    return 1;

    }
    else
      {
          return 0;
      }
  }



}


?>