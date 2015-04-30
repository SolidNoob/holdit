<?php

/* NoobTagBundle:Tag:tagSuggestion.html.twig */
class __TwigTemplate_31e6ce966211657bff1b63b94b5a06eb5052bce29ea1607e21d1209b10e32793 extends Twig_Template
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
        echo "<span class='text-left'>Suggestions:</span> 
";
        // line 14
        if ((!twig_test_empty($this->getContext($context, "tagList")))) {
            // line 15
            echo "<ul class='tag-cloud'>
    ";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tagList"));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 17
                echo "    <li><a href='#' class='tag clicktoadd'>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "name", array()), "html", null, true);
                echo "</a></li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "</ul>
";
        } else {
            // line 21
            echo "<p>Pas de suggestion</p>
";
        }
    }

    public function getTemplateName()
    {
        return "NoobTagBundle:Tag:tagSuggestion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 21,  40 => 19,  31 => 17,  27 => 16,  24 => 15,  22 => 14,  19 => 13,);
    }
}
