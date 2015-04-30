<?php

/* NoobPostBundle:Global:postDetail.html.twig */
class __TwigTemplate_20c5d9a4d88ad6c7bde35cbeab40e8675383ec67fb701098fac431595934e316 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate(":default:layout.html.twig");

        $this->blocks = array(
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

    // line 5
    public function block_javascripts($context, array $blocks = array())
    {
        // line 6
        echo "<script>
\$(document).ready(function(){
    \$.ajax({
        type: \"POST\",
        url: \"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_comment_createComment", array("postId" => $this->getAttribute($this->getContext($context, "item"), "id", array()))), "html", null, true);
        echo "\",
        context: \$(this),
        success: function(data){
            \$('#renderform').html(data);
        }
    });
    
    var currEvent = true;
    //display more
    \$('body').on('click', '.load-more', function(e){
        if(currEvent){
            currEvent = false;
            var of = \$(this).attr('data-of');
            \$.ajax({
                type: \"POST\",
                url: \"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_comment_getCommentsList", array("postId" => $this->getAttribute($this->getContext($context, "item"), "id", array()))), "html", null, true);
        echo "\",
                data: {of:of},
                context: \$(this),
                success: function(data){
                    if(data.stillrecord === false)
                    {
                        \$(this).fadeOut('1000',function(){
                            \$(this).next('.no-more-result').fadeIn().css({'display':'block'});
                        });
                    }
                    else
                    {
                        \$response = \$(data.response).hide();
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
    
    \$('body').on('submit','#commentForm', function(e){
    e.preventDefault();
        if(currEvent){
            currEvent = false;
            \$.ajax({
                type: \"POST\",
                url: \"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_comment_createComment", array("postId" => $this->getAttribute($this->getContext($context, "item"), "id", array()))), "html", null, true);
        echo "\",
                data: \$(this).serialize(),
                context: \$(this),
                success: function(data){
                        \$response = \$(data).hide();
                        \$(\$response).prependTo('.comment-wrapper');
                        \$response.fadeIn();
                        \$('.no-comment').hide();
                        resetForm();
                },
                complete: function(){
                    currEvent = true;
                }
            });
        }
    });
    
    function resetForm(){
        \$.ajax({
            type: \"POST\",
            url: \"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noob_comment_createComment", array("postId" => $this->getAttribute($this->getContext($context, "item"), "id", array()))), "html", null, true);
        echo "\",
            context: \$(this),
            success: function(data){
                    \$('#renderform').html(data);
                }
        });
    }
    
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
                                \$(mythis).parent('.comment').fadeOut();
                            }
                        });
                    }
                }
            });
        }
    });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "NoobPostBundle:Global:postDetail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 81,  94 => 61,  55 => 25,  37 => 10,  31 => 6,  28 => 5,);
    }
}
