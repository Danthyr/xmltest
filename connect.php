<!-- 
	 Author: Danny van Schijndel
	 Date: 06-06-2020 -->
     <?php
class Connect {

    protected $host;
    protected $dbname;
    protected $user;
    protected $pass;
    protected $charset = 'utf8mb4';
    protected $db;

    public function __construct()
    {
        $this->host = '127.0.0.1';
        $this->dbname= 'dbbigfoottest';
        $this->user = 'root';
        $this->pass = '';

        $this->db();
    }
    public function db()
    {
        try {

            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            try {
                $this->db = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }

        } catch (\Connect $exception ) {

        }
    }

    public function myDb(){
        return $this->db;

    }
    // zonder/met?  hyphens nodes, als bijvoorbeeld <my_xml> <some-node>value</some-node> </my_xml>

    public function uploadXml(){
        $get = file_get_contents($_FILES["upxml"]["tmp_name"], "r");
        // $fh = fopen($_FILES["upxml"]["tmp_name"], "r");

        $new = simplexml_load_string($get);
// Convert into json
$con = json_encode($new);
  
// Convert into associative array
$newArr = json_decode($con, true);
  
print_r($newArr);
      
        // if ($fh === false) { exit("Failed to open uploaded XML file"); }
         
        // // Toon Rij voor Rij
        // while (($row = fgets($fh,1000)) !== false) {
            
        //   try {
        //   echo "<pre>";
        // //Dump en toon array data
        // var_dump($row);
        // echo "</pre>";

        //Insert into database based on position in array 
       
      //   $brandData = $row[0] ;
      //   $modelData = $row[1] ;
      //   $sizeData = $row[2] ;==
          
      //     $sql = "INSERT INTO brand (name) VALUES (:name)";
      //     $q = $this->db->prepare($sql);    
      //     $q->bindValue(":name" ,$brandData);
      //     $result = $q->execute();
      
      //     $bsql = "INSERT INTO model (brand_id,name) VALUES (LAST_INSERT_ID(),:name)";
      //     $b = $this->db->prepare($bsql); 
      //     $b->bindValue(":name" ,$modelData);
      //     $result = $b->execute();
      
      //     $ssql = "INSERT INTO size (model_id,size) VALUES (LAST_INSERT_ID(),:name)";
      //     $s = $this->db->prepare($ssql); 
      //     $s->bindValue(":name" ,$sizeData);
      //     $result = $s->execute();
      
        //   } catch (Exception $ex) { echo $ex->getmessage(); }
        // }
        // fclose($fh);
        // echo "DONE.";
        
       
          }

    public function uploadXmlHyp(){
        $fh = fopen($_FILES["upxml"]["tmp_name"], "r");
        if ($fh === false) { exit("Failed to open uploaded XML file"); }
         
        // Toon Rij voor Rij
        while (($row = fgets($fh,1000)) !== false) {
            
          try {
          echo "<pre>";
        //Dump en toon array data
        var_dump($row);
        echo "</pre>";

        //Insert into database based on position in array 
       
      //   $brandData = $row[0] ;
      //   $modelData = $row[1] ;
      //   $sizeData = $row[2] ;==
          
      //     $sql = "INSERT INTO brand (name) VALUES (:name)";
      //     $q = $this->db->prepare($sql);    
      //     $q->bindValue(":name" ,$brandData);
      //     $result = $q->execute();
      
      //     $bsql = "INSERT INTO model (brand_id,name) VALUES (LAST_INSERT_ID(),:name)";
      //     $b = $this->db->prepare($bsql); 
      //     $b->bindValue(":name" ,$modelData);
      //     $result = $b->execute();
      
      //     $ssql = "INSERT INTO size (model_id,size) VALUES (LAST_INSERT_ID(),:name)";
      //     $s = $this->db->prepare($ssql); 
      //     $s->bindValue(":name" ,$sizeData);
      //     $result = $s->execute();
      
          } catch (Exception $ex) { echo $ex->getmessage(); }
        }
        fclose($fh);
        echo "DONE.";
        
       
          }
      
    public function uploadXml2(){
  //  READ  CSV
//   $fh = file_get_contents($_FILES["upcsv"]["tmp_name"], "r");

   
  $xml = simplexml_load_string($_FILES["upcsv"]["tmp_name"], "SimpleXMLElement", LIBXML_NOCDATA);
  $json = json_encode($xml);
  $fh = json_decode($json,TRUE);
  var_dump($fh);
//   $content = htmlentities(file_get_contents("test.xml"));
  if ($fh === false) { exit("Failed to open uploaded CSV file"); }
   
  // SHOW ROW BY ROW
//   $content = htmlentities(file_get_contents("test.xml"));
  while (($row = fgets($fh,1000)) !== false) {
            
          try {
          echo "<pre>";
        //Dump en toon array data
        var_dump($row);
        echo "</pre>";
  //Insert into database based on position in array 
 
// 

    } catch (Exception $ex) { echo $ex->getmessage(); }
  }
  fclose($fh);
  echo "DONE.";
 



//   $xml = simplexml_load_string( $xmlstring , null , LIBXML_NOCDATA ); 
//   $json = json_encode($xml); 
//   $array = json_decode($json,TRUE);
    }
    public function uploadXML3(){
   
        $xml = simplexml_load_string($_FILES);

        print_r($xml);

        $xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
        foreach($xml->children() as $books) {
                echo $books->title . ", ";
                echo $books->author . ", ";
                echo $books->year . ", ";
                echo $books->price . "<br>";
        }
        
        // $brandData = $row[0] ;
        //   $modelData = $row[1] ;
        //   $sizeData = $row[2] ;
            
        //     $sql = "INSERT INTO brand (name) VALUES (:name)";
        //     $q = $this->db->prepare($sql);    
        //     $q->bindValue(":name" ,$brandData);
        //     $result = $q->execute();
        
        //     $bsql = "INSERT INTO model (brand_id,name) VALUES (LAST_INSERT_ID(),:name)";
        //     $b = $this->db->prepare($bsql); 
        //     $b->bindValue(":name" ,$modelData);
        //     $result = $b->execute();
        
        //     $ssql = "INSERT INTO size (model_id,size) VALUES (LAST_INSERT_ID(),:name)";
        //     $s = $this->db->prepare($ssql); 
        //     $s->bindValue(":name" ,$sizeData);
        //     $result = $s->execute();
        
    }

    
public function readWhere($sql, $where = '', $join = ''){
    if($where != ''){
        $where = $where;
    }

    if($join != ''){
        $join = $join;
    }
    $stmt = $this->db->prepare($sql . $where . $join );
    $stmt->execute();
    // $user = $stmt->fetch();
    while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[]=$r;
        }
        return $data;
}
public function showBrand($table1){
        
$sql="SELECT * FROM `$table1` Group by name ";
         
$q = $this->db->query($sql) or die("failed!");
while($r = $q->fetch(PDO::FETCH_ASSOC)){
$data[]=$r;
}
return $data;
}

        
public function showModel($table1,$table2){
        
    $idDat = $_SESSION["idDat"];

$sql="SELECT * FROM $table1 as pt INNER JOIN $table2 as pb ON pt.id = pb.brand_id WHERE pt.name = '$idDat'";
         
$q = $this->db->query($sql) or die("failed!");
while($r = $q->fetch(PDO::FETCH_ASSOC)){
$data[]=$r;
}
return $data;
}
public function showSize($table1,$table2){
        
    $idMod = $_SESSION["idMod"];

$sql="SELECT * FROM $table1 as pt INNER JOIN $table2 as pb ON pt.id = pb.model_id WHERE pt.name = '$idMod'";
         
$q = $this->db->query($sql) or die("failed!");
while($r = $q->fetch(PDO::FETCH_ASSOC)){
$data[]=$r;
}
return $data;
}

public function ReadEmployeeEmail($email,$table){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM employee WHERE email = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(array($email));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
    $passwordDB = $result["password"];
    
    if(password_verify($password,$passwordDB)){
        echo "<br>succesvolle login!";
        
        $_SESSION["USER_NAME"] = $name;
        $_SESSION["ID"] = session_id();
        $_SESSION["USER_ID"] = $result["id"];
        $_SESSION["PERM"] = "Employee";
        $_SESSION["E-MAIL"] = $result["email"];
        $_SESSION["STATUS"] = "ACTIEF";
        $_SESSION["ROL"] = 1;
        
    }else{
        echo "<br>Wachtwoord of e-mail komt niet overeen";
    }
}
}
public function insertData($name,$email,$hash,$table){
          
    $sql = "INSERT INTO $table SET name=:name,email=:email,password=:hash";
         
    $q = $this->db->prepare($sql);
         
    $q->execute(array(':name'=>$name,':email'=>$email,':hash'=>$hash));
          
    return true;
          
   }  
   public function AddShoes($name,$modelData,$sizeData,$table,$table2,$table3){

    $sql = "INSERT INTO $table (name) VALUES (:name)";
    $q = $this->db->prepare($sql);    
    $q->bindValue(":name" ,$name);
    $result = $q->execute();

    $bsql = "INSERT INTO $table2 (brand_id,name) VALUES (LAST_INSERT_ID(),:name)";
    $b = $this->db->prepare($bsql); 
    $b->bindValue(":name" ,$modelData);
    $result = $b->execute();

    $ssql = "INSERT INTO $table3 (model_id,size) VALUES (LAST_INSERT_ID(),:name)";
    $s = $this->db->prepare($ssql); 
    $s->bindValue(":name" ,$sizeData);
    $result = $s->execute();

    return true;

   }
      
    public function showModelDel($table1,$table2){
            
        $idDat = $_SESSION["idDat"];
    
    $sql="SELECT * FROM $table1 as pt INNER JOIN $table2 as pb ON pt.id = pb.brand_id WHERE pb.brand_id = '$idDat'";
             
    $q = $this->db->query($sql) or die("failed!");
    while($r = $q->fetch(PDO::FETCH_ASSOC)){
    $data[]=$r;
    }
    return $data;
    }

    public function showSizeDel($table1){
            
        $idModel = $_SESSION["idMod"];
    
    $sql="SELECT * FROM $table1 WHERE id = '$idModel'";
             
    $q = $this->db->query($sql) or die("failed!");
    while($r = $q->fetch(PDO::FETCH_ASSOC)){
    $data[]=$r;
    }
    return $data;
    }
         
   public function DeleteSize($idModel,$table){
    $idSize = $_SESSION["idSize"];
   
    
    $sql="DELETE FROM $table WHERE model_id=:model";
    $q = $this->db->prepare($sql);
    $q->execute(array(':model'=>$idModel));


    return true;

   }
   public function DeleteModel($idModel,$table){
   
    $idModel = $_SESSION["idMod"];
   

    $msql="DELETE FROM $table WHERE id=:brand";
    $m = $this->db->prepare($msql);
    $m->execute(array(':brand'=>$idModel));
        

    return true;

   }
   public function DeleteBrand($id,$table){
   
    $id = $_SESSION["idDat"];
    

    $bsql="DELETE FROM $table WHERE id=:id";
    $b = $this->db->prepare($bsql);
    $b->execute(array(':id'=>$id));

    return true;

   }
   public function updateSize($size,$table){
    $sizeUpdate = $_SESSION["idSize"];  
   
    $sql = "UPDATE $table SET size = :size WHERE model_id = $sizeUpdate";
     $q = $this->db->prepare($sql);
     $q->execute(array(':size'=>$size));
     return true;
    
}  
   public function updateModel($model,$table){
    $modelUpdate = $_SESSION["idMod"];  
   
    $sql = "UPDATE $table SET name = :name WHERE id = $modelUpdate";
     $q = $this->db->prepare($sql);
     $q->execute(array(':name'=>$model));
     return true;
    
}  
   public function updateBrand($brand,$table){
    $brandUpdate =  $_SESSION["idDat"];  
   
    $sql = "UPDATE $table SET name = :name WHERE id = $brandUpdate";
     $q = $this->db->prepare($sql);
     $q->execute(array(':name'=>$brand));
     return true;
    
}  

}