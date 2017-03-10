<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;

class FrontController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $articles = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Article')
            ->findAll()
        ;

        return $this->render('Front/index.html.twig', array(
            'articles' => $articles,
        ));
    }

    /**
     * @Route("/article/{slug}")
     */
    public function articleAction($slug)
    {
        $article = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Article')
            ->findOneBySlug($slug)
        ;

        if (null === $article) {
            throw new NotFoundHttpException('This article does not exists');
        }

        return $this->render('Front/article.html.twig', array(
            'article' => $article,
        ));
    }

    /**
     * @Route("/creer")
     */
    public function createAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->persist($article);
                $em->flush();

                $this->addFlash('success', 'Article ajouté');

                return $this->redirectToRoute('app_front_index');
            }

            $this->addFlash('danger', 'Error lors de la sousmission de l\'article');
        }

        return $this->render('Front/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
