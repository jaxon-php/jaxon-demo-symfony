<?php

namespace App\Controller;

use Jaxon\Demo\Ajax\Bts;
use Jaxon\Demo\Ajax\Pgw;
use Jaxon\Symfony\Jaxon;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use function jaxon;
use function pm;

class DemoController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request, Jaxon $jaxon, LoggerInterface $logger)
    {
        // Print the page
        return $this->render('demo/index.html.twig', [
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "Symfony Framework",
            // Jaxon request to the Bts Jaxon class
            'bts' => $jaxon->request(Bts::class),
            // Jaxon request to the Pgw Jaxon class
            'pgw' => $jaxon->request(Pgw::class),
            // Jaxon Request Factory
            'pm' => pm(),
        ]);
    }

    /**
     * @Route("/jaxon", name="jaxon.ajax")
     */
    public function jaxon(Jaxon $jaxon)
    {
        if(!$jaxon->canProcessRequest())
        {
            return; // Todo: return an error message
        }

        $jaxon->processRequest();
        return $jaxon->httpResponse();
    }
}
