<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact', methods: ["POST"])]
    public function contact(
        Request $request,
        ValidatorInterface $validator,
        MailerInterface $mailer,
        #[Autowire('%env(email)%')] string $myEmail
    ): Response {
        if (!$this->isCsrfTokenValid('contact', $request->request->getString('token'))) {
            return new Response('Invalid CSRF token', 422);
        }

        $data = $request->request->all();
        $errors = $validator->validate($data, new Assert\Collection([
            'name' => new Assert\NotBlank(message: 'Name is required!'),
            'email' => new Assert\Email(),
            'message' => new Assert\NotBlank(message: 'Message is required!'),
            'token' => []
        ]));
        if ($errors->count()) {
            return new Response(json_encode(['errors' => [trim($errors[0]->getPropertyPath(), '[]') => $errors[0]->getMessage()]]), 422);
        }

        $email = (new Email())
            ->from(new Address($data['email'], $data['name']))
            ->to($myEmail)
            ->subject('Portfolio contact!')
            ->text($data['message'])
        ;
        $mailer->send($email);

        return new Response('success');
    }
}
