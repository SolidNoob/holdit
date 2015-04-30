<?php

namespace Noob\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

use Noob\SiteBundle\CustomClass\PaginatorHelper;

class GlobalController extends Controller
{
    public function homePageAction()
    {
        $em = $this->getDoctrine()->getManager();
        $userRepo = $em->getRepository('NoobUserBundle:User');
        $postRepo = $em->getRepository('NoobPostBundle:Post');
        
        $paginatorHelper = new PaginatorHelper();
        
        //get the 4 last students looking for job or for internship 
        $lastStudentsLookingFor = $userRepo->getStudentsLookingForJobOrInternship(4, 'desc');
        $lastStudentsLookingFor = $paginatorHelper->paginatorToArray($lastStudentsLookingFor);
        
        //get the 4 last offers
        $lastOffres = $postRepo->getPostsByType('%offre%',4,'desc');
        $lastOffres = $paginatorHelper->paginatorToArray($lastOffres);
        
        //get the 4 last portfolio item
        $lastPortfolioItems = $postRepo->getPostsByType('portfolio',4,'desc');
        $lastPortfolioItems = $paginatorHelper->paginatorToArray($lastPortfolioItems);
        
        //get the 4 last users profil
        $lastUsers = $userRepo->getSomeUsers(4, 'desc');
        $lastUsers = $paginatorHelper->paginatorToArray($lastUsers);
        
        //get the TFE list
        $lastTFE = $postRepo->getPostsByType('tfe',4,'desc');
        $lastTFE = $paginatorHelper->paginatorToArray($lastTFE);
        
        return $this->render('NoobSiteBundle:Global:homepage.html.twig', array(
            'studentsLookingFor' => $lastStudentsLookingFor,
            'lastOffres' => $lastOffres,
            'lastPortfolioItems' => $lastPortfolioItems,
            'lastUsers' => $lastUsers,
            'lastTFE' => $lastTFE
        ));
    }
}
 