<?php

namespace App\Controller;

use Jaxon\Symfony\App\Jaxon;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JaxonController extends AbstractController
{
    #[Route('jaxon', name: 'jaxon.ajax', methods: ['POST'])]
    public function __invoke(Jaxon $jaxon)
    {
        if(!$jaxon->canProcessRequest())
        {
            return; // Todo: return an error message
        }

        $jaxon->processRequest();
        return $jaxon->httpResponse();
    }
}
