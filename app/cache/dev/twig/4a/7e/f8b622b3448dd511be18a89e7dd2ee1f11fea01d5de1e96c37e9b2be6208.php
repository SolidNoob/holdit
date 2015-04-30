<?php

/* NoobUserBundle:Profil:profilpage.html.twig */
class __TwigTemplate_4a7ef8b622b3448dd511be18a89e7dd2ee1f11fea01d5de1e96c37e9b2be6208 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate(":default:layout.html.twig");

        $this->blocks = array(
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
";
        // line 5
        if ($this->getAttribute($this->getContext($context, "user"), "cover", array())) {
            // line 6
            echo "    ";
            $context["cover_image"] = $this->getAttribute($this->getContext($context, "user"), "cover", array());
        } else {
            // line 8
            echo "    ";
            $context["cover_image"] = "default.jpg";
        }
        // line 10
        echo "

";
        // line 16
        echo "
";
        // line 21
        echo "<div class=\"parallax-cover parallax-window\" data-parallax=\"scroll\" data-image-src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("img/cover/" . $this->getContext($context, "cover_image"))), "html", null, true);
        echo "\" data-speed=\"0.6\"></div>


<div class=\"profil-board pb\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-9\">
                <div class=\"row profil-header\">
                  <div class=\"col-md-4\">
                      <figure>
                            ";
        // line 31
        $this->env->loadTemplate("NoobUserBundle:Global:userImage.html.twig")->display(array_merge($context, array("mode" => "profil", "picturename" => $this->getAttribute($this->getContext($context, "user"), "picture", array()), "alt" => ($this->getAttribute($this->getContext($context, "user"), "firstname", array()) . $this->getAttribute($this->getContext($context, "user"), "surname", array())))));
        // line 32
        echo "                      </figure>
                      <div class=\"social-group\">
                        ";
        // line 34
        if (((!(null === $this->getAttribute($this->getContext($context, "user"), "fblink", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "user"), "fblink", array()))))) {
            // line 35
            echo "                          <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "fblink", array()), "html", null, true);
            echo "\" rel=\"nofollow\" target=\"_blank\" class=\"fb-button social-button text-hide\">Page Facebook de ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "surname", array()), "html", null, true);
            echo "</a>
                          ";
        } else {
            // line 37
            echo "                          <span class=\"fb-button social-button text-hide empty\">Page Facebook de ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "surname", array()), "html", null, true);
            echo "</span>
                        ";
        }
        // line 39
        echo "                          
                        ";
        // line 40
        if (((!(null === $this->getAttribute($this->getContext($context, "user"), "twitterlink", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "user"), "twitterlink", array()))))) {
            // line 41
            echo "                          <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "twitterlink", array()), "html", null, true);
            echo "\" rel=\"nofollow\" target=\"_blank\" class=\"twitter-button social-button  text-hide\">Page Twitter de ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "surname", array()), "html", null, true);
            echo "</a>
                        ";
        } else {
            // line 43
            echo "                          <span class=\"twitter-button social-button text-hide empty\">Page Twitter de ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "surname", array()), "html", null, true);
            echo "</span>
                        ";
        }
        // line 45
        echo "                          
                        ";
        // line 46
        if (((!(null === $this->getAttribute($this->getContext($context, "user"), "linkedinlink", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "user"), "linkedinlink", array()))))) {
            // line 47
            echo "                          <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "linkedinlink", array()), "html", null, true);
            echo "\" rel=\"nofollow\" target=\"_blank\" class=\"linkedin-button social-button  text-hide\">Page LinkedIn de ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "surname", array()), "html", null, true);
            echo "</a>
                        ";
        } else {
            // line 49
            echo "                          <span class=\"linkedin-button social-button text-hide empty\">Page LinkedIn de ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "surname", array()), "html", null, true);
            echo "</span>
                        ";
        }
        // line 51
        echo "                      </div>
                  </div>
                  <div class=\"col-md-8\">
                      <div class=\"profil-card planked\">
                          <div class=\"heading\">
                              <h1>";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
        echo " <strong>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "surname", array()), "html", null, true);
        echo "</strong></h1>
                          </div>
                          
                        ";
        // line 59
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "user"), "role", array()), "slug", array()) == "etudiant")) {
            // line 60
            echo "                            <div>Étudiant(e) en ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "user"), "section", array()), "name", array()), "html", null, true);
            echo "</div>
                        ";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "user"), "role", array()), "slug", array()) == "entreprise")) {
            // line 62
            echo "                            ";
            if (((!(null === $this->getAttribute($this->getContext($context, "user"), "websiteurl", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "user"), "websiteurl", array()))))) {
                // line 63
                echo "                                <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "websiteurl", array()), "html", null, true);
                echo "\" target=\"_blank\" rel=\"nofollow\" class=\"violet-me\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "society", array()), "html", null, true);
                echo "</a>
                                ";
            } else {
                // line 65
                echo "                                ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "society", array()), "html", null, true);
                echo "
                            ";
            }
            // line 67
            echo "                        ";
        }
        // line 68
        echo "                                
                          <p>Tag(s) associé(s): 
                              ";
        // line 70
        $context["nbTag"] = (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "tags", array())) - 1);
        // line 71
        echo "                                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "user"), "tags", array()));
        foreach ($context['_seq'] as $context["key"] => $context["tag"]) {
            // line 72
            echo "                                     <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_site_searchContent", array("search" => $this->getAttribute($context["tag"], "name", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "name", array()), "html", null, true);
            echo "</a>";
            if (($context["key"] != $this->getContext($context, "nbTag"))) {
                echo ", ";
            }
            // line 73
            echo "                              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "                          </p>
                          <p class=\"contact\">
                            ";
        // line 76
        if ($this->getAttribute($this->getContext($context, "user"), "visibleInfo", array())) {
            // line 77
            echo "                              <span>
                                <i class=\"fa fa-envelope\"></i> 
                                ";
            // line 79
            if (((!(null === $this->getAttribute($this->getContext($context, "user"), "email", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "user"), "email", array()))))) {
                // line 80
                echo "                                    <a href=\"mailto:";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "email", array()), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "email", array()), "html", null, true);
                echo "</a>
                                ";
            } else {
                // line 82
                echo "                                    Adresse e-mail non renseignée
                                ";
            }
            // line 84
            echo "                              </span>
                              
                              <span>
                                <i class=\"fa fa-phone\"></i> 
                                ";
            // line 88
            if (((!(null === $this->getAttribute($this->getContext($context, "user"), "phoneNumber", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "user"), "phoneNumber", array()))))) {
                // line 89
                echo "                                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "phoneNumber", array()), "html", null, true);
                echo "
                                ";
            } else {
                // line 91
                echo "                                    Numéro de téléphone non renseigné
                                ";
            }
            // line 93
            echo "                              </span>
                              
                              ";
            // line 95
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "user"), "role", array()), "slug", array()) == "etudiant")) {
                // line 96
                echo "                              <br/>
                              <span>
                                <i class=\"fa fa-bookmark\"></i>
                                ";
                // line 99
                if (((!(null === $this->getAttribute($this->getContext($context, "user"), "websiteurl", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "user"), "websiteurl", array()))))) {
                    // line 100
                    echo "                                     <a href='";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "websiteurl", array()), "html", null, true);
                    echo "' target='_blank' rel=\"nofollow\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "websiteurl", array()), "html", null, true);
                    echo "</a>
                                ";
                } else {
                    // line 102
                    echo "                                    Pas de site web
                                ";
                }
                // line 104
                echo "                              </span>
                              ";
            }
            // line 106
            echo "                              
                            ";
        }
        // line 108
        echo "                        </p>
                        <div class='result-wrapper'>
                          ";
        // line 110
        $this->env->loadTemplate("NoobUserBundle:Buttons:followme.html.twig")->display(array_merge($context, array("userToFollow" => $this->getContext($context, "user"))));
        // line 111
        echo "                          <button type=\"button\" class='mp-me'><i class=\"fa fa-envelope\"></i> Envoyer un message privé</button>
                        </div>
                      </div>
                  </div>
               </div>
                <div class=\"row\">
                    <article class=\"col-md-4 text-justify\">
                        <div class=\"planked\">
                            <div class=\"heading\">Description</div>
                            <p class=\"profil-description\">
                                ";
        // line 121
        if ($this->getAttribute($this->getContext($context, "user"), "description", array())) {
            // line 122
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "description", array()), "html", null, true);
            echo "
                                ";
        } else {
            // line 124
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "surname", array()), "html", null, true);
            echo " n'a pas encore rempli sa description.
                                ";
        }
        // line 126
        echo "                            </p>
                            
                            ";
        // line 128
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "user"), "role", array()), "slug", array()) == "etudiant")) {
            // line 129
            echo "                            
                                ";
            // line 130
            if (((!(null === $this->getAttribute($this->getContext($context, "user"), "cv", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "user"), "cv", array()))))) {
                // line 131
                echo "                                    <a href='";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("cv/" . $this->getAttribute($this->getContext($context, "user"), "cv", array()))), "html", null, true);
                echo "' class=\"violet seek\">Voir mon curriculum vitae</a>
                                ";
            } else {
                // line 133
                echo "                                    <div class='violet seek'>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
                echo " n'a pas encore déposé son CV</div>
                                ";
            }
            // line 135
            echo "                                
                                <div class='red seek'>
                                ";
            // line 137
            if (((!(null === $this->getAttribute($this->getContext($context, "user"), "lookingforinternship", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "user"), "lookingforinternship", array()))))) {
                // line 138
                echo "                                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
                echo " est à la recherche d'un stage
                                ";
            } else {
                // line 140
                echo "                                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
                echo " ne recherche pas de stage
                                ";
            }
            // line 142
            echo "                                </div>

                                <div class='green seek'>
                                ";
            // line 145
            if (((!(null === $this->getAttribute($this->getContext($context, "user"), "lookingforjob", array()))) && (!twig_test_empty($this->getAttribute($this->getContext($context, "user"), "lookingforjob", array()))))) {
                // line 146
                echo "                                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
                echo " est à la recherche d'un emploi
                                ";
            } else {
                // line 148
                echo "                                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
                echo " ne recherche pas d'emploi
                                ";
            }
            // line 150
            echo "                                </div>
                            ";
        } else {
            // line 152
            echo "                                <div class='red seek'>
                                ";
            // line 153
            if ($this->getAttribute($this->getContext($context, "user"), "jury", array())) {
                // line 154
                echo "                                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
                echo " souhaite participer à un jury TFE
                                    ";
            } else {
                // line 156
                echo "                                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
                echo " ne souhaite pas être contacté pour participer à un jury TFE
                                ";
            }
            // line 158
            echo "                                </div>
                            ";
        }
        // line 160
        echo "                        </div>
                    </article>
                    <div class=\"col-md-8\">
                        
                        
                       ";
        // line 165
        if (array_key_exists("offres", $context)) {
            // line 166
            echo "                        <div class=\"portfolio planked\">
                            <div class='heading'>Offres de stage ou d'emploi</div>
                            <div class=\"row\">
                                ";
            // line 169
            if ((!twig_test_empty($this->getContext($context, "offres")))) {
                // line 170
                echo "                                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "offres"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["offre"]) {
                    // line 171
                    echo "                                        <article class='col-md-4 col-xs-4'>
                                            <a href='";
                    // line 172
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($context["offre"], "id", array()), "slug" => $this->getAttribute($context["offre"], "slug", array()))), "html", null, true);
                    echo "' >
                                                ";
                    // line 173
                    $this->env->loadTemplate("NoobPostBundle:Global:postImage.html.twig")->display(array_merge($context, array("mode" => "preview", "picturename" => $this->getAttribute($context["offre"], "picture", array()), "alt" => $this->getAttribute($context["offre"], "name", array()))));
                    // line 174
                    echo "                                            </a>
                                            <div class='portfolio-title'>
                                                <a href='";
                    // line 176
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($context["offre"], "id", array()), "slug" => $this->getAttribute($context["offre"], "slug", array()))), "html", null, true);
                    echo "' >
                                                    ";
                    // line 177
                    echo twig_escape_filter($this->env, (((twig_length_filter($this->env, $this->getAttribute($context["offre"], "name", array())) > 20)) ? ((twig_slice($this->env, $this->getAttribute($context["offre"], "name", array()), 0, 20) . "...")) : ($this->getAttribute($context["offre"], "name", array()))), "html", null, true);
                    echo "
                                                </a>
                                            </div>
                                        </article
>                                    ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['offre'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 182
                echo "                                ";
            } else {
                // line 183
                echo "                                    <div class=\"col-sm-4 col-xs-6\">
                                        Aucune offre
                                    </div>
                                ";
            }
            // line 187
            echo "                                    </div>
                                </div>
                        ";
        }
        // line 190
        echo "                        
                        
                        <div class=\"portfolio planked\">
                            <div class='heading'>Portfolio</div>
                            <div class=\"row\">
                                ";
        // line 195
        if ((!twig_test_empty($this->getContext($context, "portfolioElements")))) {
            // line 196
            echo "                                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "portfolioElements"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
                // line 197
                echo "                                        <article class='col-md-4 col-xs-4'>
                                            <a href='";
                // line 198
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_portfolio_detail", array("id" => $this->getAttribute($context["project"], "id", array()), "slug" => $this->getAttribute($context["project"], "slug", array()))), "html", null, true);
                echo "'>
                                                ";
                // line 199
                $this->env->loadTemplate("NoobPostBundle:Global:postImage.html.twig")->display(array_merge($context, array("mode" => "preview", "picturename" => $this->getAttribute($context["project"], "picture", array()), "alt" => $this->getAttribute($context["project"], "name", array()))));
                // line 200
                echo "                                            </a>
                                            <div class='portfolio-title'>
                                                <a href='";
                // line 202
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_portfolio_detail", array("id" => $this->getAttribute($context["project"], "id", array()), "slug" => $this->getAttribute($context["project"], "slug", array()))), "html", null, true);
                echo "'>
                                                    ";
                // line 203
                echo twig_escape_filter($this->env, (((twig_length_filter($this->env, $this->getAttribute($context["project"], "name", array())) > 20)) ? ((twig_slice($this->env, $this->getAttribute($context["project"], "name", array()), 0, 20) . "...")) : ($this->getAttribute($context["project"], "name", array()))), "html", null, true);
                echo "
                                                </a>
                                            </div>
                                        </article>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 208
            echo "                                    <div class='col-xs-12'>
                                        <a href='#' class='see-more'>Voir la liste complète</a>
                                    </div>
                                ";
        } else {
            // line 212
            echo "                                    <div class='col-xs-12'>
                                        <p>Aucun élément dans le portfolio de ";
            // line 213
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo "</p>
                                    </div>
                                ";
        }
        // line 216
        echo "                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class=\"col-lg-3\">
                <div class=\"row\">
                    <div class=\"col-lg-12 col-md-4\">
                        <div class=\"box violet\">
                            <div class='heading'>Coups de <i class=\"fa fa-heart\"></i> (<span class='count'>";
        // line 227
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "postsLiked")), "html", null, true);
        echo "</span>)</div>
                            <div class='group'>
                            ";
        // line 229
        if ((!twig_test_empty($this->getContext($context, "postsLiked")))) {
            // line 230
            echo "                                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "postsLiked"), 0, 6));
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
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 231
                echo "                                    ";
                if (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "portfolio")) {
                    // line 232
                    echo "                                        ";
                    $context["route"] = $this->env->getExtension('routing')->getPath("noob_portfolio_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                    // line 233
                    echo "                                    ";
                } elseif (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "offrestage")) {
                    // line 234
                    echo "                                        ";
                    $context["route"] = $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                    // line 235
                    echo "                                    ";
                } elseif (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "offreemploi")) {
                    // line 236
                    echo "                                        ";
                    $context["route"] = $this->env->getExtension('routing')->getPath("noob_offre_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                    // line 237
                    echo "                                    ";
                } elseif (($this->getAttribute($this->getAttribute($context["post"], "type", array()), "name", array()) == "tfe")) {
                    // line 238
                    echo "                                        ";
                    $context["route"] = $this->env->getExtension('routing')->getPath("noob_tfe_detail", array("id" => $this->getAttribute($context["post"], "id", array()), "slug" => $this->getAttribute($context["post"], "slug", array())));
                    // line 239
                    echo "                                    ";
                }
                // line 240
                echo "                                     <a href='";
                echo twig_escape_filter($this->env, $this->getContext($context, "route"), "html", null, true);
                echo "' title='";
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "name", array()), "html", null, true);
                echo "'>
                                        ";
                // line 241
                $this->env->loadTemplate("NoobPostBundle:Global:postImage.html.twig")->display(array_merge($context, array("mode" => "minithumb", "picturename" => $this->getAttribute($context["post"], "picture", array()), "alt" => $this->getAttribute($context["post"], "name", array()))));
                // line 242
                echo "                                     </a>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 244
            echo "                                <a href='";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userPostsLiked", array("slug" => $this->getAttribute($this->getContext($context, "user"), "slug", array()))), "html", null, true);
            echo "' class='see-more'>Voir la liste complète</a>
                            ";
        } else {
            // line 246
            echo "                                Pour le moment, ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo " n'a aucun coup de coeur.
                            ";
        }
        // line 248
        echo "                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-12 col-md-4\">
                        <div class=\"box red\">
                            <div class='heading'>Following (<span class='count'>";
        // line 253
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "usersIFollow", array())), "html", null, true);
        echo "</span>)</div>
                            <div class='group'>
                            ";
        // line 255
        if ((!twig_test_empty($this->getContext($context, "usersIFollow")))) {
            // line 256
            echo "                                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "usersIFollow"), 0, 6));
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
            foreach ($context['_seq'] as $context["_key"] => $context["following"]) {
                // line 257
                echo "                                        <a href='";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($context["following"], "slug", array()))), "html", null, true);
                echo "' title='";
                echo twig_escape_filter($this->env, $this->getAttribute($context["following"], "firstname", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["following"], "surname", array()), "html", null, true);
                echo "' >
                                            ";
                // line 258
                $this->env->loadTemplate("NoobUserBundle:Global:userImage.html.twig")->display(array_merge($context, array("mode" => "minithumb", "picturename" => $this->getAttribute($context["following"], "picture", array()), "alt" => ($this->getAttribute($context["following"], "firstname", array()) . $this->getAttribute($context["following"], "surname", array())))));
                // line 259
                echo "                                        </a>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['following'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 261
            echo "                                <a href='";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userFollowings", array("slug" => $this->getAttribute($this->getContext($context, "user"), "slug", array()))), "html", null, true);
            echo "' class='see-more'>Voir la liste complète</a>
                            ";
        } else {
            // line 263
            echo "                                 Pour le moment, ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo " ne suit aucun membre
                            ";
        }
        // line 265
        echo "                            </div>
                        </div>
                    </div>

                    <div class=\"col-lg-12 col-md-4\">
                        <div class=\"box green\">
                            <div class='heading'>Followers (<span class='count'>";
        // line 271
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "usersFollowers", array())), "html", null, true);
        echo "</span>)</div> 
                           <div class='group'>
                            ";
        // line 273
        if ((!twig_test_empty($this->getContext($context, "usersFollowers")))) {
            // line 274
            echo "                                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "usersFollowers"), 0, 6));
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
            foreach ($context['_seq'] as $context["_key"] => $context["follower"]) {
                // line 275
                echo "                                    <a href='";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userprofilepage", array("slug" => $this->getAttribute($context["follower"], "slug", array()))), "html", null, true);
                echo "' title='";
                echo twig_escape_filter($this->env, $this->getAttribute($context["follower"], "firstname", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["follower"], "surname", array()), "html", null, true);
                echo "'>
                                        ";
                // line 276
                $this->env->loadTemplate("NoobUserBundle:Global:userImage.html.twig")->display(array_merge($context, array("mode" => "minithumb", "picturename" => $this->getAttribute($context["follower"], "picture", array()), "alt" => ($this->getAttribute($context["follower"], "firstname", array()) . $this->getAttribute($context["follower"], "surname", array())))));
                // line 277
                echo "                                    </a>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['follower'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 279
            echo "                                <a href='";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_user_userFollowers", array("slug" => $this->getAttribute($this->getContext($context, "user"), "slug", array()))), "html", null, true);
            echo "' class='see-more'>Voir la liste complète</a>
                            ";
        } else {
            // line 281
            echo "                                Personne ne suit ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo " pour le moment. Soyez le premier à suivre ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname", array()), "html", null, true);
            echo " !
                            ";
        }
        // line 283
        echo "                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "NoobUserBundle:Profil:profilpage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  806 => 283,  798 => 281,  792 => 279,  777 => 277,  775 => 276,  766 => 275,  748 => 274,  746 => 273,  741 => 271,  733 => 265,  727 => 263,  721 => 261,  706 => 259,  704 => 258,  695 => 257,  677 => 256,  675 => 255,  670 => 253,  663 => 248,  657 => 246,  651 => 244,  636 => 242,  634 => 241,  627 => 240,  624 => 239,  621 => 238,  618 => 237,  615 => 236,  612 => 235,  609 => 234,  606 => 233,  603 => 232,  600 => 231,  582 => 230,  580 => 229,  575 => 227,  562 => 216,  556 => 213,  553 => 212,  547 => 208,  528 => 203,  524 => 202,  520 => 200,  518 => 199,  514 => 198,  511 => 197,  493 => 196,  491 => 195,  484 => 190,  479 => 187,  473 => 183,  470 => 182,  451 => 177,  447 => 176,  443 => 174,  441 => 173,  437 => 172,  434 => 171,  416 => 170,  414 => 169,  409 => 166,  407 => 165,  400 => 160,  396 => 158,  390 => 156,  384 => 154,  382 => 153,  379 => 152,  375 => 150,  369 => 148,  363 => 146,  361 => 145,  356 => 142,  350 => 140,  344 => 138,  342 => 137,  338 => 135,  332 => 133,  326 => 131,  324 => 130,  321 => 129,  319 => 128,  315 => 126,  307 => 124,  301 => 122,  299 => 121,  287 => 111,  285 => 110,  281 => 108,  277 => 106,  273 => 104,  269 => 102,  261 => 100,  259 => 99,  254 => 96,  252 => 95,  248 => 93,  244 => 91,  238 => 89,  236 => 88,  230 => 84,  226 => 82,  218 => 80,  216 => 79,  212 => 77,  210 => 76,  206 => 74,  200 => 73,  191 => 72,  186 => 71,  184 => 70,  180 => 68,  177 => 67,  171 => 65,  163 => 63,  160 => 62,  154 => 60,  152 => 59,  144 => 56,  137 => 51,  129 => 49,  119 => 47,  117 => 46,  114 => 45,  106 => 43,  96 => 41,  94 => 40,  91 => 39,  83 => 37,  73 => 35,  71 => 34,  67 => 32,  65 => 31,  51 => 21,  48 => 16,  44 => 10,  40 => 8,  36 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
