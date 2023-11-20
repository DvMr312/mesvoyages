<?php
namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AccueilController
 *
 * @author Utilisateur 1
 */
class AccueilController extends AbstractController{
    
    /**
     * @Route("/", name="accueil")
     * @return Response
     */
    public function index(): Response{
        $visites = $this->repository->findAllLasted(2);
        return $this->render("pages/accueil.html.twig", [
            'visites' => $visites
        ]); 
    }
    
    /**
     *
     * @var VisiteRepository
     */
    private $repository;

    /**
     * 
     * @param VisiteRepository $repository
     */
    public function __construct(VisiteRepository $repository) {
        $this->repository = $repository;
    }
}