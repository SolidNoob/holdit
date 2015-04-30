<?php

/* NoobUserBundle:Test:list.html.twig */
class __TwigTemplate_4e67edd44badee9b032fef4623fa920e1f4f7c7d0058e095a92cb9a831d43161 extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "list"));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 3
            echo "    <li>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo ".";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["user"], "role", array()), "id", array()), "html", null, true);
            echo ".";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["user"], "role", array()), "role", array()), "html", null, true);
            echo "</li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "</ul>

";
        // line 7
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 8
            echo "    USER!!!
";
        }
        // line 10
        if ($this->env->getExtension('security')->isGranted("ROLE_ENTREPRISE")) {
            // line 11
            echo "    ENTREPRISE!!!
";
        }
        // line 13
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 14
            echo "    ADMIN!!!
";
        }
        // line 16
        echo "</body>";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Test:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 16,  59 => 14,  57 => 13,  53 => 11,  51 => 10,  47 => 8,  45 => 7,  41 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
