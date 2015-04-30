<?php

namespace Noob\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PortfolioController extends Controller
{
    public function detailAction($id,$slug)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('NoobPostBundle:Post');
        
        $mainItem = $repository->getOneByFullSlug($id,$slug, 'portfolio');
        $author = $mainItem->getAuthor();
        $otherItems = $repository->getCompletePortfolioByAuthor($author);
        
        foreach($otherItems as $key=>$project){
            
            if($project->getId() == $mainItem->getId()){
                $current = $key;
                $previous = ($current == 0)? null: $key-1;
                $next = ($current == count($otherItems)-1)? null:$key+1;
                unset($otherItems[$current]);
                break;
            }
        }
        return $this->render('NoobPostBundle:Portfolio:portfolioDetail.html.twig', array(
                'item' => $mainItem,
                'otherItems' => $otherItems,
                'previousItem' => $previous,
                'nextItem' => $next,
        ));
    }
}
