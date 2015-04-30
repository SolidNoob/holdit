<?php

/* NoobUserBundle:Test:testtest.html.twig */
class __TwigTemplate_6074ea056b3bf538b1df9277ccba5542906e5818952698fe907c7f083f558fdd extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "list"));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 2
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
            echo " : ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["user"], "role", array()), "role", array()), "html", null, true);
            echo " <br/>
";
            // line 3
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["user"], "usersFollowed", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["followed"]) {
                // line 4
                echo twig_escape_filter($this->env, $this->getAttribute($context["followed"], "username", array()), "html", null, true);
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['followed'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 5
            echo " <br/><br/><br/>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "


</body>";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Test:testtest.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 7,  41 => 5,  33 => 4,  29 => 3,  23 => 2,  19 => 1,);
    }
}
