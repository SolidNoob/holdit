<?php

/* NoobUserBundle:Security:adminLogin.html.twig */
class __TwigTemplate_9859441a7494decab7d2b404972fa886a008839fd4022317c14840dfd076dcc3 extends Twig_Template
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
        if ($this->getContext($context, "error")) {
            // line 2
            echo "    <div>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "error"), "message", array()), "html", null, true);
            echo "</div>
";
        }
        // line 4
        echo "
<form action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("adminlogin_check");
        echo "\" method=\"post\">
    <label for=\"username\">Login :</label>
    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
        echo "\" />

    <label for=\"password\">Mot de passe :</label>
    <input type=\"password\" id=\"password\" name=\"_password\" />

    ";
        // line 17
        echo "
    <button type=\"submit\">login</button>
</form>";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Security:adminLogin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 17,  35 => 7,  30 => 5,  27 => 4,  21 => 2,  19 => 1,);
    }
}
