<?php
namespace Noob\SiteBundle\CustomClass;

class PaginatorHelper
{    
    /* stringToSlug():
     * Formate une chaîne de caractères pour la rendre exploitable par l'URL.
     * $str: la chaine à formater.
     * return: la nouvelle chaîne prête à être exploitée.
    */
    public function paginatorToArray($paginatorCollection){
        $arr = array();
        foreach($paginatorCollection as $p){
            $arr[] = $p;
        }
        return $arr;
    }
}