<?php
/**
 * CLASSE MULTI METODOS PARA RESOLVER SITUACOES  COMUNS ENTRE AS CLASSES
 *
 * @author Diego Andrade
 * @date 20-06-2017
 */
namespace util;

class Util
{
    
    /**
     * Metodo que gera um valor de String aleatório do tamanho recebendo por parametros
     * @paramn $size: tamanho da string
     * @return String
    */
    public static function randString($size)
    {
        //String com valor possíveis do resultado
        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        $return= "";

        for($count= 0; $size > $count; $count++){
            $return.= $basic[rand(0, strlen($basic) - 1)];
        }

        return $return;
    }

    /**
     * Metodo que formata data | input dd/mm/aaaa - output output aaaa-mm-dd
     * @paramn $data: tamanho da string
     * @paramn $db: boolean se e para o banco ou se veio do banco
     * @return String
     */
    public static function formataData($data, $db = true)
    {
        $ex = ($db == true)
                ?
                    explode("/",$data) : explode("-",$data);

        $data = $ex[2]."-".$ex[1]."-".$ex[0];

        return $data;
    }
}
