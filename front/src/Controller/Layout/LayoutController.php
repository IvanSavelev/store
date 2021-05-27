<?php

namespace App\Controller\Home;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LayoutController extends AbstractController
{
  public function index(): Response
  {
    return $this->render('pages/layout/basis_root.html.twig', [
    ]);
  }
}