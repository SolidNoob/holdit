<?php

/* NoobUserBundle:Global:likersList.html.twig */
class __TwigTemplate_20d4b7e1730792325a000cebcc67aaf7d4fb8e323e892cc4289c9141d562c714 extends Twig_Template
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
        // line 1
        echo "<ul>
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "likersList"));
        foreach ($context['_seq'] as $context["_key"] => $context["liker"]) {
            // line 3
            echo "    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($context["liker"], "slug", array()))), "html", null, true);
            echo "\" class='violet-me'>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["liker"], "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["liker"], "surname", array()), "html", null, true);
            echo "</a></li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['liker'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Global:likersList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
