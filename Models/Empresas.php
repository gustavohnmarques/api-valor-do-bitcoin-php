<?php

namespace Models;

use \Core\Model;

class Empresas extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllEmpresas(string $campos)
    {
        $res = $this->pdo->query("SELECT ".$campos." FROM empresas WHERE ativo = 1");

        if ($res->rowCount() == 0) {
            return false;
        }

        return $res->fetchAll(2);
    }

    public function updateEmpresa(object $empresa)
    {
        $sql = 'UPDATE empresas SET last = :last, vol = :vol WHERE id = :id';
        $sth = $this->pdo->prepare($sql);
        
        $sth->execute(array(
            ':last' => $empresa->last,
            ':vol' => $empresa->vol,
            ':id' => $empresa->id,
        ));
    
    }
}
