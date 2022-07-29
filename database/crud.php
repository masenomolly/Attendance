<?php
class crud
 {          

            // private database  object
        private  $db;
        // constructor to initialize private variable to the database connection\

        function __construct($conn){
            $this->db=$conn;
        }

      //*function to insert a new record into the attendee database */
      public  function  insertAttendees($fname,$lname,$dob,$number,$email,$pass,$avatar,$category){

            try {
                // define sql statement to be excuted
                $pass = md5($pass);
                $sql = "INSERT INTO attendee(firstname,lastname,dateofbirth,phone_number,Email_address,PASS,Avatar,Category) VALUES (:fname,:lname,:dob,:nmber,:email,:pass,:avatar,:category)";
                // prepare the sql statement for exuction
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':nmber',$number);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':pass',$pass);
                $stmt->bindparam(':avatar',$avatar);
                $stmt->bindparam(':category',$category);


                $stmt->execute();
                return true;

            }catch(PDOException $e){
                echo $e->getMessage();
                return false;

            }
      }
      // FUNCTION TO PUSH DATA FORM SIGNING NOMINAL ROLL\
      public function insertsigned($course_id, $course,$term,$course_yr,$comments){
        try{
          $sql = "INSERT INTO signed(course_id, course, term, course_yr,comments) VALUES (:courseid,:course,:term,:courseyr,:comments);";
          $stmt = $this->db->prepare($sql);

          $stmt->bindparam(':courseid',$course_id);
          $stmt->bindparam(':course',$course);
          $stmt->bindparam(':term',$term);
          $stmt->bindparam(':courseyr',$course_yr);
          $stmt->bindparam(':comments',$comments);

          $stmt->execute();
          return true;
        }catch(PDOException $e){
          echo $e->getMessage();
          return false;
        }

      }

        // FUNCTION GET SIGNED STUDENT 
        public function getsigned(){
          try{
            $sql = "SELECT * FROM signed ;";
            $results=$this->db->query($sql);
            return $results;
  
  
            return true;
  
          }
          catch(PDOException $e){
            echo $e->getMessage();
            return false;
          }
        }
      // FUNCTION OF UPDATING ATTENDEE
      public function updateAttendee($id,$fname,$lname,$dob,$number,$email,$pass,$avatar,$category ){
        try{
              $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`phone_number`=':nmber',`Email_address`=:email, `PASS`=':pass1' ,`Avatar`=':avatar',`Category`=':category WHERE Attendee_id = :attend ";
              // $sql = " UPDATE `attendee` SET `Attendee_id`=':attend',firstname`=':fname',`lastname`=':lname', `phone_number`=':nmber',`dateofbirth`=':dob',`Email_address`=':email', `PASS`=':pass1', `Avatar`=':avatar',`Category`=':category' WHERE Attendee_id = :attend";
                 $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':attend', $id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':nmber',$number);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':pass1',$pass);
                $stmt->bindparam(':avatar',$avatar);
                $stmt->bindparam(':category',$category);

                $stmt->execute();
                return true;
            }catch(PDOException $e){
              echo $e->getMessage();
              return false;

      }
      }
      // FUNCTION TO DELETE 

      public function delete($id){
        try{
          $sql ="DELETE FROM `attendee` WHERE Attendee_id = :id";
          $stmt=$this->db->prepare($sql);
          $stmt->bindparam(':id',$id);
          $stmt->execute();
          return true;
        }catch(PDOException $e){
         echo  $e->getMessage();
         return false;
            
        }
   

      }
      public function getID($id){
                try {
                    $sql = "SELECT * FROM `attendee` a inner join category s on a.Category = s.category_id WHERE Attendee_id = :id";
                    $stmt= $this->db->prepare($sql);

                    $stmt->bindparam(':id', $id);
                      


                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;
                }catch(PDOException $e){
                  echo  $e->getMessage();
                  return false;
                    
                }
      }
// this  function below  is for  querying results from a database  i mean viewing databse records 

      public function getAttendees(){
        try{
              $sql = "SELECT * FROM `attendee` a inner join category s on a.Category = s.category_id;";
              $result = $this->db->query($sql);
              return $result;
          }catch(PDOException $e){
                    echo  $e->getMessage();
                    return false;
                       
         }

      }
    
      public function getcategory(){
        try{
          $sql = "SELECT * FROM `category`;";
          $cart = $this->db->query($sql);
          return $cart;
  
        }catch(PDOException $e){
          echo  $e->getMessage();
          return false;
             
         }
        
      }
   
}

?>