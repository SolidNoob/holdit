$(document).ready(function(){
    $('.fade-on-load').hide().fadeIn();
    
    $('#homesearch .tag').click(function(){
        var search = $('#mainsearchbar');
        search.val(search.val() + $(this).html() + ' ');
    });
    
    
    $('.suggest-wrapper .showmore').click(function(e){
        e.preventDefault();
        $(this).parent('.suggest-wrapper').find('.hide-me').fadeToggle();
        if($(this).text() === 'Agrandir la liste'){
            $(this).text('Réduire la liste');
        }else{
            $(this).text('Agrandir la liste');
        }
    });
    
    $('.profil-description .showmore').click(function(e){
        e.preventDefault();
        $(this).parent('.profil-description').find('.hide-me').fadeToggle();
        if($(this).text() === 'Agrandir la description'){
            $(this).text('Réduire la description');
        }else{
            $(this).text('Agrandir la description');
        }
    });
    
    
    var currEvent = true;
    //Follow User AjaxCall
    $('body').on('click', '.follow-me', function(e){ 
        e.preventDefault();
        if(currEvent){
            currEvent = false;
            var userid = $(this).data('user-id');
            $.ajax({
                type: "POST",
                url: Routing.generate('noob_user_ajax_followUser'),
                data: {userid: userid},
                context: $(this),
                success: function(data){
                    if(typeof data.notConnected !== 'undefined'){
                        bootbox.alert({
                            title: data.title,
                            message: data.message
                        });
                    } else {
                        var $nbFollowersDOM = $(this).closest('.wrapper').find('.nb-followers');
                        var nbFollowers = parseInt($nbFollowersDOM.text());
                        if(data.action){ 
                            nbFollowers++;
                        } else { 
                            nbFollowers--;
                        }
                        $(this).toggleClass('selected');
                        $nbFollowersDOM.text(nbFollowers);
                    }
                    $(this).html('');
                },
                error: function(xhr, status){
                    console.log(xhr.responseText);
                },
                complete: function(){
                    currEvent = true;
                }
            });
            $(this).html('<i class="fa fa-spinner fa-pulse"></i> ');
        }
    });
    
    //Like Post Ajax Call
    $('body').on('click', '.like-me', function(e){ 
        e.preventDefault();
        if(currEvent){
            currEvent = false;
            var postid = $(this).data('post-id');
            $.ajax({
                type: "POST",
                url: Routing.generate('noob_post_ajax_like'),
                data: {postid: postid},
                context: $(this),
                success: function(data){
                    if(typeof data.notConnected !== 'undefined'){
                        bootbox.alert({
                            title: data.title,
                            message: data.message
                        });
                    } else {
                        var $nbLikersDOM = $(this).closest('.wrapper').find('.nb-likes');
                        var nbLikers = parseInt($nbLikersDOM.text());
                        if(data.action){ 
                            nbLikers++;
                        } else { 
                            nbLikers--;
                        }
                        $nbLikersDOM.text(nbLikers);
                        $(this).toggleClass('selected');
                    }
                    $(this).html('<i class="fa fa-heart"></i>');
                },
                error: function(xhr, status){
                    console.log(xhr.responseText);
                },
                complete: function(){
                    currEvent = true;
                }
            });
            $(this).html('<i class="fa fa-spinner fa-pulse"></i> ');
        }
    });
    
    //click on nb-followers link
    $('body').on('click', '.user-followers', function(e){ 
        e.preventDefault();
        if(currEvent){
            currEvent = false;
            var userid = $(this).data('user-id');
            $.ajax({
                type: "POST",
                url: Routing.generate('noob_user_ajax_get_followers'),
                data: {userid: userid},
                context: $(this),
                success: function(data){
                    if(data === null){
                        return null;
                    } 
                    bootbox.alert({
                        message: data.content,
                        title: 'Membres suivant ' + data.title
                    });
                },
                error: function(xhr, status){
                    console.log(xhr.responseText);
                },
                complete: function(){
                    currEvent = true;
                }
           });  
       }
    }); 
        
    //click on nb-likers link
    $('body').on('click', '.post-likers', function(e){ 
        e.preventDefault();
        if(currEvent){
            currEvent = false;
            var postid = $(this).data('post-id');
            $.ajax({
                type: "POST",
                url: Routing.generate('noob_post_ajax_get_likers'),
                data: {postid: postid},
                context: $(this),
                success: function(data){
                    if(data === null){
                        return null;
                    } 
                    bootbox.alert({
                        message: data.content,
                        title: 'Membres aimant ' + data.title
                    });
                },
                error: function(xhr, status){
                    console.log(xhr.responseText);
                },
                complete: function(){
                    currEvent = true;
                }
            });
        }
    }); 
    
});