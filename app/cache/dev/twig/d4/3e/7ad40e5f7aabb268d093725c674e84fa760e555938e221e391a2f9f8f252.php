<?php

/* NoobUserBundle:Security:login.html.twig */
class __TwigTemplate_d43e7ad40e5f7aabb268d093725c674e84fa760e555938e221e391a2f9f8f252 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate(":default:layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return ":default:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " Connexion | ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " ";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"board violet\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <header>
                  <h1><span class=\"xl-size\">Se connecter</span></h1>
                </header>
            </div>
        </div>
    </div>
</div>
<div class=\"grey\">
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-8 col-md-offset-2 col-xs-12\">
            <div class='form-signin-wrapper'>
                <form class=\"form-signin\" action=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("user_login_check");
        echo "\" method=\"post\">
                    <div class=\"row\">
                        <div class=\"col-xs-12\">
                            ";
        // line 25
        if ($this->getContext($context, "error")) {
            // line 26
            echo "                                <div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "error"), "message", array())), "html", null, true);
            echo "</div>
                            ";
        }
        // line 27
        echo "   
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-sm-7 col-xs-12 col-left\">
                            <h4>Je possède déjà mon compte:</h4>
                            <label for=\"username\" class=\"sr-only\">Nom d'utilisateur</label>
                            <input type=\"text\" id=\"username\" name=\"_username\" class=\"form-control\" placeholder=\"Nom d'utilisateur\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
        echo "\" required autofocus> 
                            <label for=\"password\" class=\"sr-only\">Mot de passe</label>
                            <input type=\"password\" id=\"password\" name=\"_password\" class=\"form-control\" placeholder=\"Mot de passe\" required>
                            <button class=\"btn btn-primary btn-block\" type=\"submit\">Connexion</button><br/>
                            <a href='#'>Mot de passe oublié?</a>
                        </div>
                        <div class=\"col-sm-5 col-xs-12 col-right\">
                            <h4>Je n'ai pas encore de compte:</h4>
                            <p class='text-justify'>Vous êtes un professionnel et vous désirez proposer des offres ou devenir membre d'un jury TFE? Créez dès maintenant votre profil pour entrer en contact avec les étudiants.</p>
                            <a class=\"btn btn-primary\" href=\"#\">Créer un compte</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
</div>
";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 34,  72 => 27,  66 => 26,  64 => 25,  58 => 22,  40 => 6,  37 => 5,  29 => 3,);
    }
}
