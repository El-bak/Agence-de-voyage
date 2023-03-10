<?php
$tab = array();
$tab_length = readline("Entrez la taille du tableu");
for($i=0; $i<$tab_length; $i++){
    $random = random_int(1,500);
    echo 'entrez une date de reservation';
    $date = readline('date_reservation: ');
    $newTab = array('id_random'=>$b, 'money'=>$c);
    array_push($a, $d);
    }
print_r($a);
class database{
    private $user;
    private $password;
    private $host;
    private $database;
public function __construct($user,$password,$database,$host){
    $this->user = $user;
    $this->password = $password ;
    $this->database = $database;
    $this->host = $host;
}
public function connexion_database($user,$password,$host,$database){
    try{
$connexion = new PDO('mysql:host='.$host.';dbname=test;charset=utf8',$user, $password);
        if($connexion){
            return $connexion;
        }else{
            throw new Exception("Connexion perdue !");
        }
    }catch(Exception $e){
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}
}
class requests extends connexion_database{
    public function __construct(){
        parent::__construct($this->user,$this->password,$this->host,$this->database);
    }

}