<?php

/* NoobSiteBundle:Search:seeMore.html.twig */
class __TwigTemplate_48f6174366c4bd3f3aa60f2357955cebf9df9e4df4c99acef606ceb404bddf36 extends Twig_Template
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
        $context["recordNumber"] = twig_length_filter($this->env, $this->getContext($context, "recordList"));
        // line 2
        if (($this->getContext($context, "recordNumber") != 0)) {
            echo "  
    <div class=\"col-md-12 spacer\"></div>
    ";
            // line 4
            $context["firstHalf"] = twig_round(($this->getContext($context, "recordNumber") / 2), 0, "ceil");
            // line 5
            echo "    <div class=\"col-md-6\">
        ";
            // line 6
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "recordList"), 0, $this->getContext($context, "firstHalf")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["record"]) {
                // line 7
                echo "            ";
                if (($this->getContext($context, "type") == "post")) {
                    // line 8
                    echo "                ";
                    $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["record"])));
                    // line 9
                    echo "            ";
                } elseif (($this->getContext($context, "type") == "user")) {
                    // line 10
                    echo "                ";
                    $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $context["record"])));
                    // line 11
                    echo "            ";
                }
                // line 12
                echo "        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['record'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "    </div>
    <div class=\"col-md-6\">
        ";
            // line 15
            if (($this->getContext($context, "recordNumber") != 1)) {
                // line 16
                echo "            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "recordList"), $this->getContext($context, "firstHalf"), $this->getContext($context, "recordNumber")));
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
                foreach ($context['_seq'] as $context["_key"] => $context["record"]) {
                    // line 17
                    echo "                ";
                    if (($this->getContext($context, "type") == "post")) {
                        // line 18
                        echo "                    ";
                        $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["record"])));
                        // line 19
                        echo "                ";
                    } elseif (($this->getContext($context, "type") == "user")) {
                        // line 20
                        echo "                    ";
                        $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $context["record"])));
                        // line 21
                        echo "                ";
                    }
                    // line 22
                    echo "            ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['record'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 23
                echo "        ";
            }
            // line 24
            echo "    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "NoobSiteBundle:Search:seeMore.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 24,  130 => 23,  116 => 22,  113 => 21,  110 => 20,  107 => 19,  104 => 18,  101 => 17,  83 => 16,  81 => 15,  77 => 13,  63 => 12,  60 => 11,  57 => 10,  54 => 9,  51 => 8,  48 => 7,  31 => 6,  28 => 5,  26 => 4,  21 => 2,  19 => 1,);
    }
}
