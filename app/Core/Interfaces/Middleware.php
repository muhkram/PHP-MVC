<?php
namespace MA\PHPMVC\Core\Interfaces;

use MA\PHPMVC\Core\Interfaces\Request;

interface Middleware {
    public function process(Request $request): bool;
}
