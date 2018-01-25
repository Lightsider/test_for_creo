<?php

namespace AppBundle\Controller;

use Propel\Bundle\PropelBundle\PropelBundle\NewsQuery;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Propel\Bundle\PropelBundle\PropelBundle\News;

class DefaultController extends Controller
{
    /**
     * @Route("/{pageNumber}")
     */
    public function indexAction($pageNumber=1)
    {
        // replace this example code with whatever you need
        /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);*/

        $perPage=3;
        $countNews = NewsQuery::create()->count();
        $countPage=$countNews/$perPage;

        $news=NewsQuery::create()->paginate($pageNumber,$perPage);

        $html = $this->render('index/index.html.twig',[
            'news'=>$news,
            'countPage'=>$countPage
        ]);
        return new Response($html);
    }

    /**
     * @Route("/news/{id}")
     */
    public function showAction($id=1)
    {
        // replace this example code with whatever you need
        /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);*/

        $id=(int)$id;

        $new=NewsQuery::create()->findPk($id);

        $html = $this->render('news/index.html.twig',[
            'new'=>$new
        ]);
        return new Response($html);
    }

}
