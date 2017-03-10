<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\Article;

class ArticlesController extends Controller
{
    /**
     * Get all articles.
     *
     * ### Response
     *
     * ```
     * [
     *  {
     *      "id": 1,
     *      "title": "Article 1",
     *      "lead": "Article lead 1",
     *      "body": "Body",
     *      "created_at": "2017-03-08T17:00:00+0000",
     *      "created_by": "Author",
     *      "slug": "article-1"
     *  },
     *  {
     *      "id": 2,
     *      "title": "Article 2",
     *      "lead": "Article lead 1",
     *      "body": "Body",
     *      "created_at": "2017-03-08T17:00:00+0000",
     *      "created_by": "Author",
     *      "slug": "article-2"
     *  }
     * ]
     * ```
     *
     * @ApiDoc(
     *      section="Articles",
     *      statusCodes={
     *         200="Success"
     *      }
     * )
     *
     * @View
     *
     * @return Article[]
     */
    public function getArticlesAction()
    {
        return $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Article')
            ->findAll()
        ;
    }

    /**
     * Get one article by id.
     *
     * ### Response
     *
     * ```
     * {
     *      "id": 1,
     *      "title": "Article 1",
     *      "lead": "Article lead 1",
     *      "created_at": "2017-03-08T17:00:00+0000",
     *      "created_by": "Author",
     *      "slug": "article-1"
     * }
     * ```
     *
     * @ApiDoc(
     *      section="Articles",
     *      statusCodes={
     *         200="Success",
     *         404="This article does not exists"
     *      }
     * )
     *
     * @View
     *
     * @param int $id
     *
     * @return int
     */
    public function getArticleAction($id)
    {
        $article = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Article')
            ->find($id)
        ;

        if (null === $article) {
            throw new NotFoundHttpException('This article does not exists');
        }

        return $article;
    }
}
