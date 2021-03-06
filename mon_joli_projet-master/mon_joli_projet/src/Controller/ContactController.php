<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactType::class);

        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $email = (new Email())
                ->from($contactFormData['from'])
                ->to('melissadacosta2712@gmail.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('melissa@exemple.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                //->text('Sending mails is fun again!')
                //html('<p>See Twig intagration for better HTML integration!</p>')
                ->text($contactFormData['message']);
        
            $mailer->send($email);
            
            $this->addFlash('success','Votre message a été envoyé !');

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'contact_form' => $form->createView()
        ]);
    }
}
