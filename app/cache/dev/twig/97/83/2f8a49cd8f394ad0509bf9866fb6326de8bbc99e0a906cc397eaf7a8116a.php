<?php

/* :default:layout.html.twig */
class __TwigTemplate_97832f8a49cd8f394ad0509bf9866fb6326de8bbc99e0a906cc397eaf7a8116a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "    
    ";
        // line 19
        $this->env->loadTemplate("NoobSiteBundle:Global:navbar.html.twig")->display($context);
        // line 20
        echo "    ";
        $this->displayBlock('content', $context, $blocks);
        // line 21
        echo "
";
    }

    // line 20
    public function block_content($context, array $blocks = array())
    {
        echo " ";
    }

    public function getTemplateName()
    {
        return ":default:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 20,  40 => 21,  37 => 20,  35 => 19,  32 => 18,  29 => 17,);
    }
}
