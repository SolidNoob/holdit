<?php

/* NoobPostBundle:Portfolio:portfolioDetail.html.twig */
class __TwigTemplate_077bdb2e7caf83806594f5a48196c1b738259d175627018f83a2e102b3da4cff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("NoobPostBundle:Global:postDetail.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "NoobPostBundle:Global:postDetail.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "


<div class=\"board violet\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <header>
                  <h2><span class=\"xl-size\">Portfolio</span> de ";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "surname", array()), "html", null, true);
        echo "</h2>
                </header>
            </div>
        </div>
        <div class=\"row result-wrapper plank\">
            <div class=\"col-md-6\">
              ";
        // line 34
        $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $this->getAttribute($this->getContext($context, "item"), "author", array()))));
        // line 35
        echo "              </div>
              <div class='col-md-6 '>
                  <aside class='other-posts'>
                    <p class=\"white-me\">Autres projets d'Isabelle Marcourt</p>
                    ";
        // line 39
        if (twig_test_empty($this->getContext($context, "otherItems"))) {
            // line 40
            echo "                        <p>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "firstname", array()), "html", null, true);
            echo " n'a posté aucun autre projet</p>
                    ";
        } else {
            // line 42
            echo "                        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "otherItems"), 0, 3));
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
                // line 43
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_portfolio_detail", array("id" => $this->getAttribute($context["item"], "id", array()), "slug" => $this->getAttribute($context["item"], "slug", array()))), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "\">
                                <div class=\"media-top\">
                                    ";
                // line 45
                $this->env->loadTemplate("NoobPostBundle:Global:postImage.html.twig")->display(array_merge($context, array("mode" => "preview", "picturename" => $this->getAttribute($context["item"], "picture", array()), "alt" => $this->getAttribute($context["item"], "name", array()))));
                // line 46
                echo "                                </div>
                                <div class=\"media-body \">
                                    ";
                // line 48
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["item"], "name", array()), 0, 15), "html", null, true);
                echo "...
                                </div>
                            </a>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo "                    ";
        }
        // line 53
        echo "                  </aside>
              </div>
        </div>
    </div>
</div>


<section class=\"board grey noborder\">
    <div class=\"container pb\">
        <div class='row'>
            <div class='col-md-5'>
                <figure>
                    ";
        // line 65
        $this->env->loadTemplate("NoobPostBundle:Global:postImage.html.twig")->display(array_merge($context, array("mode" => "detail", "picturename" => $this->getAttribute($this->getContext($context, "item"), "picture", array()), "alt" => $this->getAttribute($this->getContext($context, "item"), "name", array()))));
        // line 66
        echo "                </figure>
            </div>
            <div class='col-md-7'>
                <div class=\"planked post-detail\">
                <h1 class='post-detail-title'><span class='xl-size'>";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "name", array()), "html", null, true);
        echo "</span> de ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "surname", array()), "html", null, true);
        echo "</h1>
                <div class='result-wrapper'>
                  <p>Publié le ";
        // line 72
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "pubDate", array()), "d/m/Y à H:i"), "html", null, true);
        echo "</p>
                 ";
        // line 73
        $this->env->loadTemplate("NoobTagBundle:Global:tagList.html.twig")->display(array_merge($context, array("tagList" => $this->getAttribute($this->getContext($context, "item"), "tags", array()))));
        // line 74
        echo "                 ";
        $this->env->loadTemplate("NoobPostBundle:Global:likePost.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "item"))));
        // line 75
        echo "                    ";
        if (((!(null === $this->getAttribute($this->getContext($context, "item"), "url", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "item"), "url", array()))))) {
            // line 76
            echo "                        <a href='";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "url", array()), "html", null, true);
            echo "' class='post-detail-url' rel='nofollow'>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "url", array()), "html", null, true);
            echo "</a>
                    ";
        }
        // line 78
        echo "                  <div class='post-detail-text text-justify'>
                    ";
        // line 79
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "description", array()), "html", null, true));
        echo "
                  </div>
                  ";
        // line 81
        if (((!(null === $this->getContext($context, "previousItem"))) || (!(null === $this->getContext($context, "nextItem"))))) {
            // line 82
            echo "                  <div class='portfolio-navigation'>
                    <p>Également dans le portfolio de ";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "surname", array()), "html", null, true);
            echo ":</p>
                    <div class='portfolio-navprev'>
                      ";
            // line 85
            if ((!(null === $this->getContext($context, "previousItem")))) {
                // line 86
                echo "                          Projet précédent: <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_portfolio_detail", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "otherItems"), $this->getContext($context, "previousItem"), array(), "array"), "id", array()), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "otherItems"), $this->getContext($context, "previousItem"), array(), "array"), "slug", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "otherItems"), $this->getContext($context, "previousItem"), array(), "array"), "name", array()), "html", null, true);
                echo "</a>
                      ";
            }
            // line 88
            echo "                    </div>
                    <div class='portfolio-navnext'>
                      ";
            // line 90
            if ((!(null === $this->getContext($context, "nextItem")))) {
                // line 91
                echo "                          Projet suivant: <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_portfolio_detail", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "otherItems"), $this->getContext($context, "nextItem"), array(), "array"), "id", array()), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "otherItems"), $this->getContext($context, "nextItem"), array(), "array"), "slug", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "otherItems"), $this->getContext($context, "nextItem"), array(), "array"), "name", array()), "html", null, true);
                echo "</a>
                      ";
            }
            // line 93
            echo "                    </div>
                  </div>
                  ";
        }
        // line 96
        echo "                </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section class=\"board grey nopaddingtop\">
    <div class=\"container pb\">
        <div class=\"row\">
            <div class='col-xs-12'>
                <h3 class=\"commentlist-title\">Commentaire(s) à propos de \"";
        // line 110
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "name", array()), "html", null, true);
        echo "\":</h3>
                <div id=\"renderform\">
                   ";
        // line 113
        echo "                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class='col-xs-12'>
                <div class='comment-wrapper'>
                ";
        // line 119
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("NoobCommentBundle:Comment:getCommentsList", array("postId" => $this->getAttribute($this->getContext($context, "item"), "id", array()))));
        echo "
                ";
        // line 120
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "comments", array())) != 0)) {
            // line 121
            echo "                    <div class=\"col-lg-4 col-lg-offset-4 col-md-12 result-wrapper\">
                        <span class=\"load-more\" data-of=\"10\"> 
                            <span class=\"show-me\">Afficher plus</span>
                            <i class=\"fa fa-spinner fa-pulse fa-2x hide-me\"></i>
                        </span>
                        <span class=\"no-more-result hide-me\">
                            Aucun résultat
                        </span>
                    </div>
                ";
        }
        // line 131
        echo "                </div>
            </div>
        </div>
    </div>
</section>

";
    }

    public function getTemplateName()
    {
        return "NoobPostBundle:Portfolio:portfolioDetail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 131,  256 => 121,  254 => 120,  250 => 119,  242 => 113,  237 => 110,  221 => 96,  216 => 93,  208 => 91,  206 => 90,  202 => 88,  194 => 86,  192 => 85,  185 => 83,  182 => 82,  180 => 81,  175 => 79,  172 => 78,  164 => 76,  161 => 75,  158 => 74,  156 => 73,  152 => 72,  143 => 70,  137 => 66,  135 => 65,  121 => 53,  118 => 52,  100 => 48,  96 => 46,  94 => 45,  86 => 43,  68 => 42,  62 => 40,  60 => 39,  54 => 35,  52 => 34,  41 => 28,  31 => 20,  28 => 19,);
    }
}
