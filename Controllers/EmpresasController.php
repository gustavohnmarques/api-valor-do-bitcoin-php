<?php

namespace Controllers;

use \Core\Controller;
use \Controllers\ParseController;

class EmpresasController extends Controller
{
    private $parser;

    public function __construct()
    {
        $this->parser = new ParseController();
    }

    public function index(){
        $sql = new \Models\Empresas();
        $response = $sql->getAllEmpresas('nome,last,vol,data_atualizacao,img');
        $this->returnJson($response, 200);
    }

    public function updateValuesCron()
    {
        $sql = new \Models\Empresas();
        $response = $sql->getAllEmpresas('id,code,url_tickers');

        for ($i = 0; $i < count($response); $i++) {

            //Fazer request da url da empresa                  
            $res = $this->CURL($response[$i]['url_tickers'], $response[$i]['id']);

            if (is_null($res)) {
                return;
            }

            $parse = $this->parseJson($res, $response[$i]['code']);

            //Atualizar banco com novo valor       
            $sql->updateEmpresa((object) array('last' => $parse->last, 'vol' => $parse->vol, 'id' => $response[$i]['id']));
        }

        //$this->returnJson($response, 200);
    }

    private function CURL(string $url, int $id): ?string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //Tratativa para verificar se é a coinext, ela só aceita POST
        if ($id == 7) {
            $payload = json_encode(array("OMSId" => 1, 'InstrumentId' => 1, 'Depth' => 1));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        }
        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return $httpcode == 200 ? $result : null;
    }

    //Identificar qual empresa está listando, e decodificar o JSON com base na resposta de cada empresa
    private function parseJson(string $res, string $code): object
    {
        return call_user_func_array(array($this->parser, $code), array($res));
    }
}
