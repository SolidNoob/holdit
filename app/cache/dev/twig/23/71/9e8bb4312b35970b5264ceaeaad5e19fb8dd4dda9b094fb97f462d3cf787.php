<?php

/* NoobSiteBundle:DashBoard:dashboardIndex.html.twig */
class __TwigTemplate_23719e8bb4312b35970b5264ceaeaad5e19fb8dd4dda9b094fb97f462d3cf787 extends Twig_Template
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
        echo "
<div class=\"board grey\">
    <div class=\"container pb\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <header>
                    <h1>Tableau de bord</h1>
                </header>
            </div>
        </div>
        <div class=\"row\">
            <div class='col-md-4'>
                <div class='mb planked suggest-wrapper'>
                    <div class=\"heading\">
                        <h4>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "surname", array()), "html", null, true);
        echo ":</h4>
                    </div>
                    <ul class='default'>
                        <li><a href='";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userPostsLiked", array("slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "slug", array()))), "html", null, true);
        echo "'><i class=\"fa fa-heart\"></i> Mes coups de coeur</a></li>
                        <li><a href='#'><i class=\"fa fa-envelope\"></i> Ma messagerie</a></li>
                        <li><a href='#'><i class=\"fa fa-pencil-square-o\"></i> Gérer mes posts</a></li>
                        <li><a href='#'><i class=\"fa fa-refresh\"></i> Modifier mes paramètres</a></li>
                        <li><a href='";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "slug", array()))), "html", null, true);
        echo "'><i class=\"fa fa-user\"></i> Voir mon profil</a></li>
                    </ul>
                </div>
                <div class='mb planked  suggest-wrapper'>
                    <div class=\"heading\">
                        <h4>Vos tags:</h4>
                    </div>
                    <ul class=\"tag-cloud\">
                        ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "tags", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 34
            echo "                          <li><a href='";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_site_searchContent", array("search" => $this->getAttribute($context["tag"], "name", array()))), "html", null, true);
            echo "'  class=\"deletetag\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "name", array()), "html", null, true);
            echo "</a></li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "                    </ul>
                    <a href='#' class='violet-me'>Modifier mes tags</a>
                </div>
                <div class='mb planked  suggest-wrapper'>
                    <div class=\"heading\">
                        <h4>Vos derniers commentaires:</h4>
                    </div>
                    ";
        // line 43
        $this->env->loadTemplate("NoobSiteBundle:DashBoard:commentsListDashboard.html.twig")->display(array_merge($context, array("comments" => $this->getContext($context, "comments"))));
        // line 44
        echo "                    <div>
                        <span href=\"#\" class=\"load-more\" data-of=\"10\" data-route=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("noob_comment_getUserLastCommentAjax");
        echo "\"> 
                            <span class=\"show-me\">Afficher plus</span>
                            <i class=\"fa fa-spinner fa-pulse fa-2x hide-me\"></i>
                        </span>
                        <span class=\"no-more-result hide-me\">
                            Aucun résultat
                        </span>
                    </div>
                </div>
            </div>
            
            ";
        // line 57
        echo "            <div class=\"col-md-4\">
                <div class=\"mb planked suggest-wrapper\">
                    <div class=\"heading\">
                        <h4>Les membres que vous suivez ont posté les éléments suivants:</h4>
                    </div>
                    ";
        // line 62
        $this->env->loadTemplate("NoobSiteBundle:DashBoard:friendsPosts.html.twig")->display(array_merge($context, array("friendsPosts" => $this->getContext($context, "friendsPosts"))));
        echo "<div>
                    <span href=\"#\" class=\"load-more\" data-of=\"10\" data-route=\"";
        // line 63
        echo $this->env->getExtension('routing')->getPath("noob_comment_getUserFriendsPostsAjax");
        echo "\"> 
                            <span class=\"show-me\">Afficher plus</span>
                            <i class=\"fa fa-spinner fa-pulse fa-2x hide-me\"></i>
                        </span>
                        <span class=\"no-more-result hide-me\">
                            Aucun résultat
                        </span>
                    </div>
                </div>
            </div>
            
            <div class=\"col-md-4\">
                <div class=\"suggest-wrapper bordered-panel border-violet\">
                    <div class=\"heading\">
                        <h4>Ces profils pourraient vous intéresser:</h4>
                    </div>
                        <p>Vous avez des tags en commun avec ces membres qui ne font pas partie de vos amis:</p>
                        ";
        // line 80
        $context["nbProfils"] = twig_length_filter($this->env, $this->getContext($context, "profils"));
        // line 81
        echo "                        ";
        if (($this->getContext($context, "nbProfils") == 0)) {
            // line 82
            echo "                            Aucun résultat
                        ";
        } else {
            // line 84
            echo "                        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "profils"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["key"] => $context["membre"]) {
                // line 85
                echo "                            <div class='suggest-content ";
                if (($context["key"] > 3)) {
                    echo " hide-me ";
                }
                echo "'>
                                <a href=\"";
                // line 86
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($context["membre"], "slug", array()))), "html", null, true);
                echo "\"  class='icon'>
                                    ";
                // line 87
                $this->env->loadTemplate("NoobUserBundle:Global:userImage.html.twig")->display(array_merge($context, array("mode" => "minithumb", "picturename" => $this->getAttribute($context["membre"], "picture", array()), "alt" => ($this->getAttribute($context["membre"], "firstname", array()) . $this->getAttribute($context["membre"], "surname", array())), "customclass" => "img-responsive")));
                // line 88
                echo "                                </a>
                                <div class='info'>
                                    <a href='";
                // line 90
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($context["membre"], "slug", array()))), "html", null, true);
                echo "' class='black-strong-me'>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["membre"], "firstname", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["membre"], "surname", array()), "html", null, true);
                echo "</a>
                                    <p>En commun: 
                                    ";
                // line 92
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["membre"], "tags", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                    // line 93
                    echo "                                        ";
                    if (twig_in_filter($context["tag"], $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "tags", array()))) {
                        // line 94
                        echo "                                             <a href='";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_site_searchContent", array("search" => $this->getAttribute($context["tag"], "name", array()))), "html", null, true);
                        echo "' class='violet-me'>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "name", array()), "html", null, true);
                        echo "</a>
                                        ";
                    }
                    // line 96
                    echo "                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 97
                echo "                                    </p>
                                </div>
                            </div>
                        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['membre'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            echo "                        ";
        }
        // line 102
        echo "                        ";
        if (($this->getContext($context, "nbProfils") > 3)) {
            // line 103
            echo "                            <a href='#' class='violet-me showmore'>Agrandir la liste</a>
                        ";
        }
        // line 105
        echo "                </div>
                <div class=\"suggest-wrapper bordered-panel border-violet\">
                    <div class=\"heading\">
                        <h4>Éléments qui pourraient vous correspondent:</h4>
                    </div>
                        <p>Ces éléments correspondent à vos tags:</p>
                        ";
        // line 111
        $context["nbPosts"] = twig_length_filter($this->env, $this->getContext($context, "tagsPosts"));
        // line 112
        echo "                        ";
        if (($this->getContext($context, "nbPosts") == 0)) {
            // line 113
            echo "                            <div>Aucun résultat</div>
                        ";
        } else {
            // line 115
            echo "                        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tagsPosts"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["key"] => $context["post"]) {
                // line 116
                echo "                        <div class='suggest-content ";
                if (($context["key"] > 3)) {
                    echo " hide-me ";
                }
                echo "'>
                            ";
                // line 118
                echo "                            ";
                if (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "portfolio")) {
                    // line 119
                    echo "                                ";
                    $context["route"] = $this->env->getExtension('routing')->getPath("noob_portfolio_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                    // line 120
                    echo "                            ";
                } elseif (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "offrestage")) {
                    // line 121
                    echo "                                ";
                    $context["route"] = $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                    // line 122
                    echo "                            ";
                } elseif (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "offreemploi")) {
                    // line 123
                    echo "                                ";
                    $context["route"] = $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                    // line 124
                    echo "                            ";
                } elseif (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "tfe")) {
                    // line 125
                    echo "                                ";
                    $context["route"] = $this->env->getExtension('routing')->getPath("noob_tfe_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                    // line 126
                    echo "                            ";
                }
                // line 127
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "route"), "html", null, true);
                echo "\" class='icon'>
                                ";
                // line 128
                $this->env->loadTemplate("NoobPostBundle:Global:postImage.html.twig")->display(array_merge($context, array("mode" => "minithumb", "picturename" => $this->getAttribute($context["post"], "picture", array()), "alt" => $this->getAttribute($context["post"], "name", array()), "customclass" => "img-responsive")));
                // line 129
                echo "                            </a>
                            <div class='info'>
                                <a href='";
                // line 131
                echo twig_escape_filter($this->env, $this->getContext($context, "route"), "html", null, true);
                echo "' class='black-strong-me'>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "name", array()), "html", null, true);
                echo "</a>
                                <div>En commun: 
                                ";
                // line 133
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["post"], "tags", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                    // line 134
                    echo "                                    ";
                    if (twig_in_filter($context["tag"], $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "tags", array()))) {
                        // line 135
                        echo "                                         <a href='";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_site_searchContent", array("search" => $this->getAttribute($context["tag"], "name", array()))), "html", null, true);
                        echo "' class='violet-me'>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "name", array()), "html", null, true);
                        echo "</a>
                                    ";
                    }
                    // line 137
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 138
                echo "                                </div>
                                <div class='small'>";
                // line 139
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["post"], "pubDate", array()), "d/m/Y"), "html", null, true);
                echo "</div>
                            </div>
                        </div>
                        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 143
            echo "                        ";
        }
        // line 144
        echo "                        ";
        if (($this->getContext($context, "nbPosts") > 3)) {
            // line 145
            echo "                            <a href='#' class='violet-me showmore'>Agrandir la liste</a>
                        ";
        }
        // line 147
        echo "                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    // line 154
    public function block_javascripts($context, array $blocks = array())
    {
        // line 155
        echo "<script>
var currEvent = true;
\$('body').on('click','.deletecomm', function(e){
    if(currEvent){
        currEvent = false;
        var id = \$(this).attr('data-id');
        var mythis = \$(this);
        bootbox.confirm({
            title: \"Confirmer la suppression du commentaire?\",
            message: \"Cette action irreversible entrainera la suppression du commentaire. Confirmer la suppression?\",
            buttons: {
                cancel: {
                    label: \"Annuler la suppression\",
                    className: \"btn-default pull-left\"
                },
                confirm: {
                    label: \"Confirmer la suppression\",
                    className: \"btn-danger pull-right\"
                }
            },
            callback: function(result) {
                currEvent = true;
                if (result) {
                    \$.ajax({
                        type: \"POST\",
                        url: Routing.generate('noob_comment_deleteComment', { commentId: id }),
                        success: function(data){
                            \$(mythis).closest('.suggest-content').fadeOut();
                        }
                    });
                }
            }
        });
    }
});



//display more
\$('body').on('click', '.load-more', function(e){
    if(currEvent){
        currEvent = false;
        var of = \$(this).attr('data-of');
        var route = \$(this).attr('data-route');
         \$.ajax({
             type: \"POST\",
             url: route,
             data: {of:of},
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
             complete: function(){
                 currEvent = true;
             }
         });
         \$(this).children('span').toggleClass('hide-me').toggleClass('show-me');
         \$(this).children('i').toggleClass('hide-me').toggleClass('show-me');
    }
});
    
    
</script>
";
    }

    public function getTemplateName()
    {
        return "NoobSiteBundle:DashBoard:dashboardIndex.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  400 => 155,  397 => 154,  388 => 147,  384 => 145,  381 => 144,  378 => 143,  360 => 139,  357 => 138,  351 => 137,  343 => 135,  340 => 134,  336 => 133,  329 => 131,  325 => 129,  323 => 128,  318 => 127,  315 => 126,  312 => 125,  309 => 124,  306 => 123,  303 => 122,  300 => 121,  297 => 120,  294 => 119,  291 => 118,  284 => 116,  266 => 115,  262 => 113,  259 => 112,  257 => 111,  249 => 105,  245 => 103,  242 => 102,  239 => 101,  222 => 97,  216 => 96,  208 => 94,  205 => 93,  201 => 92,  192 => 90,  188 => 88,  186 => 87,  182 => 86,  175 => 85,  157 => 84,  153 => 82,  150 => 81,  148 => 80,  128 => 63,  124 => 62,  117 => 57,  103 => 45,  100 => 44,  98 => 43,  89 => 36,  78 => 34,  74 => 33,  63 => 25,  56 => 21,  48 => 18,  32 => 4,  29 => 3,);
    }
}
