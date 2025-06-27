<?php

namespace App\Controller;

use Demo\Ajax\App\Test as AppTest;
use Demo\Ajax\App\Buttons as AppButtons;
use Demo\Ajax\Ext\Test as ExtTest;
use Demo\Ajax\Ext\Buttons as ExtButtons;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DemoController extends AbstractController
{
    #[Route('/', name: 'jaxon.home')]
    public function __invoke()
    {
        // Print the page
        return $this->render('demo/index.html.twig', [
            'pageTitle' => "Symfony Framework",
            'rqAppTest' => rq(AppTest::class),
            'rqAppButtons' => rq(AppButtons::class),
            'rqExtTest' => rq(ExtTest::class),
            'rqExtButtons' => rq(ExtButtons::class),
        ]);
    }
}
