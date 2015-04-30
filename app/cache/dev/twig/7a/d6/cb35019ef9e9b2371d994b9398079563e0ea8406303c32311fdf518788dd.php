<?php

/* NoobTagBundle:Global:tagList.html.twig */
class __TwigTemplate_7ad6cb35019ef9e9b2371d994b9398079563e0ea8406303c32311fdf518788dd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 13
        echo "
<ul class='tag-list'>
    ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tagList"));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 16
            echo "    <li><a href='";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_site_searchContent", array("search" => $this->getAttribute($context["tag"], "name", array()))), "html", null, true);
            echo "' class='tag'>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "name", array()), "html", null, true);
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "NoobTagBundle:Global:tagList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 18,  27 => 16,  23 => 15,  19 => 13,);
    }
}
