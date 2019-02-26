<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WebsiteController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"}, name="website")
     * @param ArticleRepository $repository
     * @return Response
     */
    public function indexAction(ArticleRepository $repository): Response
    {
        $articles = $repository->lastFive();

        return $this->render('index.html.twig', compact('articles'));
    }

    /**
     * @Route("/article/{slug}", methods={"GET"}, name="article.show")
     * @param Article $article
     * @return Response
     */
    public function articleShowAction(Article $article): Response
    {
        return $this->render('articles/article.html.twig', compact('article'));
    }
}