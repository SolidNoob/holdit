<?php

/* NoobSiteBundle:Search:searchResultsDisplay.html.twig */
class __TwigTemplate_0335b50144a386bafd5e2632141b432751c20db72222937174b4bf596b242c0f extends Twig_Template
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
        // line 17
        echo "
<div class='row result-wrapper plank'>
  ";
        // line 19
        $context["postNumber"] = twig_length_filter($this->env, $this->getContext($context, "postList"));
        // line 20
        echo "  ";
        if (($this->getContext($context, "postNumber") != 0)) {
            echo "  
      ";
            // line 21
            $context["firstHalf"] = twig_round(($this->getContext($context, "postNumber") / 2), 0, "ceil");
            // line 22
            echo "    <div class=\"col-md-12\">
      <h2>Contenu:</h2>
    </div>
      <div class=\"col-md-6\">
          ";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "postList"), 0, $this->getContext($context, "firstHalf")));
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
                // line 27
                echo "              ";
                $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["post"])));
                // line 28
                echo "          ";
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
            // line 29
            echo "      </div>
      <div class=\"col-md-6\">
          ";
            // line 31
            if (($this->getContext($context, "postNumber") != 1)) {
                // line 32
                echo "              ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "postList"), $this->getContext($context, "firstHalf"), $this->getContext($context, "postNumber")));
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
                    // line 33
                    echo "                  ";
                    $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["post"])));
                    // line 34
                    echo "              ";
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
                // line 35
                echo "          ";
            }
            // line 36
            echo "      </div>
    <div class=\"col-lg-4 col-lg-offset-4 col-md-12\">
        <span class=\"load-more\" data-of=\"10\" data-ty=\"1\"> 
            <span class=\"show-me\">Afficher plus de contenu</span>
            <i class=\"fa fa-spinner fa-pulse fa-2x hide-me\"></i>
        </span>
        <span class=\"no-more-result hide-me\">
            Aucun résultat
        </span>
    </div>
  ";
        }
        // line 47
        echo "</div>

<div class='row result-wrapper plank'>
  ";
        // line 50
        $context["userNumber"] = twig_length_filter($this->env, $this->getContext($context, "userList"));
        // line 51
        echo "  ";
        if (($this->getContext($context, "userNumber") != 0)) {
            echo "  
      ";
            // line 52
            $context["firstHalf"] = twig_round(($this->getContext($context, "userNumber") / 2), 0, "ceil");
            // line 53
            echo "    <div class=\"col-md-12\">
      <h2>Membres:</h2>
    </div>
      <div class=\"col-md-6\">
          ";
            // line 57
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "userList"), 0, $this->getContext($context, "firstHalf")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 58
                echo "              ";
                $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $context["user"])));
                // line 59
                echo "          ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "      </div>
      <div class=\"col-md-6\">
          ";
            // line 62
            if (($this->getContext($context, "userNumber") != 1)) {
                // line 63
                echo "              ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "userList"), $this->getContext($context, "firstHalf"), $this->getContext($context, "userNumber")));
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
                foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                    // line 64
                    echo "                  ";
                    $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $context["user"])));
                    // line 65
                    echo "              ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 66
                echo "          ";
            }
            // line 67
            echo "      </div>
    <div class=\"col-lg-4 col-lg-offset-4 col-md-12\">
        <span class=\"load-more\" data-of=\"10\" data-ty=\"0\"> 
            <span class=\"show-me\">Afficher plus de membres</span>
            <i class=\"fa fa-spinner fa-pulse fa-2x hide-me\"></i>
        </span>
        <span class=\"no-more-result hide-me\">
            Aucun résultat
        </span>
    </div>
  ";
        }
        // line 78
        echo "</div>

    ";
        // line 80
        if ((($this->getContext($context, "postNumber") == 0) && ($this->getContext($context, "userNumber") == 0))) {
            // line 81
            echo "<div class='row result-wrapper plank'>
    <div class=\"col-lg-4 col-lg-offset-4 col-md-12\">
        <span class=\"no-more-result block-me\">
            La recherche n'a retourné aucun résultat
        </span>
    </div>
</div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "NoobSiteBundle:Search:searchResultsDisplay.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 81,  244 => 80,  240 => 78,  227 => 67,  224 => 66,  210 => 65,  207 => 64,  189 => 63,  187 => 62,  183 => 60,  169 => 59,  166 => 58,  149 => 57,  143 => 53,  141 => 52,  136 => 51,  134 => 50,  129 => 47,  116 => 36,  113 => 35,  99 => 34,  96 => 33,  78 => 32,  76 => 31,  72 => 29,  58 => 28,  55 => 27,  38 => 26,  32 => 22,  30 => 21,  25 => 20,  23 => 19,  19 => 17,);
    }
}
