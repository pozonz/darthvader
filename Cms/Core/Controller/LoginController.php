<?php

namespace DarthVader\Cms\Core\Controller;


use DarthVader\Cms\Core\Traits\ManageControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route('/manage')]
class LoginController extends BaseController
{
    use ManageControllerTrait;

    #[Route('/login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render("/cms/{$this->_theme}/login.twig", [
            '_theme' => $this->_theme,
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
}
