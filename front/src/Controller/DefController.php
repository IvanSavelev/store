<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
class DefController
{
    public function index(): Response
    {
        return new Response(
            '<html><body>Lucky number: '.'ds'.'</body></html>'
        );
}
}