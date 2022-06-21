<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EnumTestType;
namespace App\Utils\Enums\SimplePrettyEnum;


#[Route('/test', name:"test")]
class PrettyController extends AbstractController {
    
    #[Route("/", name:"index")]
    function index() {
        dd(SimplePrettyEnum::getPretty());

        $form = $this->createForm(EnumTestType::class);
        $test = "TEST Twig";
        return $this->render('Enum/EnumTest.html.twig', [
            'test'=> $test,
            'form' => $form->createView(),
        ]);

        return $this->json(['Content'=> 'test']);
    }
}