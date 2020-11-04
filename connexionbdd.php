<?php
$db_config=array();
$db_config['SGBD']='mysql';
$db_config['HOST']='devbdd.iutmetz.univ-lorraine.fr';
$db_config['DB_NAME']='gao38u_php';
$db_config['USER']='gao38u_appli';
$db_config['PASSWORD']='2017qq2017';

//======================================================
//connection avec PDO
    try{$objPdo = new PDO
        ($db_config['SGBD'].':host='.$db_config['HOST'].';dbname='.$db_config['DB_NAME'],
        $db_config['USER'], $db_config['PASSWORD'],array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
            ));
        unset($db_config);
    }catch(Exception $exception){
        die($exception->getMessage());
    }
    
    
?>
