<?php

/* NoobSiteBundle:DashBoard:friendsPosts.html.twig */
class __TwigTemplate_9baba3e643a54d22268dbb9b081bb43e87e1667808beca2338e9883114982d64 extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "friendsPosts"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 2
            echo "    ";
            if (array_key_exists("groupDate", $context)) {
                // line 3
                echo "        ";
                $context["previousDate"] = $this->getContext($context, "groupDate");
                // line 4
                echo "    ";
            } else {
                // line 5
                echo "        ";
                $context["previousDate"] = "";
                // line 6
                echo "    ";
            }
            // line 7
            echo "
    ";
            // line 8
            $context["difference"] = $this->getAttribute(twig_date_converter($this->env, "now"), "diff", array(0 => twig_date_converter($this->env, $this->getAttribute($context["post"], "pubDate", array()))), "method");
            // line 9
            echo "    ";
            $context["days"] = $this->getAttribute($this->getContext($context, "difference"), "days", array());
            // line 10
            echo "    ";
            if (($this->getContext($context, "days") == 0)) {
                // line 11
                echo "       ";
                $context["groupDate"] = "Aujourd'hui";
                echo " 
    ";
            } elseif (($this->getContext($context, "days") == 1)) {
                // line 13
                echo "       ";
                $context["groupDate"] = "Hier";
                echo " 
    ";
            } elseif (($this->getContext($context, "days") < 7)) {
                // line 15
                echo "        ";
                $context["groupDate"] = (("Il y a " . $this->getContext($context, "days")) . " jours");
                echo " 
    ";
            } else {
                // line 17
                echo "        ";
                $context["groupDate"] = ("Le " . twig_date_format_filter($this->env, $this->getAttribute($context["post"], "pubDate", array()), "d/m/Y"));
                echo " 
    ";
            }
            // line 19
            echo "
    ";
            // line 20
            if (($this->getContext($context, "groupDate") != $this->getContext($context, "previousDate"))) {
                // line 21
                echo "        ";
                if (($this->getContext($context, "previousDate") != "")) {
                    // line 22
                    echo "             <div class='bar-delimiter'></div>
        ";
                }
                // line 24
                echo "    <div class='date-limiter'> ";
                echo twig_escape_filter($this->env, $this->getContext($context, "groupDate"), "html", null, true);
                echo " :</div>
    ";
            }
            // line 26
            echo "
    <div class='suggest-content'>
        ";
            // line 29
            echo "        ";
            if (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "portfolio")) {
                // line 30
                echo "            ";
                $context["route"] = $this->env->getExtension('routing')->getPath("noob_portfolio_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                // line 31
                echo "        ";
            } elseif (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "offrestage")) {
                // line 32
                echo "            ";
                $context["route"] = $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                // line 33
                echo "        ";
            } elseif (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "offreemploi")) {
                // line 34
                echo "            ";
                $context["route"] = $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                // line 35
                echo "        ";
            } elseif (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "tfe")) {
                // line 36
                echo "            ";
                $context["route"] = $this->env->getExtension('routing')->getPath("noob_tfe_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                // line 37
                echo "        ";
            }
            // line 38
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "route"), "html", null, true);
            echo "\" class='icon'>
            ";
            // line 39
            $this->env->loadTemplate("NoobPostBundle:Global:postImage.html.twig")->display(array_merge($context, array("mode" => "minithumb", "picturename" => $this->getAttribute($context["post"], "picture", array()), "alt" => $this->getAttribute($context["post"], "name", array()), "customclass" => "img-responsive")));
            // line 40
            echo "        </a>
        <div class='info'>
            <div><a href='";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($this->getAttribute($context["post"], "author", array()), "slug", array()))), "html", null, true);
            echo "' class='violet-me'>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], "author", array()), "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], "author", array()), "surname", array()), "html", null, true);
            echo "</a> a posté <a href='";
            echo twig_escape_filter($this->env, $this->getContext($context, "route"), "html", null, true);
            echo "' class='black-strong-me'>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "name", array()), "html", null, true);
            echo "</a></div>
        </div>

    </div>
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "NoobSiteBundle:DashBoard:friendsPosts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 42,  142 => 40,  140 => 39,  135 => 38,  132 => 37,  129 => 36,  126 => 35,  123 => 34,  120 => 33,  117 => 32,  114 => 31,  111 => 30,  108 => 29,  104 => 26,  98 => 24,  94 => 22,  91 => 21,  89 => 20,  86 => 19,  80 => 17,  74 => 15,  68 => 13,  62 => 11,  59 => 10,  56 => 9,  54 => 8,  51 => 7,  48 => 6,  45 => 5,  42 => 4,  39 => 3,  36 => 2,  19 => 1,);
    }
}
