<?php

namespace App\Middlewares;

use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\MVC\View;

use function App\helper\response;
use function App\helper\userCurrent;

class MustLoginAdmin implements Middleware
{
    function process(Request $request): bool
    {
        $session = userCurrent();
        if($session !== null && $session->role == 1){
            return true;
        }
        response()->setStatus(404);
        response()->setContent(View::renderViewOnly(404, [
            'title' => Response::STATUS_TEXTS[403],
            'status' => [
                'code' => 403,
                'text' => Response::STATUS_TEXTS[403]
            ]
        ]));
        return false;
    }
}