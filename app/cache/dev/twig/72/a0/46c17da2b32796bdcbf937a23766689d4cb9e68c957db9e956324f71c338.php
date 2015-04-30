<?php

/* NoobUserBundle:Buttons:followme.html.twig */
class __TwigTemplate_72a046c17da2b32796bdcbf937a23766689d4cb9e68c957db9e956324f71c338 extends Twig_Template
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
        // line 12
        echo "
";
        // line 13
        if ((!$this->getAttribute($this->getContext($context, "app"), "user", array()))) {
            // line 14
            echo "<button type=\"button\" class='follow-me' data-user-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "id", array()), "html", null, true);
            echo "\"></button>
";
        } else {
            // line 16
            echo "    ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "id", array()) == $this->getAttribute($this->getContext($context, "userToFollow"), "id", array()))) {
                // line 17
                echo "        ";
                // line 18
                echo "    ";
            } elseif (twig_in_filter($this->getContext($context, "userToFollow"), $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "usersIFollow", array()))) {
                // line 19
                echo "        <button type=\"button\" class='follow-me selected' data-user-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "id", array()), "html", null, true);
                echo "\"></button>
    ";
            } else {
                // line 21
                echo "        <button type=\"button\" class='follow-me' data-user-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "id", array()), "html", null, true);
                echo "\"></button>
    ";
            }
        }
        // line 24
        echo "

";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Buttons:followme.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 24,  44 => 21,  38 => 19,  35 => 18,  33 => 17,  30 => 16,  24 => 14,  22 => 13,  19 => 12,);
    }
}
