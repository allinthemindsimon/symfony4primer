<?php

namespace App\Controller;

use App\entity\Article;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ArticleController extends Controller
{
    /** @Route("/")
     * @Method({"GET"})
     */

    public function index()
    {
        $articles = ['article1', 'article2'];
        // return new Response('<html><body>hello world</body></html>');
        return $this->render('articles/index.html.twig', ['articles' => $articles]);
    }

    /** @Route("/article/save")
     * 
     */

    public function save($request)
    {
        die($request);
        $entityManager = $this->getDoctrine()->getManager();
        $article = new Article();
        $article->setTitle('Title-1');
        $article->setBody('body text for article 1.');

        $entityManager->persist($article);
        $entityManager->flush();
        dump($article);
        die('check dump debug log');

        return new Response('Saves an article with ID of ' . $article->getId());
    }
}
