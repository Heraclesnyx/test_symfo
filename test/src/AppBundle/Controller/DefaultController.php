<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Student;
use AppBundle\Form\StudentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="home")
     **/
    public function indexAction()
    {
        return $this->redirectToRoute('student_index');
    }


    public function createregisterAction(Request $request)
    {
        $admin = new Student();
        $form = $this->createForm(StudentType::class, $admin);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($admin);
            $entityManager->flush();
            return $this->redirectToRoute('Auth/login');
        }
        return $this->render('Auth/register',[
            'form'=> $form->createView(),
            'loginPage' => 1
        ]);
    }
    /**
     * @Route("/login", name="login")
     **/

    /*Rediriger la route vers une nouvelle URL*/
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('Auth/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}
