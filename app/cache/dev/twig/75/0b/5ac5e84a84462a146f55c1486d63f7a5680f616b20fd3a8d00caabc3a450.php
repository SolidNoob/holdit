<?php

/* NoobSiteBundle:Search:searchResultsLayout.html.twig */
class __TwigTemplate_750b5ac5e84a84462a146f55c1486d63f7a5680f616b20fd3a8d00caabc3a450 extends Twig_Template
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

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "    <div class=\"board violet\">
          <div class=\"container\">
              <div class=\"row\">
                  <div class=\"col-lg-12\">
                      <header>
                        <h1><span class=\"xl-size\">Résultats</span> de la recherche</h1>
                      </header>
                  </div>
              </div>
              <div class='row'>
                <div class='col-xs-12'>
                    <span class='text-left'>Votre recherche:</span> 
                    <ul class=\"tag-cloud\">
                    ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "recherche"));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 30
            echo "                        <li><a href='#' class=\"deletetag\">";
            echo twig_escape_filter($this->env, $context["tag"], "html", null, true);
            echo "</a></li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "                        <li id=\"addtagwrapper\">
                            <form method=\"post\" action=\"#\" class=\"newtagform\">
                            <span class=\"addnewtag\">+</span><!--
                              --><input type=\"text\" name=\"newtagfield\" class=\"search-bar form-control\" id=\"newtagfield\"/>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class='col-xs-12'>
                    <div id=\"tag-suggestions\">
                    </div>
                </div>
            </div>
          </div>
      </div>

      
    <section class=\"board grey\">
       <div class=\"container pb\" id=\"updatehere\">
          ";
        // line 51
        $this->env->loadTemplate("NoobSiteBundle:Search:searchResultsDisplay.html.twig")->display(array_merge($context, array("postList" => $this->getContext($context, "postList"), "userList" => $this->getContext($context, "userList"))));
        // line 52
        echo "       </div>
    </section>
            
";
    }

    // line 57
    public function block_javascripts($context, array $blocks = array())
    {
        // line 58
        echo "<script>
\$(document).ready(function(){
    \$(\"#newtagfield\").hide();
    
    \$('.addnewtag').click(function(e){
        e.preventDefault();
        \$(\"#newtagfield\").toggle();
        \$(this).toggleClass('reallyAddTag');
    });
    \$('body').on('click', '.reallyAddTag', function(e){ 
        e.preventDefault();
        appendNewTag();
    });
    \$('.newtagform').submit(function(e){
        e.preventDefault();
        appendNewTag();
    });
    function appendNewTag(){
        var newTag = \$('#newtagfield').val();
        if(newTag.length > 1)
        {
           \$('#addtagwrapper').before('<li><a href=\"#\" class=\"deletetag\">'+newTag+'</a></li>');
           \$('#newtagfield').val('');
            updateSearch();
        }
        \$('.reallyAddTag').toggleClass('reallyAddTag');
    }
    
    var timer = null;
    \$(\"#newtagfield\").keyup(function(e){
        if(timer) {
            clearTimeout(timer);
        }
        timer = setTimeout(getSuggestions, 300);
    });
    function getSuggestions(){
        var searchString = \$(\"#newtagfield\").val();
        if(searchString.length > 1){
            \$.ajax({
                type: \"POST\",
                url: \"";
        // line 98
        echo $this->env->getExtension('routing')->getPath("noob_tag_ajax_suggestion");
        echo "\",
                data: {searchString: searchString},
                success: function(data){
                    \$(\"#tag-suggestions\").html(data);
                }
            });
        }
    }
    \$('body').on('click', '.deletetag', function(e){ 
        e.preventDefault();
        \$(this).parent('li').remove();
        updateSearch();
    });
    \$('body').on('click', '.clicktoadd', function(e){ 
        e.preventDefault();
        var newTag = \$(this).text();
        \$('#addtagwrapper').before('<li><a href=\"#\" class=\"deletetag\">'+newTag+'</a></li>');
        \$('#newtagfield').val('');
        \$('.addnewtag').toggleClass('reallyAddTag');
        \$(this).fadeOut('fast');
        updateSearch();
    });
    
    function updateSearch(){
        var searchString = [];
        \$('.tag-cloud .deletetag').each(function(){
            searchString.push(\$(this).text());
        });
        if(searchString.length <= 0){
            return false;
        }
        \$.ajax({
            type: \"POST\",
            url: \"";
        // line 131
        echo $this->env->getExtension('routing')->getPath("noob_site_searchUpdateAjax");
        echo "\",
            data: {searchString: searchString},
            success: function(data){
                \$(\"#updatehere\").hide().html(data).fadeIn();
            }
        });
    }
    
    
    //display more
    \$('body').on('click', '.load-more', function(e){
        var searchString = [];
        \$('.tag-cloud .deletetag').each(function(){
            searchString.push(\$(this).text());
        });
        var ty = \$(this).data('ty');
        var of = \$(this).attr('data-of');
        \$.ajax({
            type: \"POST\",
            url: \"";
        // line 150
        echo $this->env->getExtension('routing')->getPath("noob_site_searchSeeMoreAjax");
        echo "\",
            data: {searchString: searchString, ty: ty, of:of},
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
            }
        });
        \$(this).children('span').toggleClass('hide-me').toggleClass('show-me');
        \$(this).children('i').toggleClass('hide-me').toggleClass('show-me');
    });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "NoobSiteBundle:Search:searchResultsLayout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 150,  171 => 131,  135 => 98,  93 => 58,  90 => 57,  83 => 52,  81 => 51,  60 => 32,  51 => 30,  47 => 29,  32 => 16,  29 => 15,);
    }
}
