<?php
/**
 * =============================================================================================
 *                Arquivo de configuração do banco de dados/PDO e da const BASE_URL 
 * =============================================================================================
 */

    require 'environment.php';
    
    if (ENVIRONMENT == 'development') {
        define('BASE_URL', 'http:///');
        $config['dbname'] = 'valor_do_bitcoin'; //Usei essa tabela para exemplo
        $config['host'] = '127.0.0.1'; //ou 'localhost'
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }
    else { //Se não => ENVIRONMENT = 'production'
        define('BASE_URL', 'www.meusite.com.br');
        $config['dbname'] = 'estrutura_mvc';
        $config['host'] = '127.0.0.1';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }

    global $db;

    try {
        $db = new PDO('mysql:dbname='.$config['dbname'].';host='.$config['host'],$config['dbuser'],$config['dbpass'],);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die($e->getMessage());
        exit();
    }

?>