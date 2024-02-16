<?php

namespace App\Middlewares;

use App\App\Config;
use App\Core\Http\Request;
use function App\Helper\response;

class MustLoginAdmin implements Middleware
{
    public function process(Request $request): bool
    {   
        $session = $request->getSession(Config::get('session.name'), Config::get('session.key'));
        
        if($this->isAdmin($session)){
            return true;
        }
        return response()->setNotFound();
    }

    private function isAdmin($session): bool
    {
        return $session !== null && $session->role == 1;
    }
}