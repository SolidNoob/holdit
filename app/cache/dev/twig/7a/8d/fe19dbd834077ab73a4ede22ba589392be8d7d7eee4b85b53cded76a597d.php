<?php

/* NoobUserBundle:Test:testpourcrop.html.twig */
class __TwigTemplate_7a8dfe19dbd834077ab73a4ede22ba589392be8d7d7eee4b85b53cded76a597d extends Twig_Template
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
        echo "<!doctype html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <title>Titre</title>
    </head>
    <body>
        
        ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form');
        echo "
        <h1>Page crop!</h1>
        <img src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('liip_imagine')->filter("uploads/documents/user3.jpg", "very_big"), "html", null, true);
        echo "\" />
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Test:testpourcrop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 11,  29 => 9,  19 => 1,);
    }
}
