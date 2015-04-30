<?php

/* NoobPostBundle:Offre:offreDetail.html.twig */
class __TwigTemplate_1b75f7cff57e1a74ff4f7ca3bf45392f90353e8a67e2b494250d70bb1b856cf0 extends Twig_Template
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

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "

";
        // line 19
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "item"), "type", array()), "name", array()) == "offrestage")) {
            // line 20
            echo "    ";
            $context["titre"] = "Offre de stage";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "item"), "type", array()), "name", array()) == "offreemploi")) {
            // line 22
            echo "    ";
            $context["titre"] = "Offre d'emploi";
        }
        // line 24
        echo "

<div class=\"board violet\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <header>
                  <h2><span class=\"xl-size\">";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, "titre"), "html", null, true);
        echo "</span> publiée par ";
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
        // line 37
        $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $this->getAttribute($this->getContext($context, "item"), "author", array()))));
        // line 38
        echo "              </div>
              <div class='col-md-6 '>
                  <aside class='other-posts'>
                    <p class=\"white-me\">Offres similaires:</p>
                    ";
        // line 42
        if (twig_test_empty($this->getContext($context, "otherItems"))) {
            // line 43
            echo "                        <p>Pas d'offres similaires</p>
                    ";
        } else {
            // line 45
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
                // line 46
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($context["item"], "id", array()), "slug" => $this->getAttribute($context["item"], "slug", array()))), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "\">
                                <div class=\"media-top\">
                                    ";
                // line 48
                $this->env->loadTemplate("NoobPostBundle:Global:postImage.html.twig")->display(array_merge($context, array("mode" => "preview", "picturename" => $this->getAttribute($context["item"], "picture", array()), "alt" => $this->getAttribute($context["item"], "name", array()))));
                // line 49
                echo "                                </div>
                                <div class=\"media-body\">
                                    ";
                // line 51
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
            // line 55
            echo "                    ";
        }
        // line 56
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
        // line 68
        $this->env->loadTemplate("NoobPostBundle:Global:postImage.html.twig")->display(array_merge($context, array("mode" => "detail", "picturename" => $this->getAttribute($this->getContext($context, "item"), "picture", array()), "alt" => $this->getAttribute($this->getContext($context, "item"), "name", array()))));
        // line 69
        echo "                </figure>
            </div>
            <div class='col-md-7'>
                <div class=\"planked post-detail\">
                <h1 class='post-detail-title'><span class='xl-size'>";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "name", array()), "html", null, true);
        echo "</span> de ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "item"), "author", array()), "surname", array()), "html", null, true);
        echo "</h1>
                <div class='result-wrapper'>
                  <p>Publication: ";
        // line 75
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "pubDate", array()), "d/m/Y à H:i"), "html", null, true);
        echo "</p>
                 ";
        // line 76
        $this->env->loadTemplate("NoobTagBundle:Global:tagList.html.twig")->display(array_merge($context, array("tagList" => $this->getAttribute($this->getContext($context, "item"), "tags", array()))));
        // line 77
        echo "                 ";
        $this->env->loadTemplate("NoobPostBundle:Global:likePost.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "item"))));
        // line 78
        echo "                    ";
        if (((!(null === $this->getAttribute($this->getContext($context, "item"), "url", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "item"), "url", array()))))) {
            // line 79
            echo "                        <a href='";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "url", array()), "html", null, true);
            echo "' class='post-detail-url' rel='nofollow'>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "url", array()), "html", null, true);
            echo "</a>
                    ";
        }
        // line 81
        echo "                  <div class='post-detail-text text-justify'>
                    ";
        // line 82
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "description", array()), "html", null, true));
        echo "
                  </div>
                </div>
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
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "name", array()), "html", null, true);
        echo "\":</h3>
                <div id=\"renderform\">
                   ";
        // line 99
        echo "                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class='col-xs-12'>
                <div class='comment-wrapper'>
                ";
        // line 105
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("NoobCommentBundle:Comment:getCommentsList", array("postId" => $this->getAttribute($this->getContext($context, "item"), "id", array()))));
        echo "
                ";
        // line 106
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "comments", array())) != 0)) {
            // line 107
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
        // line 117
        echo "                </div>
            </div>
        </div>
    </div>
</section>

";
    }

    public function getTemplateName()
    {
        return "NoobPostBundle:Offre:offreDetail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 117,  224 => 107,  222 => 106,  218 => 105,  210 => 99,  205 => 96,  188 => 82,  185 => 81,  177 => 79,  174 => 78,  171 => 77,  169 => 76,  165 => 75,  156 => 73,  150 => 69,  148 => 68,  134 => 56,  131 => 55,  113 => 51,  109 => 49,  107 => 48,  99 => 46,  81 => 45,  77 => 43,  75 => 42,  69 => 38,  67 => 37,  54 => 31,  45 => 24,  41 => 22,  37 => 20,  35 => 19,  31 => 17,  28 => 16,);
    }
}
