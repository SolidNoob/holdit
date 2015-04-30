<?php

/* NoobUserBundle:Global:userImage.html.twig */
class __TwigTemplate_383d7e5117766f8e09635db44b7fffb53d784e380741cbb0b958ea57871306ae extends Twig_Template
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
        if (($this->getContext($context, "mode") == "profil")) {
            // line 29
            echo "    ";
            $context["repertory"] = "userpic230";
            // line 30
            echo "    ";
            $context["cssclass"] = "profil-pic";
            // line 31
            echo "    ";
            $context["replacementPicture"] = "silouhette.jpg";
            // line 32
            echo "    ";
            $context["imaginefilter"] = "profil";
        } elseif (($this->getContext($context, "mode") == "preview")) {
            // line 34
            echo "    ";
            $context["repertory"] = "userpic230";
            // line 35
            echo "    ";
            $context["cssclass"] = "preview-pic";
            // line 36
            echo "    ";
            $context["replacementPicture"] = "silouhette.jpg";
            // line 37
            echo "    ";
            $context["imaginefilter"] = "thumb_preview";
        } elseif (($this->getContext($context, "mode") == "minithumb")) {
            // line 39
            echo "    ";
            $context["repertory"] = "userpic230";
            // line 40
            echo "    ";
            $context["cssclass"] = "minithumb";
            // line 41
            echo "    ";
            $context["replacementPicture"] = "silouhette.jpg";
            // line 42
            echo "    ";
            $context["imaginefilter"] = "mini";
        } else {
            // line 44
            echo "    ";
            $context["repertory"] = "Son, this repertory does not exist";
        }
        // line 46
        echo "
";
        // line 47
        if ((!array_key_exists("alt", $context))) {
            // line 48
            echo "    ";
            $context["alt"] = "";
        }
        // line 50
        echo "
";
        // line 51
        if ((!array_key_exists("customclass", $context))) {
            // line 52
            echo "    ";
            $context["customclass"] = "";
        }
        // line 54
        echo "


";
        // line 58
        if (((null === $this->getContext($context, "picturename")) || twig_test_empty($this->getContext($context, "picturename")))) {
            // line 59
            echo "    <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('liip_imagine')->filter(("img/global/" . $this->getContext($context, "replacementPicture")), $this->getContext($context, "imaginefilter")), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "alt"), "html", null, true);
            echo "\" class=\"";
            echo twig_escape_filter($this->env, (($this->getContext($context, "cssclass") . " ") . $this->getContext($context, "customclass")), "html", null, true);
            echo "\" />
";
        } else {
            // line 61
            echo "    <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('liip_imagine')->filter(((("img/" . $this->getContext($context, "repertory")) . "/") . $this->getContext($context, "picturename")), $this->getContext($context, "imaginefilter")), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "alt"), "html", null, true);
            echo "\" class=\"";
            echo twig_escape_filter($this->env, (($this->getContext($context, "cssclass") . " ") . $this->getContext($context, "customclass")), "html", null, true);
            echo "\" />
";
        }
        // line 63
        echo "    ";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Global:userImage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 63,  102 => 61,  92 => 59,  90 => 58,  85 => 54,  81 => 52,  79 => 51,  76 => 50,  72 => 48,  70 => 47,  67 => 46,  63 => 44,  59 => 42,  56 => 41,  53 => 40,  50 => 39,  46 => 37,  43 => 36,  40 => 35,  37 => 34,  33 => 32,  30 => 31,  27 => 30,  24 => 29,  22 => 28,  19 => 26,);
    }
}
