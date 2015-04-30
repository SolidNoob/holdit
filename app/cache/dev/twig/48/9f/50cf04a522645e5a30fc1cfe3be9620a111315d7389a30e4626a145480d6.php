<?php

/* NoobUserBundle:Profil:completeListContent.html.twig */
class __TwigTemplate_489f50cf04a522645e5a30fc1cfe3be9620a111315d7389a30e4626a145480d6 extends Twig_Template
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
        echo "<div class='row result-wrapper plank'>
";
        // line 2
        $context["itemNumber"] = twig_length_filter($this->env, $this->getContext($context, "itemList"));
        // line 3
        if (($this->getContext($context, "itemNumber") != 0)) {
            echo "  
    ";
            // line 4
            $context["firstHalf"] = twig_round(($this->getContext($context, "itemNumber") / 2), 0, "ceil");
            // line 5
            echo "    <div class=\"col-md-6\">
        ";
            // line 6
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "itemList"), 0, $this->getContext($context, "firstHalf")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 7
                echo "            ";
                if (($this->getContext($context, "itemType") == "user")) {
                    // line 8
                    echo "                ";
                    $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $context["item"], "hideFollowers" => true)));
                    // line 9
                    echo "            ";
                } else {
                    // line 10
                    echo "                ";
                    $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["item"])));
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "    </div>
    <div class=\"col-md-6\">
        ";
            // line 15
            if (($this->getContext($context, "itemNumber") != 1)) {
                // line 16
                echo "            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "itemList"), $this->getContext($context, "firstHalf"), $this->getContext($context, "itemNumber")));
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
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 17
                    echo "                ";
                    if (($this->getContext($context, "itemType") == "user")) {
                        // line 18
                        echo "                    ";
                        $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $context["item"], "hideFollowers" => true)));
                        // line 19
                        echo "                ";
                    } else {
                        // line 20
                        echo "                    ";
                        $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["item"])));
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 23
                echo "        ";
            }
            // line 24
            echo "    </div>
  <div class=\"col-lg-4 col-lg-offset-4 col-md-12\">
      <span class=\"load-more\" data-of=\"10\"> 
          <span class=\"show-me\">Afficher plus</span>
          <i class=\"fa fa-spinner fa-pulse fa-2x hide-me\"></i>
      </span>
      <span class=\"no-more-result hide-me\">
          Aucun résultat
      </span>
  </div>
 ";
        } else {
            // line 35
            echo "        <div class='row result-wrapper plank'>
            <div class=\"col-lg-4 col-lg-offset-4 col-md-12\">
                <span class=\"no-more-result block-me\">
                    Aucun résultat
                </span>
            </div>
        </div>
";
        }
        // line 43
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Profil:completeListContent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 43,  148 => 35,  135 => 24,  132 => 23,  118 => 22,  115 => 21,  112 => 20,  109 => 19,  106 => 18,  103 => 17,  85 => 16,  83 => 15,  79 => 13,  65 => 12,  62 => 11,  59 => 10,  56 => 9,  53 => 8,  50 => 7,  33 => 6,  30 => 5,  28 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
