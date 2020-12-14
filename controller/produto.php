<?php

require_once('./model/modelProdutos.php');

class PRODUTO{

    public function mostrar($parametros){
       $dados =  produtos_get($parametros);        
        header('Content-Type: application/json; charset=utf-8');      
        echo json_encode(array('status' => 'sucesso', 'dados' => $dados));        
    }

    public function inserir($parametros){                
        $dados =  produtos_set($parametros);        
        header('Content-Type: application/json; charset=utf-8');      
        echo json_encode(array('status' => 'sucesso', 'dados' => $dados));
    }

    public function atualizar($parametros){                                
        $dados =  produtos_up($parametros);        
        header('Content-Type: application/json; charset=utf-8');      
        echo json_encode(array('status' => 'sucesso', 'dados' => $dados));
    }

    public function delete($parametros){                                
        $dados =  produtos_del($parametros);        
        header('Content-Type: application/json; charset=utf-8');      
        echo json_encode(array('status' => 'sucesso', 'dados' => $dados));
    }

    
}