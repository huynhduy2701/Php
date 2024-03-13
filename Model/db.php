<?php
    class db{
    //    private $host="localhost";
    var $db=null;
       public function __construct(){
        $dns='mysql:host=localhost;dbname=menu_demo';
        $user="root";
        $pass="";
        
    
       
            try {
                //code...
                // $this->conn= new PDO ("mysql:host=".$this->$host
                // .";dbname=".$this->$dbname,$this->$user
                // ,$this->$pass);
                // $this->conn->setAttribute(
                //     PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION
                // );
                $this->db=new PDO($dns,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
                    // echo "thanh cong";
            } catch (\Throwable $th) {
                //throw $th;
                echo "COnnection Faled";
                echo $th;
            }
       }

       public function query($query){
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt -> fetchAll();
       }
       
    function getList($select){
    $result=$this->db->query($select);//trả về nhiều dòng là 1 table;
    return $result;
    }
    //phương thứuc trả về 1 dòng
    function getInstance($select){
        $results=$this->db->query($select);//trả về một dòng
        //do trả về 1 dòng nên fetch luôn để lấy dữ liệu
        $result=$results->fetch();//result là array=(thuộc tính1:giá trị 1,thuộc tính2:giá trị 2,thuộc tính3:giá trị 3,...)
        return $result;
    }

    //phương thứuc thực thi câu lệnh insert update,delete thì ai thực thi ? exec

    // function exec($query){
    //     $result=$this->db->exec($result);
    //     return $result;
    // }
    function exec($query){
        $result=$this->db->exec($query);
        return $result;
    }

    //phương thức prepare

    function execep($query){
        $statement=$this->db->prepare($query);
        return $statement;
    }
    }


?>