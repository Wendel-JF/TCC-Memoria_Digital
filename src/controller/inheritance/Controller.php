<?php

namespace My_Web_Struct\controller\inheritance;

use Nyholm\Psr7\Response;

class Controller
{
    
    public function getHTTPBodyBuffer(String $viewPath, array $datas = [])
    {
        
        ob_start();
        extract($datas);
        require __DIR__ . '/../../view' . $viewPath;
        $bodyHTTP = ob_get_clean();
        return $bodyHTTP;
    }

    public function validateCredentials(array $credentials)
    {   
        if (!in_array($_SESSION["credential"], $credentials)) {
            return new Response(302, ["Location" => "/erro/acesso_negado"],);
        }
        return null;
    }
}
