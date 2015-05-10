<?php
namespace Noob\SiteBundle\CustomClass;

class PaginatorHelper
{    
    public function paginatorToArray($paginatorCollection){
        $arr = array();
        foreach($paginatorCollection as $p){
            $arr[] = $p;
        }
        return $arr;
    }
}