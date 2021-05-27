<?php

namespace App\Controller\Home;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
  public function index(): Response
  {
    return $this->render('pages/home/home_basis.html.twig', [
    ]);
  }
}