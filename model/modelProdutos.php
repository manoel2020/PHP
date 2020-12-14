<?php 
require_once('./conexao/conecta.class.php');


function produtos_get($parametros){ 
    try
    { 
    $opcao = '';      
    if(isset($parametros[0])){
        $opcao = 'Where id_produto = :id';
    }         
        $stmp = CON::getInstance()->prepare('select * from produto '.$opcao);
        $stmp->bindParam( ':id', $parametros[0],PDO::PARAM_INT );
        $stmp->execute();
        return $stmp->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        echo $e.getMessage();
    }
}

function produtos_set($parametros){
    try
    {
        $stmp = CON::getInstance()->prepare('insert into produto (produto,preco) values (:produto,:preco)');
        $stmp->bindParam(":produto",$parametros{'produto'});
        $stmp->bindParam(":preco",$parametros{'preco'});
        $stmp->execute();    
    } catch(PDOException $e){
        echo $e.getMessage();
    }
}

function produtos_up($parametros){    
    try{    
        $stmp = CON::getInstance()->prepare('update produto  set produto=:produto, preco=:preco where id_produto=:id');
        $stmp->bindParam(":id",$parametros{'id'});
        $stmp->bindParam(":produto",$parametros{'produto'});
        $stmp->bindParam(":preco",$parametros{'preco'});
        $stmp->execute();        
    } catch (PDOException $e){
        echo $e.getMessage();
    }
}

function produtos_del($parametros){    
    try{    
        $stmp = CON::getInstance()->prepare('delete from produto where id_produto = :id');
        $stmp->bindParam(":id",$parametros{0});
        $stmp->execute();        
    } catch (PDOException $e){
        echo $e.getMessage();
    }
}


/*$stmp = CON::getInstance()->prepare('select now()');

$stmp->execute();

while ($a = $stmp->fetch()) {
    # code...
    print_r($a);
}
*/