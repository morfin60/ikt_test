<?php
// src/SiteBundle/Controller/ExceptionController.php
namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\TwigBundle\Controller\ExceptionController as TwigExceptionController;

class ExceptionController extends Controller
{
    public function __construct(TwigExceptionController $exceptionController)
    {
        $this->exceptionController = $exceptionController;
    }

    public function showExceptionAction(Request $request, FlattenException $exception, DebugLoggerInterface $logger = null)
    {
        if ($exception->getStatusCode() == 404) {
            return $this->render('@Site/errors/404.html.twig');
        }

        return $this->exceptionController->showAction($request, $exception, $logger);
    }
}
