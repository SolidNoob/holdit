<?php

/* NoobSiteBundle:Global:homepage.html.twig */
class __TwigTemplate_97629da7777ee616aa60d430f27da1bf0b9bed1d5c1bda2fe626534add3dea36 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "<header class=\"full-header\">
          <div class=\"container\">
              <div class=\"row\">
                  <div class=\"col-md-6\">
                      <div class=\"wrapper\">
                        <a href=\"http://www.promotion-sociale.be/\" class=\"text-hide full-logo-ieps\">Promotion Sociale Fléron</a>
                        <a href=\"http://www.federation-wallonie-bruxelles.be/\" class=\"text-hide full-logo-fwb\">Fédération Wallonie Bruxelles</a>
                      </div>
                  </div>
                  <div class=\"col-md-6\">
                      <div class=\"wrapper-signin\">
                        ";
        // line 25
        $this->env->loadTemplate("NoobUserBundle:Global:loginSigninLink.html.twig")->display($context);
        // line 26
        echo "                      </div>
                  </div>
              </div>
          </div>
      </header>

      <section class=\"board violet heading-board\">
          <div class=\"container\">
              <div class=\"row\">
                  <div class=\"col-lg-12\">
                      <header>
                        <h1><span class=\"xl-size\">Interface.</span> promotion-sociale.be</h1>
                        <p class=\"moto\">La connexion entre les <strong class=\"xl-size\">étudiants</strong> et les <strong class=\"xl-size\">entreprises</strong></p>
                      </header>
                  </div>
              </div>
              <div class=\"row\">
                  <div class=\"col-md-4 text-justify board-text\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto.</div>
                  <div class=\"col-md-7 col-md-offset-1\">
                      <form method=\"get\" action=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("noob_site_searchContent");
        echo "\" class=\"search-form form-inline\">
                          <input type=\"text\" name=\"search\" class=\"search-bar form-control\" autocomplete=\"off\" id=\"searchbar\" />
                          <button type=\"submit\" class=\"search-button btn btn-default\">
                              <i class=\"fa fa-search\"></i>
                          </button>
                      </form>
                      <ul class=\"tag-cloud\">
                          <li><a href=\"#\">Portfolio</a></li>
                          <li><a href=\"#\">OffreStage</a></li>
                          <li><a href=\"#\">OffreEmploi</a></li>
                          <li><a href=\"#\">Etudiant</a></li>
                          <li><a href=\"#\">TFE</a></li>
                          <li><a href=\"#\">Entreprise</a></li>
                          <li><a href=\"#\">Symfony2</a></li>
                          <li><a href=\"#\">Framework</a></li>
                          <li><a href=\"#\">PHP</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </section>
      
      <div class=\"parallax-frame parallax-window\" data-parallax=\"scroll\" data-image-src=";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/global/transition1.jpg"), "html", null, true);
        echo " data-speed=\"0.6\"></div>
      
      ";
        // line 69
        $this->env->loadTemplate("NoobSiteBundle:Global:navbar.html.twig")->display($context);
        // line 70
        echo "      
      <section class=\"board red sneaky\">
        <div class=\"container\">
          <div class=\"row\">
              <div class=\"col-lg-12\">
                  <header>
                      <h2><span class=\"xl-size\">Etudiants</span> en recherche de stage ou d'emploi</h2>
                  </header>
              </div>
          </div>
          <div class=\"row\">
              <div class=\"col-md-3 text-justify board-text\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto.</div>
              <div class=\"col-md-9\">
                  <div class='row result-wrapper plank'>
                    <div class=\"col-md-6\">
                        ";
        // line 85
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "studentsLookingFor"), 0, 2));
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
        foreach ($context['_seq'] as $context["_key"] => $context["student"]) {
            // line 86
            echo "                            ";
            $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $context["student"])));
            // line 87
            echo "                        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['student'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "                    </div>
                    <div class=\"col-md-6\">
                        ";
        // line 90
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "studentsLookingFor"), 2, 2));
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
        foreach ($context['_seq'] as $context["_key"] => $context["student"]) {
            // line 91
            echo "                            ";
            $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $context["student"])));
            // line 92
            echo "                        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['student'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "                    </div>
                  </div>
              </div>
          </div>
        </div>
      </section>
      
      <div class=\"parallax-frame parallax-window\" data-parallax=\"scroll\" data-image-src=";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/global/transition2.jpg"), "html", null, true);
        echo " data-speed=\"0.6\"></div>
      
      
      <section class=\"board green pen\">
          <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <header>
                        <h2><span class=\"xl-size\">Offres</span> de stage ou d'emploi</h2>
                    </header>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-3 text-justify board-text\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto.</div>
                <div class=\"col-md-9\">
                    <div class='row result-wrapper plank'>
                    <div class=\"col-md-6\">
                        ";
        // line 117
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "lastOffres"), 0, 2));
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
            // line 118
            echo "                            ";
            $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["offre"])));
            // line 119
            echo "                        ";
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
        // line 120
        echo "                    </div>
                    <div class=\"col-md-6\">
                        ";
        // line 122
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "lastOffres"), 2, 2));
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
            // line 123
            echo "                            ";
            $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["offre"])));
            // line 124
            echo "                        ";
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
        // line 125
        echo "                    </div>
                  </div>
                </div>
            </div>
          </div>
      </section>
      
      <div class=\"parallax-frame parallax-window\" data-parallax=\"scroll\" data-image-src=";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/global/transition3.jpg"), "html", null, true);
        echo " data-speed=\"0.6\"></div>
      
      <section class=\"board violet default\">
          <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <header>
                        <h2><span class=\"xl-size\">Portfolio</span> des membres</h2>
                    </header>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-3 text-justify board-text\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto.</div>
                <div class=\"col-md-9\">
                  <div class='row result-wrapper plank'>
                    <div class=\"col-md-6\">
                        ";
        // line 148
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "lastPortfolioItems"), 0, 2));
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
        foreach ($context['_seq'] as $context["_key"] => $context["portfolioItem"]) {
            // line 149
            echo "                            ";
            $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["portfolioItem"])));
            // line 150
            echo "                        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['portfolioItem'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 151
        echo "                    </div>
                    <div class=\"col-md-6\">
                        ";
        // line 153
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "lastPortfolioItems"), 2, 2));
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
        foreach ($context['_seq'] as $context["_key"] => $context["portfolioItem"]) {
            // line 154
            echo "                            ";
            $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["portfolioItem"])));
            // line 155
            echo "                        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['portfolioItem'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 156
        echo "                    </div>
                  </div>
                </div>
            </div>
          </div>
      </section>
      
      <div class=\"parallax-frame parallax-window\" data-parallax=\"scroll\" data-image-src=";
        // line 163
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/global/transition4.jpg"), "html", null, true);
        echo " data-speed=\"0.6\"></div>
      
      <section class=\"board red sneaky\">
          <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <header>
                        <h2><span class=\"xl-size\">Profils</span> des membres</h2>
                    </header>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-3 text-justify board-text\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto.</div>
                <div class=\"col-md-9\">
                    <div class='row result-wrapper plank'>
                    <div class=\"col-md-6\">
                        ";
        // line 179
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "lastUsers"), 0, 2));
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
        foreach ($context['_seq'] as $context["_key"] => $context["lastUser"]) {
            // line 180
            echo "                            ";
            $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $context["lastUser"])));
            // line 181
            echo "                        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lastUser'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 182
        echo "                    </div>
                    <div class=\"col-md-6\">
                        ";
        // line 184
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "lastUsers"), 2, 2));
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
        foreach ($context['_seq'] as $context["_key"] => $context["lastUser"]) {
            // line 185
            echo "                            ";
            $this->env->loadTemplate("NoobUserBundle:Global:profilpreview.html.twig")->display(array_merge($context, array("user" => $context["lastUser"])));
            // line 186
            echo "                        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lastUser'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 187
        echo "                    </div>
                  </div>
                </div>
            </div>
          </div>
      </section>
      
      <div class=\"parallax-frame parallax-window\" data-parallax=\"scroll\" data-image-src=";
        // line 194
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/global/transition5.jpg"), "html", null, true);
        echo " data-speed=\"0.6\"></div>
      
      <section class=\"board green pen\">
          <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <header>
                        <h2><span class=\"xl-size\">TFE</span> à venir</h2>
                    </header>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-3 text-justify board-text\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iste architecto est obcaecati ducimus quod quis a praesentium laudantium deserunt. Soluta, debitis, tempore sit amet vero perspiciatis alias labore architecto.</div>
                <div class=\"col-md-9\">
                    <div class='row result-wrapper plank'>
                    <div class=\"col-md-6\">
                        ";
        // line 210
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "lastTFE"), 0, 2));
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
        foreach ($context['_seq'] as $context["_key"] => $context["tfe"]) {
            // line 211
            echo "                            ";
            $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["tfe"])));
            // line 212
            echo "                        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tfe'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 213
        echo "                    </div>
                    <div class=\"col-md-6\">
                        ";
        // line 215
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getContext($context, "lastTFE"), 2, 2));
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
        foreach ($context['_seq'] as $context["_key"] => $context["tfe"]) {
            // line 216
            echo "                            ";
            $this->env->loadTemplate("NoobPostBundle:Global:postpreview.html.twig")->display(array_merge($context, array("post" => $context["tfe"])));
            // line 217
            echo "                        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tfe'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 218
        echo "                    </div>
                  </div>
                </div>
            </div>
          </div>
      </section>
";
    }

    // line 226
    public function block_javascripts($context, array $blocks = array())
    {
        // line 227
        echo "<script>
\$(document).ready(function(){
    \$(\".tag-cloud li a\").click(function(e){
        e.preventDefault();
        var actualSearch = \$('#searchbar').val();
        var currentTag = \$(this).text();
        if(actualSearch.length > 0){
            \$('#searchbar').val(actualSearch + ' ' + currentTag);
        } else {
            \$('#searchbar').val(currentTag);
        }
    });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "NoobSiteBundle:Global:homepage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  603 => 227,  600 => 226,  590 => 218,  576 => 217,  573 => 216,  556 => 215,  552 => 213,  538 => 212,  535 => 211,  518 => 210,  499 => 194,  490 => 187,  476 => 186,  473 => 185,  456 => 184,  452 => 182,  438 => 181,  435 => 180,  418 => 179,  399 => 163,  390 => 156,  376 => 155,  373 => 154,  356 => 153,  352 => 151,  338 => 150,  335 => 149,  318 => 148,  299 => 132,  290 => 125,  276 => 124,  273 => 123,  256 => 122,  252 => 120,  238 => 119,  235 => 118,  218 => 117,  198 => 100,  189 => 93,  175 => 92,  172 => 91,  155 => 90,  151 => 88,  137 => 87,  134 => 86,  117 => 85,  100 => 70,  98 => 69,  93 => 67,  68 => 45,  47 => 26,  45 => 25,  32 => 14,  29 => 13,);
    }
}
