<?php
class config{
    private static $instance = NULL;
    public static function getConnexion(){
        if(!isset(self::$instance)){
            try{
                self::$instance = new PDO('localhost','root','');
            }
            catch(Exception $e){
                die('Erreur : ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}


?>