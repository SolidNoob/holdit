<?php

/* ::base.html.twig */
class __TwigTemplate_5d991c2cdab992a0798b58fae9422ec9f3930d461bc28ca21f289f6bd0308945 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 17
        echo "
<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 22
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        ";
        // line 25
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 38
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        
        ";
        // line 42
        $this->displayBlock('body', $context, $blocks);
        // line 45
        echo "        
        ";
        // line 46
        $this->env->loadTemplate("NoobSiteBundle:Global:footer.html.twig")->display($context);
        // line 47
        echo "        
        <div class=\"device-xs visible-xs\"></div>
        <div class=\"device-sm visible-sm\"></div>
        <div class=\"device-md visible-md\"></div>
        <div class=\"device-lg visible-lg\"></div>
        
        <!-- Javascript -->
        <script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 55
        echo $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.min.js"), "html", null, true);
        echo "\"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <!-- Bootbox -->
            <script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootbox.min.js"), "html", null, true);
        echo "\"></script>
            <!-- Parallax -->
            <script src='";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/parallax.js"), "html", null, true);
        echo "'></script>
            <!-- Custom js -->
            <script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/js.js"), "html", null, true);
        echo "\"></script>
        
        ";
        // line 71
        echo "        
        ";
        // line 72
        $this->displayBlock('javascripts', $context, $blocks);
        // line 75
        echo "    </body>
</html>";
    }

    // line 22
    public function block_title($context, array $blocks = array())
    {
        echo " Interface.promotion-sociale.be ";
    }

    // line 25
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 26
        echo "            <!-- Bootstrap -->
            <link rel=\"stylesheet\"  href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" />
            
            <!-- Font Awesome -->
            <link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css\">
            <!-- Custom CSS -->
            <link rel=\"stylesheet\"  href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/custom.css"), "html", null, true);
        echo "\" />
            <!--[if lt IE 9]>
                <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
                <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
            <![endif]-->
        ";
    }

    // line 42
    public function block_body($context, array $blocks = array())
    {
        // line 43
        echo "            ";
        // line 44
        echo "        ";
    }

    // line 72
    public function block_javascripts($context, array $blocks = array())
    {
        // line 73
        echo "                ";
        // line 74
        echo "        ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 74,  148 => 73,  145 => 72,  141 => 44,  139 => 43,  136 => 42,  126 => 32,  118 => 27,  115 => 26,  112 => 25,  106 => 22,  101 => 75,  99 => 72,  96 => 71,  91 => 65,  86 => 63,  81 => 61,  76 => 59,  71 => 57,  66 => 55,  62 => 54,  53 => 47,  51 => 46,  48 => 45,  46 => 42,  38 => 38,  36 => 25,  30 => 22,  23 => 17,);
    }
}
