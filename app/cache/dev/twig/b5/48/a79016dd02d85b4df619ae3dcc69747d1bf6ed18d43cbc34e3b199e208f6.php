<?php

/* NoobSiteBundle:Global:navbar.html.twig */
class __TwigTemplate_b548a79016dd02d85b4df619ae3dcc69747d1bf6ed18d43cbc34e3b199e208f6 extends Twig_Template
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
        echo "<nav class=\"main-navbar\">
    <div class=\"container\">
        <div class=\"row\">
           <div class=\"col-md-6 col-xs-12\">
              <a href=\"http://www.promotion-sociale.be/\" target=\"_blank\" class=\"text-hide small-logo-ieps float\">Promotion Sociale Fléron</a>
              <a href=\"http://www.federation-wallonie-bruxelles.be/\" class=\"text-hide small-logo-fwb float\">Fédération Wallonie Bruxelles</a>
              <a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("noob_site_homepage");
        echo "\" class=\"brand\"><span class='xl-size'>Interface.</span>promotion-sociale.be</a>
           </div>
           <div class=\"col-md-6 col-xs-12 signin\">
               ";
        // line 10
        $this->env->loadTemplate("NoobUserBundle:Global:loginSigninLink.html.twig")->display($context);
        // line 11
        echo "               
                <form method=\"get\" action=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("noob_site_searchContent");
        echo "\" class=\"search-form form-inline\">
                  <input type=\"text\" name=\"search\" class=\"search-bar form-control\" autocomplete=\"off\"/>
                  <button type=\"submit\" class=\"search-button btn btn-default\">
                      <i class=\"fa fa-search\"></i>
                  </button>
              </form>
           </div>
        </div>
    </div>
</nav>

";
    }

    public function getTemplateName()
    {
        return "NoobSiteBundle:Global:navbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 12,  35 => 11,  33 => 10,  27 => 7,  19 => 1,);
    }
}
