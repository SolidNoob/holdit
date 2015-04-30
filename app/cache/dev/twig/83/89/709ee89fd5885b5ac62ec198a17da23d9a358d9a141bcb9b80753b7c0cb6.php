<?php

/* NoobUserBundle:Profil:followersListPage.html.twig */
class __TwigTemplate_8389709ee89fd5885b5ac62ec198a17da23d9a358d9a141bcb9b80753b7c0cb6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate(":default:layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"board violet\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <header>
                  <h1><span class=\"xl-size\">Followers</span> de ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "surname", array()), "html", null, true);
        echo "</h1>
                </header>
            </div>
        </div>
        <div class=\"row result-wrapper plank\">
            <div class=\"col-md-6\">
              ";
        // line 15
        $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $this->getContext($context, "user"))));
        // line 16
        echo "            </div>
        </div>
    </div>
</div>

<section class=\"board grey\">
    <div class=\"container pb\" id=\"updatehere\">
        ";
        // line 23
        $this->env->loadTemplate("NoobUserBundle:Profil:completeListContent.html.twig")->display(array_merge($context, array("itemList" => $this->getContext($context, "followersList"), "itemType" => "user")));
        // line 24
        echo "    </div>
</section>
";
    }

    // line 29
    public function block_javascripts($context, array $blocks = array())
    {
        // line 30
        echo "<script>
\$(document).ready(function(){
    var currEvent = true;
    //display more
    \$('body').on('click', '.load-more', function(e){
        if(currEvent){
            currEvent = false;
            var of = \$(this).attr('data-of');
            \$.ajax({
                type: \"POST\",
                url: \"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("noob_user_profilcompleteListAjax", array("contentType" => "followers"));
        echo "\",
                data: {itemid:";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "id", array()), "html", null, true);
        echo ", of:of},
                context: \$(this),
                success: function(data){
                    if(data.length === 0)
                    {
                        \$(this).fadeOut('1000',function(){
                            \$(this).next('.no-more-result').fadeIn().css({'display':'block'});
                        });
                    }
                    else
                    {
                        \$response = \$(data).hide();
                        \$(this).parent('div').before(\$response);
                        \$response.fadeIn();
                        \$(this).children('span').removeClass('hide-me').addClass('show-me');
                        \$(this).children('i').addClass('hide-me').removeClass('show-me');
                        of = parseInt(of) + 10;
                        \$(this).attr('data-of',of);
                    }
                },
                complete:function(){
                    currEvent = true;
                }
            });
            \$(this).children('span').toggleClass('hide-me').toggleClass('show-me');
            \$(this).children('i').toggleClass('hide-me').toggleClass('show-me');
        }
    });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Profil:followersListPage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 41,  84 => 40,  72 => 30,  69 => 29,  63 => 24,  61 => 23,  52 => 16,  50 => 15,  39 => 9,  32 => 4,  29 => 3,);
    }
}
