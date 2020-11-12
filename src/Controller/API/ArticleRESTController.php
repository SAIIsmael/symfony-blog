<?php

namespace App\Controller\API;

use App\Repository\UsersRepository;
use App\Repository\ArticleRepository;
use App\Repository\CommentsRepository;
use App\Repository\CategoriesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Encoder\XmlEncoder;


class ArticleRESTController extends AbstractController
{
       /**
     * @Route("/getarticles/{id}", name="getarticles")
     */
    public function index($id,UsersRepository $repoUsers, ArticleRepository $repoArticle, EntityManagerInterface $manager): Response
    {
        $articles = $repoArticle->findByPoster($id);
        dump($articles);

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $jsoncontent = $serializer->serialize($articles, 'json');
   
   
        $response = new Response($jsoncontent);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'get');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, *');
        return $response;
   
    }

}
