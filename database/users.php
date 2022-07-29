<?php
  class user{
    
            // private database  object
            private  $db;
            // constructor to initialize private variable to the database connection\
    
            function __construct($conn){
                $this->db=$conn;
            }


            public function insertuser($username,$Pass){
                try{
                    $results = $this->getByUsername($username);
                    if($results['num'] > 0){
                        return false;

                    }
                    else{
                       $new_password = md5($Pass);
                       $sql = "INSERT INTO users (Username,Pass) VALUES (:username,:pass)";   
                    // $sql ="INSERT INTO `users`( `Username`, `Pass`) VALUES (':username',':pass')";
                    $stmt =$this->db->prepare($sql);

                    // we now  bind our  param

                    $stmt->bindparam(':username',$username);
                    $stmt->bindparam(':pass',$new_password);

                    $stmt->execute();


                    return true;
                }
               }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }

            }
            public function insertuseradmin($username,$Pass){
                try{
                    $results = $this->getByUsername($username);
                    if($results['num'] > 0){
                        return false;

                    }
                    else{
                       $new_password = md5($Pass);
                       $sql = "INSERT INTO users (Username,Pass) VALUES (:username,:pass)";   
                    // $sql ="INSERT INTO `users`( `Username`, `Pass`) VALUES (':username',':pass')";
                    $stmt =$this->db->prepare($sql);

                    // we now  bind our  param

                    $stmt->bindparam(':username',$username);
                    $stmt->bindparam(':pass',$new_password);

                    $stmt->execute();


                    return true;
                }
               }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }

            }
            public function getuser($username,$password){
                try{
                    $sql = "select * from users where Username = :username AND Pass = :password ";
                    // $sql = "SELECT * FROM `users` where Username=:username AND  Pass=:password ";               
                     $stmt= $this->db->prepare($sql);
                    $stmt->bindparam(":username",$username );
                    $stmt->bindparam( ":password",$password);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;

                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }
                
            }
            public function getuseradmin($username,$password){
                try{
                    $sql = "select * from admin where Username = :username AND Pass = :password ";
                    // $sql = "SELECT * FROM `users` where Username=:username AND  Pass=:password ";               
                     $stmt= $this->db->prepare($sql);
                    $stmt->bindparam(":username",$username );
                    $stmt->bindparam( ":password",$password);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;

                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }
                
            }
            // public function getUser($username,$password){
            //     try{
            //         $sql = "select * from users where Username = :username AND Pass= :password ";
            //         $stmt = $this->db->prepare($sql);
            //         $stmt->bindparam(':username', $username);
            //         $stmt->bindparam(':password', $password);
            //         $stmt->execute();
            //         $result = $stmt->fetch();
            //         return $result;
            //    }catch (PDOException $e) {
            //         echo $e->getMessage();
            //         return false;
            //     }
            // }


            public function getByUsername($username){
                try{
                    $sql = "select count(*) as num from users where Username = :username";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(":username" ,$username);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;
                    return true;
                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }

              
            }
            public function getUsers(){
                try{
                    $sql = "SELECT * FROM users";
                    $result = $this->db->query($sql);
                    return $result;
                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }
            }
  }
?>