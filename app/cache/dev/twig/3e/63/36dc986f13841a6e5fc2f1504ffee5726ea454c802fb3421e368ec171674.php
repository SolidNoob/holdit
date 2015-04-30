<?php

/* NoobPostBundle:Global:postImage.html.twig */
class __TwigTemplate_3e6336dc986f13841a6e5fc2f1504ffee5726ea454c802fb3421e368ec171674 extends Twig_Template
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
        // line 26
        echo "
";
        // line 28
        if (($this->getContext($context, "mode") == "preview")) {
            // line 29
            echo "    ";
            $context["repertory"] = "postpic230";
            // line 30
            echo "    ";
            $context["cssclass"] = "preview-pic";
        } elseif (($this->getContext($context, "mode") == "detail")) {
            // line 32
            echo "    ";
            $context["repertory"] = "postpicoriginal";
            // line 33
            echo "    ";
            $context["cssclass"] = "post-detail-image";
        } elseif (($this->getContext($context, "mode") == "minithumb")) {
            // line 35
            echo "    ";
            $context["repertory"] = "postpicoriginal";
            // line 36
            echo "    ";
            $context["cssclass"] = "minithumb";
        } else {
            // line 38
            echo "    ";
            $context["repertory"] = "Son, this repertory does not exist";
        }
        // line 40
        echo "
";
        // line 41
        if ((!array_key_exists("alt", $context))) {
            // line 42
            echo "    ";
            $context["alt"] = "";
        }
        // line 44
        echo "
";
        // line 45
        if ((!array_key_exists("customclass", $context))) {
            // line 46
            echo "    ";
            $context["customclass"] = "";
        }
        // line 48
        echo "


";
        // line 52
        if (((null === $this->getContext($context, "picturename")) || twig_test_empty($this->getContext($context, "picturename")))) {
            // line 53
            echo "<div class=\"nopicture ";
            echo twig_escape_filter($this->env, (($this->getContext($context, "cssclass") . " ") . $this->getContext($context, "customclass")), "html", null, true);
            echo "\">
    <span><i class=\"fa fa-file-text\"></i></span>
</div>
";
        } else {
            // line 57
            echo "<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(((("img/" . $this->getContext($context, "repertory")) . "/") . $this->getContext($context, "picturename"))), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "alt"), "html", null, true);
            echo "\" class=\"img-responsive ";
            echo twig_escape_filter($this->env, (($this->getContext($context, "cssclass") . " ") . $this->getContext($context, "customclass")), "html", null, true);
            echo "\" />
";
        }
    }

    public function getTemplateName()
    {
        return "NoobPostBundle:Global:postImage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 57,  74 => 53,  72 => 52,  67 => 48,  63 => 46,  61 => 45,  58 => 44,  54 => 42,  52 => 41,  49 => 40,  45 => 38,  41 => 36,  38 => 35,  34 => 33,  31 => 32,  27 => 30,  24 => 29,  22 => 28,  19 => 26,);
    }
}
