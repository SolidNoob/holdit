<?php

/* NoobPostBundle:Global:likePost.html.twig */
class __TwigTemplate_d798532d36ce788cca08841338aedbb672e0e041a880ff15ff31c562eb5cbbec extends Twig_Template
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
        // line 2
        echo "
";
        // line 3
        $context["class"] = "";
        // line 4
        if ($this->getAttribute($this->getContext($context, "app"), "user", array())) {
            // line 5
            echo "    ";
            if (twig_in_filter($this->getContext($context, "post"), $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "postsLiked", array()))) {
                // line 6
                echo "        ";
                $context["class"] = "selected";
                // line 7
                echo "    ";
            }
        }
        // line 9
        echo "<div class='wrapper'>
    <button type=\"button\" class='like-me ";
        // line 10
        echo twig_escape_filter($this->env, $this->getContext($context, "class"), "html", null, true);
        echo "' data-post-id='";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id", array()), "html", null, true);
        echo "'><i class=\"fa fa-heart\"></i></button>
    <a href='#' data-post-id='";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id", array()), "html", null, true);
        echo "' class='post-likers'><span class='nb-likes'>";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "likers", array())), "html", null, true);
        echo "</span> coup(s) de coeur</a>
</div>
";
    }

    public function getTemplateName()
    {
        return "NoobPostBundle:Global:likePost.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 11,  39 => 10,  36 => 9,  32 => 7,  29 => 6,  26 => 5,  24 => 4,  22 => 3,  19 => 2,);
    }
}
