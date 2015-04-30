<?php

namespace Noob\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OffreController extends Controller
{
    public function detailAction($id,$slug)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('NoobPostBundle:Post');
        
        $offre = $repository->getOneByFullSlug($id,$slug, 'offre');
        $tags = $offre->getTags();
        $type = $offre->getType()->getName();
        $otherOffres = $repository->getSimilarByTags($id,$tags,$type,10);
        $tmp_array = array();
        foreach($otherOffres as $off){
            $tmp_array[] = $off;
        }
        shuffle($tmp_array);
        return $this->render('NoobPostBundle:Offre:offreDetail.html.twig', array(
                'item' => $offre,
                'otherItems' => $tmp_array,
        ));
    }
}
