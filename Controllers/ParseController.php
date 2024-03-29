<?php

namespace Controllers;

use \Core\Controller;

class ParseController extends Controller
{

    public function MercadoBitcoin(string $res): object
    {
        $parse = json_decode($res);        
        return (object) array(
            'last' => $parse[0]->last,
            'vol' => $parse[0]->vol,
        );
    }

    public function BityPreco(string $res): object
    {
        $parse = json_decode($res);
        return (object) array(
            'last' => $parse->last,
            'vol' => $parse->vol,
        );
    }

    public function Binance(string $res): object
    {
        $parse = json_decode($res);
        return (object) array(
            'last' => $parse->lastPrice,
            'vol' => $parse->volume,
        );
    }

    public function Foxbit(string $res): object
    {
        $parse = json_decode($res);
        return (object) array(
            'last' => $parse->price,
            'vol' => 0,
        );
    }

    public function BrasilBitcoin(string $res): object
    {
        $parse = json_decode($res);
        return (object) array(
            'last' => $parse->last,
            'vol' => $parse->vol,
        );
    }

    public function Ripio(string $res): object
    {
        $parse = json_decode($res);
        return (object) array(
            'last' => $parse->data->last,
            'vol' => $parse->data->volume,
        );
    }

    public function Coinext(string $res): object
    {
        $parse = json_decode($res);
        return (object) array(
            'last' => $parse[0][4],
            'vol' => 0,
        );
    }

    public function Bitso(string $res): object
    {
        $parse = json_decode($res);
        return (object) array(
            'last' => $parse->payload->last,
            'vol' => $parse->payload->volume,
        );
    }

    public function NovaDax(string $res): object
    {
        $parse = json_decode($res);
        return (object) array(
            'last' => $parse->data->lastPrice,
            'vol' => $parse->data->baseVolume24h,
        );
    }

    public function FlowBtc(string $res): object
    {
        $parse = json_decode($res);
        return (object) array(
            'last' => $parse->LastTradedPx,
            'vol' => $parse->Volume,
        );
    }

    public function Bitnuvem(string $res): object
    {
        $parse = json_decode($res);
        return (object) array(
            'last' => $parse->ticker->last,
            'vol' => $parse->ticker->vol,
        );
    }

    
    
}
