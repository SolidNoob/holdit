<?php

/* NoobCommentBundle:Global:commentForm.html.twig */
class __TwigTemplate_2a4312583f669297a809758555bb32b1167b0927d5ad4ed5cdf025f391b17be6 extends Twig_Template
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
        echo "<div class=\"bordered-panel border-violet\">
    <div class='heading'>Poster un commentaire:</div>
";
        // line 3
        if ($this->getAttribute($this->getContext($context, "app"), "user", array())) {
            // line 4
            echo "<form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_comment_createComment", array("postId" => $this->getContext($context, "postId"))), "html", null, true);
            echo "\" method=\"post\"  ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
            echo " id='commentForm' >
   ";
            // line 5
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
            echo "
    
    ";
            // line 7
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "content", array()), 'label', array("label_attr" => array("class" => "maclasse"), "label" => "Votre commentaire: "));
            echo " 
    ";
            // line 8
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "content", array()), 'widget');
            echo "
    
    ";
            // line 10
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "recaptcha", array()), 'label', array("label_attr" => array("class" => "maclasse"), "label" => "Recopiez le captcha: "));
            echo " 
    ";
            // line 11
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "recaptcha", array()), 'widget');
            echo "
    ";
            // line 12
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "save", array()), 'widget', array("attr" => array("class" => "btn btn-default"), "label" => "Poster ce commentaire"));
            echo "
    ";
            // line 13
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
            echo "
</form>
";
        } else {
            // line 16
            echo "Vous devez vous connecter pour poster un commentaire.
";
        }
        // line 18
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "NoobCommentBundle:Global:commentForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 18,  64 => 16,  58 => 13,  54 => 12,  50 => 11,  46 => 10,  41 => 8,  37 => 7,  32 => 5,  25 => 4,  23 => 3,  19 => 1,);
    }
}
