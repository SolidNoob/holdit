<?php

/* NoobUserBundle:Global:loginSigninLink.html.twig */
class __TwigTemplate_065146c2ad4de51063393c6cef3ab67794628c6e3945ba87277fb4dbbd56c47d extends Twig_Template
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
";
        // line 14
        if ($this->getAttribute($this->getContext($context, "app"), "user", array())) {
            // line 15
            echo "  <div class=\"btn-group myprofilbutton\">
      <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\" href=\"#\">
        ";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "surname", array()), "html", null, true);
            echo " <span class=\"caret\"></span>
      </a>
      <ul class=\"dropdown-menu\" role=\"menu\">
        <li><a href=\"";
            // line 20
            echo $this->env->getExtension('routing')->getPath("noob_site_dashboard_index");
            echo "\" class=\"hvr-sweep-to-right\"> <i class=\"fa fa-tachometer\"></i> Tableau de bord</a></li>
        <li class=\"divider\"></li>
        <li><a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userPostsLiked", array("slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "slug", array()))), "html", null, true);
            echo "\"> <i class=\"fa fa-heart\"></i> Mes coups de coeur</a></li>
        <li><a href=\"#\"> <i class=\"fa fa-envelope\"></i> Ma messagerie</a></li>
        <li><a href=\"#\"> <i class=\"fa fa-pencil-square-o\"></i> Gérer mes posts</a></li>
        <li><a href=\"#\"> <i class=\"fa fa-refresh\"></i> Modifier mes paramètres</a></li>
        <li class=\"divider\"></li>
        <li><a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "slug", array()))), "html", null, true);
            echo "\"> <i class=\"fa fa-user\"></i> Voir mon profil</a></li>
        <li class=\"divider\"></li>
        <li><a href=\"";
            // line 29
            echo $this->env->getExtension('routing')->getPath("user_logout");
            echo "\"> <i class=\"fa fa-power-off\"></i> Se déconnecter</a></li>
      </ul>
  </div>
";
        } else {
            // line 33
            echo "  <a href=\"";
            echo $this->env->getExtension('routing')->getPath("user_login");
            echo "\">Connexion</a>|<a href=\"#\">Inscription</a>
";
        }
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Global:loginSigninLink.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 33,  54 => 29,  49 => 27,  41 => 22,  36 => 20,  28 => 17,  24 => 15,  22 => 14,  19 => 13,);
    }
}
