<?php

/* NoobPostBundle:Global:postpreview.html.twig */
class __TwigTemplate_3815a8e7dd2f01e7a009e77676cd4a8fa08b1c2ed5a7caadcd32e7dc51466073 extends Twig_Template
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
        // line 14
        echo "

";
        // line 17
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "type", array()), "name", array()) == "portfolio")) {
            // line 18
            echo "    ";
            $context["type"] = "Portfolio";
            // line 19
            echo "    ";
            $context["route"] = $this->env->getExtension('routing')->getPath("noob_portfolio_detail", array("id" => $this->getAttribute($this->getContext($context, "post"), "id", array()), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug", array())));
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "type", array()), "name", array()) == "offrestage")) {
            // line 21
            echo "    ";
            $context["type"] = "Offre de stage";
            // line 22
            echo "    ";
            $context["route"] = $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($this->getContext($context, "post"), "id", array()), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug", array())));
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "type", array()), "name", array()) == "offreemploi")) {
            // line 24
            echo "    ";
            $context["type"] = "Offre d'emploi";
            // line 25
            echo "    ";
            $context["route"] = $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($this->getContext($context, "post"), "id", array()), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug", array())));
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "type", array()), "name", array()) == "tfe")) {
            // line 27
            echo "    ";
            $context["type"] = "TFE";
            // line 28
            echo "    ";
            $context["route"] = $this->env->getExtension('routing')->getPath("noob_tfe_detail", array("id" => $this->getAttribute($this->getContext($context, "post"), "id", array()), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug", array())));
        }
        // line 30
        echo "
<article>
    <div class=\"media-left media-top\">
      <a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, "route"), "html", null, true);
        echo "\">
        <figure>
            ";
        // line 35
        $this->env->loadTemplate("NoobPostBundle:Global:postImage.html.twig")->display(array_merge($context, array("mode" => "preview", "picturename" => $this->getAttribute($this->getContext($context, "post"), "picture", array()), "alt" => $this->getAttribute($this->getContext($context, "post"), "name", array()))));
        // line 36
        echo "        </figure>
      </a>
    </div>
    <div class=\"media-body\">
        <header>
            <span class='media-heading'><a href='";
        // line 41
        echo twig_escape_filter($this->env, $this->getContext($context, "route"), "html", null, true);
        echo "'>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "name", array()), "html", null, true);
        echo "</a></span>
            <div>";
        // line 42
        echo twig_escape_filter($this->env, $this->getContext($context, "type"), "html", null, true);
        echo ", par <a href='";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author", array()), "slug", array()))), "html", null, true);
        echo "' class='violet-me'>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author", array()), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author", array()), "surname", array()), "html", null, true);
        echo "</a></div>
        </header>
        <p>Publication: ";
        // line 44
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "pubDate", array()), "d/m/Y"), "html", null, true);
        echo "</p>
        ";
        // line 45
        $this->env->loadTemplate("NoobTagBundle:Global:tagList.html.twig")->display(array_merge($context, array("tagList" => $this->getAttribute($this->getContext($context, "post"), "tags", array()))));
        // line 46
        echo "        <div class='previewbottom wrapper'>
        ";
        // line 47
        $this->env->loadTemplate("NoobPostBundle:Global:likePost.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"))));
        // line 48
        echo "        </div>
    </div>
</article>";
    }

    public function getTemplateName()
    {
        return "NoobPostBundle:Global:postpreview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 48,  98 => 47,  95 => 46,  93 => 45,  89 => 44,  78 => 42,  72 => 41,  65 => 36,  63 => 35,  58 => 33,  53 => 30,  49 => 28,  46 => 27,  42 => 25,  39 => 24,  35 => 22,  32 => 21,  28 => 19,  25 => 18,  23 => 17,  19 => 14,);
    }
}
