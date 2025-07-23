<?php

namespace App\Controller;

use Demo\Ajax\App\Test as AppTest;
use Demo\Ajax\App\Buttons as AppButtons;
use Demo\Ajax\Ext\Test as ExtTest;
use Demo\Ajax\Ext\Buttons as ExtButtons;
use Jaxon\Demo\Calc\Package as CalcPackage;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use function rq;

class DemoController extends AbstractController
{
    #[Route('/', name: 'jaxon.home')]
    public function __invoke()
    {
        return $this->render('demo/index.html.twig', [
            'pageTitle' => "Symfony Framework",
            'rqAppTest' => rq(AppTest::class),
            'rqAppButtons' => rq(AppButtons::class),
            'rqExtTest' => rq(ExtTest::class),
            'rqExtButtons' => rq(ExtButtons::class),
            'calcPackageClass' => CalcPackage::class,
        ]);
    }
}
