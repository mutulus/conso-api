<?php

namespace App\Controller;

use App\Form\LoginFormType;
use App\Form\PersonneType;
use App\Model\LoginModel;
use App\Model\PersonneModel;
use App\Service\ApiLogin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{


    private ApiLogin $apiLogin;

    /**
     * @param ApiLogin $apiLogin
     */
    public function __construct(ApiLogin $apiLogin)
    {
        $this->apiLogin = $apiLogin;
    }


    #[Route('/personne/register', name: 'app_personne_register')]
    public function register(RequestStack $request): Response
    {
        $personne = new PersonneModel();
        // Créer le formulaire
        $form = $this->createForm(PersonneType::class, $personne);

        // Traiter la soumission du formulaire
        $form->handleRequest($request->getCurrentRequest());
        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement des données
            //...
            // Ajouter un message flash
            $this->addFlash("success", "La personne a été enregistrée");
            return $this->redirectToRoute("app_accueil"); // Redirection vers la route désirée
        }

        return $this->render('personne/index.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/login', name: 'app_login')]
    public function login(RequestStack $request):Response
    {
        $user=new LoginModel();
        $form=$this->createForm(LoginFormType::class,$user);
        $form->handleRequest($request->getCurrentRequest());
        if ($form->isSubmitted() &&  $form->isValid()){
            $user=$form->getData();
            $token=$this->apiLogin->SeLog($user->getEmail(),$user->getPass());
            $request->getSession()->set('token',$token["token"]);
            $this->addFlash("success", "Vous avez bien été connecté, votre token est ". $request->getSession()->get('token'));
            return $this->redirectToRoute("app_accueil"); // Redirection vers la route désirée
        }
        return $this->render('personne/login.html.twig', [
            'form' => $form
        ]);
    }

}
