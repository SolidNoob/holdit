<?php

/* NoobUserBundle:Global:followButton.html.twig */
class __TwigTemplate_85681ebaaf664c66c8ca0e2798fa9c8095cb5d55c2096f65cdcdd537ef0f0514 extends Twig_Template
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
        if ($this->getAttribute($this->getContext($context, "app"), "user", array())) {
            // line 2
            echo "    ";
            // line 3
            echo "    ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "id", array()) != $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "id", array()))) {
                // line 4
                echo "        ";
                if (twig_in_filter($this->getAttribute($this->getContext($context, "item"), "author", array()), $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "usersIFollow", array()))) {
                    // line 5
                    echo "            <span class=\"follow\" data-user-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "id", array()), "html", null, true);
                    echo "\">Suivi</span>
        ";
                } else {
                    // line 7
                    echo "            <span class=\"follow\" data-user-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "id", array()), "html", null, true);
                    echo "\">Suivre</span>
        ";
                }
                // line 9
                echo "    ";
            } else {
                // line 10
                echo "    ";
            }
        } else {
            // line 12
            echo " <span class=\"follow\" data-user-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "id", array()), "html", null, true);
            echo "\">Suivre</span>
";
        }
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Global:followButton.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 12,  44 => 10,  41 => 9,  35 => 7,  29 => 5,  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
