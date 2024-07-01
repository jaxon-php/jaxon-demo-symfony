<?php

namespace App\Controller;

use Jaxon\Demo\Ajax\App\Test as AppTest;
use Jaxon\Demo\Ajax\App\Buttons as AppButtons;
use Jaxon\Demo\Ajax\Ext\Test as ExtTest;
use Jaxon\Demo\Ajax\Ext\Buttons as ExtButtons;
use Jaxon\Symfony\Jaxon;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use function Jaxon\rq;

class DemoController extends AbstractController
{
    #[Route('/', name: 'jaxon.home')]
    public function index(Jaxon $jaxon)
    {
        // Print the page
        return $this->render('demo/index.html.twig', [
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "Symfony Framework",
            'appTest' => rq(AppTest::class),
            'rqAppButtons' => rq(AppButtons::class),
            'extTest' => rq(ExtTest::class),
            'rqExtButtons' => rq(ExtButtons::class),
        ]);
    }

    #[Route('jaxon', name: 'jaxon.ajax', methods: ['POST'])]
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
