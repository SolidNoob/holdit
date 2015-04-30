<?php

/* NoobUserBundle:Global:profilpreview.html.twig */
class __TwigTemplate_6b1c82be4c64fc212f81e72f7e29c4722312289d4b6e40bdc4a3adb0fccc038f extends Twig_Template
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
        // line 13
        echo "
<article>
    <div class=\"media-left media-top text-center\">
      <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($this->getContext($context, "user"), "slug", array()))), "html", null, true);
        echo "\">
        <figure>
            ";
        // line 18
        $this->env->loadTemplate("NoobUserBundle:Global:userImage.html.twig")->display(array_merge($context, array("mode" => "preview", "picturename" => $this->getAttribute($this->getContext($context, "user"), "picture", array()), "alt" => ($this->getAttribute($this->getContext($context, "user"), "firstname", array()) . $this->getAttribute($this->getContext($context, "user"), "surname", array())), "customclass" => "img-responsive")));
        // line 19
        echo "        </figure>
      </a>
    </div>
    <div class=\"media-body\">
        <header>
            <span class='media-heading'><a href='";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($this->getContext($context, "user"), "slug", array()))), "html", null, true);
        echo "'>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "surname", array()), "html", null, true);
        echo "</a></span>
            ";
        // line 25
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "user"), "role", array()), "slug", array()) == "etudiant")) {
            // line 26
            echo "                <div>Étudiant(e) en ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "user"), "section", array()), "name", array()), "html", null, true);
            echo "</div>
            ";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "user"), "role", array()), "slug", array()) == "entreprise")) {
            // line 28
            echo "                ";
            if (((!(null === $this->getAttribute($this->getContext($context, "user"), "websiteurl", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "user"), "websiteurl", array()))))) {
                // line 29
                echo "                <div><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "websiteurl", array()), "html", null, true);
                echo "\" target=\"_blank\" rel=\"nofollow\" class=\"violet-me\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "society", array()), "html", null, true);
                echo "</a></div>
                ";
            } else {
                // line 31
                echo "                    <div>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "society", array()), "html", null, true);
                echo "</div>
                ";
            }
            // line 33
            echo "            ";
        }
        // line 34
        echo "        </header>
        ";
        // line 35
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "user"), "role", array()), "slug", array()) == "etudiant")) {
            // line 36
            echo "            <div class=\"lookingfor\">
                ";
            // line 37
            if ($this->getAttribute($this->getContext($context, "user"), "lookingForInternship", array())) {
                // line 38
                echo "                    Recherche un stage
                    ";
                // line 39
                if ($this->getAttribute($this->getContext($context, "user"), "lookingForJob", array())) {
                    // line 40
                    echo "                     -
                    ";
                }
                // line 42
                echo "                ";
            }
            // line 43
            echo "                ";
            if ($this->getAttribute($this->getContext($context, "user"), "lookingForJob", array())) {
                // line 44
                echo "                    Recherche un emploi
                ";
            }
            // line 46
            echo "            </div>
        ";
        }
        // line 48
        echo "        <div class=\"visible-lg visible-md\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "description", array()), "html", null, true);
        echo " </div>
        ";
        // line 49
        $this->env->loadTemplate("NoobTagBundle:Global:tagList.html.twig")->display(array_merge($context, array("tagList" => $this->getAttribute($this->getContext($context, "user"), "tags", array()))));
        // line 50
        echo "        <div class='previewbottom wrapper'>
            ";
        // line 51
        $this->env->loadTemplate("NoobUserBundle:Buttons:followme.html.twig")->display(array_merge($context, array("userToFollow" => $this->getContext($context, "user"))));
        // line 52
        echo "            <a href='#' class='user-followers' data-user-id='";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "id", array()), "html", null, true);
        echo "'>
                ";
        // line 53
        if (array_key_exists("hideFollowers", $context)) {
            // line 54
            echo "                    ";
            // line 55
            echo "                ";
        } else {
            // line 56
            echo "                    Follower(s): <span class=\"nb-followers\">";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "getUsersFollowers", array())), "html", null, true);
            echo "</span>
                ";
        }
        // line 58
        echo "            </a>
        </div>
    </div>
</article>";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Global:profilpreview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 58,  131 => 56,  128 => 55,  126 => 54,  124 => 53,  119 => 52,  117 => 51,  114 => 50,  112 => 49,  107 => 48,  103 => 46,  99 => 44,  96 => 43,  93 => 42,  89 => 40,  87 => 39,  84 => 38,  82 => 37,  79 => 36,  77 => 35,  74 => 34,  71 => 33,  65 => 31,  57 => 29,  54 => 28,  48 => 26,  46 => 25,  38 => 24,  31 => 19,  29 => 18,  24 => 16,  19 => 13,);
    }
}
