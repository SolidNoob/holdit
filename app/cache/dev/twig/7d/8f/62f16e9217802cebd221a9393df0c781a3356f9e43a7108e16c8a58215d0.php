<?php

/* NoobCommentBundle:Global:commentsList.html.twig */
class __TwigTemplate_7d8f62f16e9217802cebd221a9393df0c781a3356f9e43a7108e16c8a58215d0 extends Twig_Template
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
        if ((!twig_test_empty($this->getContext($context, "commentsList")))) {
            // line 2
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "commentsList"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 3
                echo "    <div class=\"comment\">
        ";
                // line 4
                if ($this->getAttribute($context["comment"], "isActive", array())) {
                    // line 5
                    echo "            ";
                    if (($this->getAttribute($context["comment"], "author", array()) == $this->getAttribute($this->getContext($context, "app"), "user", array()))) {
                        // line 6
                        echo "                    <i class=\"fa fa-times deletecomm\" title='Supprimer mon commentaire' data-id='";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "id", array()), "html", null, true);
                        echo "'></i>
            ";
                    }
                    // line 8
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($this->getAttribute($context["comment"], "author", array()), "slug", array()))), "html", null, true);
                    echo "\" class=\"hidden-xs\">
                <figure>
                    ";
                    // line 10
                    $this->env->loadTemplate("NoobUserBundle:Global:userImage.html.twig")->display(array_merge($context, array("mode" => "minithumb", "picturename" => $this->getAttribute($this->getAttribute($context["comment"], "author", array()), "picture", array()), "alt" => ($this->getAttribute($this->getAttribute($context["comment"], "author", array()), "firstname", array()) . $this->getAttribute($this->getAttribute($context["comment"], "author", array()), "surname", array())), "customclass" => "img-responsive comment-image")));
                    // line 11
                    echo "                </figure>
            </a>
            <a href=\"";
                    // line 13
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($this->getAttribute($context["comment"], "author", array()), "slug", array()))), "html", null, true);
                    echo "\" class=\"violet-me comment-author\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "author", array()), "firstname", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "author", array()), "surname", array()), "html", null, true);
                    echo "</a>  
            <span class=\"comment-date\">le ";
                    // line 14
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["comment"], "pubDate", array()), "d/m/Y à H:i"), "html", null, true);
                    echo "</span>:
            <p class=\"comment-content\">";
                    // line 15
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["comment"], "content", array()), "html", null, true));
                    echo "</p>
            <div style=\"clear:both\"></div>
        ";
                } else {
                    // line 18
                    echo "            <em>Ce commentaire a été supprimé par son auteur.</em>
        ";
                }
                // line 20
                echo "    </div>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 23
            echo "<div class=\"bordered-panel border-violet no-comment\">
    Aucun commentaire pour le moment.
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "NoobCommentBundle:Global:commentsList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 23,  87 => 20,  83 => 18,  77 => 15,  73 => 14,  65 => 13,  61 => 11,  59 => 10,  53 => 8,  47 => 6,  44 => 5,  42 => 4,  39 => 3,  21 => 2,  19 => 1,);
    }
}
