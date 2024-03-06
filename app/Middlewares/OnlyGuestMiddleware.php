<?php
namespace MA\PHPMVC\Middlewares;

use MA\PHPMVC\Core\Utility\Config;
use MA\PHPMVC\Core\Interfaces\Middleware;
use MA\PHPMVC\Core\Interfaces\Request;
use MA\PHPMVC\Core\Interfaces\Response;

class OnlyGuestMiddleware implements Middleware
{
    public function process(Request $request): bool
    {
        $user = $request->getSession(Config::get('session.name'), Config::get('session.key'));
        if ($user != null) {
            Response::redirect('/');
        }
        return true;
    }
}