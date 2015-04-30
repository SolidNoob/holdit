<?php

/* NoobSiteBundle:DashBoard:commentsListDashboard.html.twig */
class __TwigTemplate_0e90e9d60dd9ec4af77388b3ede5533c18beb14dc5319b7083a3fd5afa8cbc97 extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "comments"));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 2
            echo "    ";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($context["comment"], "post", array()), "type", array()), "name", array()) == "portfolio")) {
                // line 3
                echo "        ";
                $context["route"] = $this->env->getExtension('routing')->getPath("noob_portfolio_detail", array("id" => $this->getAttribute($this->getAttribute($context["comment"], "post", array()), "id", array()), "slug" => $this->getAttribute($this->getAttribute($context["comment"], "post", array()), "slug", array())));
                // line 4
                echo "    ";
            } elseif (($this->getAttribute($this->getAttribute($this->getAttribute($context["comment"], "post", array()), "type", array()), "name", array()) == "offrestage")) {
                // line 5
                echo "        ";
                $context["route"] = $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($this->getAttribute($context["comment"], "post", array()), "id", array()), "slug" => $this->getAttribute($this->getAttribute($context["comment"], "post", array()), "slug", array())));
                // line 6
                echo "    ";
            } elseif (($this->getAttribute($this->getAttribute($this->getAttribute($context["comment"], "post", array()), "type", array()), "name", array()) == "offreemploi")) {
                // line 7
                echo "        ";
                $context["route"] = $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($this->getAttribute($context["comment"], "post", array()), "id", array()), "slug" => $this->getAttribute($this->getAttribute($context["comment"], "post", array()), "slug", array())));
                // line 8
                echo "    ";
            } elseif (($this->getAttribute($this->getAttribute($this->getAttribute($context["comment"], "post", array()), "type", array()), "name", array()) == "tfe")) {
                // line 9
                echo "        ";
                $context["route"] = $this->env->getExtension('routing')->getPath("noob_tfe_detail", array("id" => $this->getAttribute($this->getAttribute($context["comment"], "post", array()), "id", array()), "slug" => $this->getAttribute($this->getAttribute($context["comment"], "post", array()), "slug", array())));
                // line 10
                echo "    ";
            }
            // line 11
            echo "<div class='suggest-content'>
    <p>A propos de <a href='";
            // line 12
            echo twig_escape_filter($this->env, $this->getContext($context, "route"), "html", null, true);
            echo "' class='black-strong-me'>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "post", array()), "name", array()), "html", null, true);
            echo "</a>, vous avez posté:</p>
    <p class=\"commentsugg\">
    ";
            // line 14
            if ((twig_length_filter($this->env, $this->getAttribute($context["comment"], "content", array())) > 100)) {
                // line 15
                echo "        ";
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["comment"], "content", array()), 0, 100), "html", null, true);
                echo "...
    ";
            } else {
                // line 17
                echo "        ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "content", array()), "html", null, true);
                echo "
    ";
            }
            // line 19
            echo "    <i class=\"fa fa-trash-o deletecomm\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "id", array()), "html", null, true);
            echo "\"></i>
    </p>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "NoobSiteBundle:DashBoard:commentsListDashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 19,  68 => 17,  62 => 15,  60 => 14,  53 => 12,  50 => 11,  47 => 10,  44 => 9,  41 => 8,  38 => 7,  35 => 6,  32 => 5,  29 => 4,  26 => 3,  23 => 2,  19 => 1,);
    }
}
