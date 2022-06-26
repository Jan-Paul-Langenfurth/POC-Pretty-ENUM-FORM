<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EnumTestType;
use App\Utils\Enums\SimplePrettyEnum;
use Symfony\Component\HttpFoundation\Request;


#[Route('/test', name:"test")]
class PrettyController extends AbstractController {
    
    #[Route("/", name:"index")]
    function index(Request $request) {
//        var_dump(SimplePrettyEnum::getPretty());
//        die();

        $form = $this->createForm(EnumTestType::class, );
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            dd($form);
        }

        $test = "TEST Twig";
        return $this->render('Enum/EnumTest.html.twig', [
            'test'=> $test,
            'form' => $form->createView(),
        ]);

        return $this->json(['Content'=> 'test']);
    }
}