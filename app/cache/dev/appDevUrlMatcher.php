<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // noob_messagerie_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_messagerie_homepage')), array (  '_controller' => 'Noob\\MessagerieBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/comment')) {
            // noob_comment_createComment
            if (0 === strpos($pathinfo, '/comment/post') && preg_match('#^/comment/post\\-(?P<postId>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_comment_createComment')), array (  '_controller' => 'Noob\\CommentBundle\\Controller\\CommentController::createCommentAction',));
            }

            if (0 === strpos($pathinfo, '/comments')) {
                // noob_comment_getCommentsList
                if (0 === strpos($pathinfo, '/comments/post') && preg_match('#^/comments/post\\-(?P<postId>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_comment_getCommentsList')), array (  '_controller' => 'Noob\\CommentBundle\\Controller\\CommentController::getCommentsListAction',));
                }

                // noob_comment_deleteComment
                if (0 === strpos($pathinfo, '/comments/delete') && preg_match('#^/comments/delete\\-(?P<commentId>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_comment_deleteComment')), array (  '_controller' => 'Noob\\CommentBundle\\Controller\\CommentController::deleteUserCommentAction',));
                }

            }

        }

        // noob_site_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'noob_site_homepage');
            }

            return array (  '_controller' => 'Noob\\SiteBundle\\Controller\\GlobalController::homepageAction',  '_route' => 'noob_site_homepage',);
        }

        // noob_site_searchContent
        if ($pathinfo === '/recherche') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_noob_site_searchContent;
            }

            return array (  '_controller' => 'Noob\\SiteBundle\\Controller\\SearchController::searchContentAction',  '_route' => 'noob_site_searchContent',);
        }
        not_noob_site_searchContent:

        // noob_site_searchUpdateAjax
        if ($pathinfo === '/updateSearch') {
            return array (  '_controller' => 'Noob\\SiteBundle\\Controller\\SearchController::updateSearchAjaxAction',  '_route' => 'noob_site_searchUpdateAjax',);
        }

        // noob_site_searchSeeMoreAjax
        if ($pathinfo === '/searchSeeMore') {
            return array (  '_controller' => 'Noob\\SiteBundle\\Controller\\SearchController::searchSeeMoreAjaxAction',  '_route' => 'noob_site_searchSeeMoreAjax',);
        }

        if (0 === strpos($pathinfo, '/user/dashboard')) {
            // noob_site_dashboard_index
            if ($pathinfo === '/user/dashboard') {
                return array (  '_controller' => 'Noob\\SiteBundle\\Controller\\DashBoardController::dashBoardIndexAction',  '_route' => 'noob_site_dashboard_index',);
            }

            if (0 === strpos($pathinfo, '/user/dashboard/get')) {
                // noob_comment_getUserLastCommentAjax
                if ($pathinfo === '/user/dashboard/getLastComment') {
                    return array (  '_controller' => 'Noob\\SiteBundle\\Controller\\DashBoardController::getUserLastCommentAjaxAction',  '_route' => 'noob_comment_getUserLastCommentAjax',);
                }

                // noob_comment_getUserFriendsPostsAjax
                if ($pathinfo === '/user/dashboard/getFriendsPost') {
                    return array (  '_controller' => 'Noob\\SiteBundle\\Controller\\DashBoardController::getUserFriendsPostsAjaxAction',  '_route' => 'noob_comment_getUserFriendsPostsAjax',);
                }

            }

        }

        // noob_portfolio_detail
        if (0 === strpos($pathinfo, '/portfolio') && preg_match('#^/portfolio/(?P<id>[^/\\-]++)\\-(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_portfolio_detail')), array (  '_controller' => 'Noob\\PostBundle\\Controller\\PortfolioController::detailAction',));
        }

        // noob_offre_detail
        if (0 === strpos($pathinfo, '/offre') && preg_match('#^/offre/(?P<id>[^/\\-]++)\\-(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_offre_detail')), array (  '_controller' => 'Noob\\PostBundle\\Controller\\OffreController::detailAction',));
        }

        // noob_tfe_detail
        if (0 === strpos($pathinfo, '/tfe') && preg_match('#^/tfe/(?P<id>[^/\\-]++)\\-(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_tfe_detail')), array (  '_controller' => 'NoobPostBundle:Tfe:detail',));
        }

        // noob_post_ajax_like
        if ($pathinfo === '/like-post-ajax') {
            return array (  '_controller' => 'Noob\\PostBundle\\Controller\\GlobalController::likeAction',  '_route' => 'noob_post_ajax_like',);
        }

        // noob_post_ajax_get_likers
        if ($pathinfo === '/get-likers-ajax') {
            return array (  '_controller' => 'Noob\\PostBundle\\Controller\\GlobalController::getLikersAction',  '_route' => 'noob_post_ajax_get_likers',);
        }

        // noob_tag_ajax_suggestion
        if ($pathinfo === '/tagSuggestion') {
            return array (  '_controller' => 'Noob\\TagBundle\\Controller\\TagController::getSuggestionsAjaxAction',  '_route' => 'noob_tag_ajax_suggestion',);
        }

        if (0 === strpos($pathinfo, '/profil')) {
            // noob_user_userprofilepage
            if (preg_match('#^/profil/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_user_userprofilepage')), array (  '_controller' => 'Noob\\UserBundle\\Controller\\ProfilController::profilPageAction',));
            }

            // noob_user_userFollowers
            if (preg_match('#^/profil/(?P<slug>[^/]++)/followers$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_user_userFollowers')), array (  '_controller' => 'Noob\\UserBundle\\Controller\\ProfilController::followersPageAction',));
            }

            // noob_user_userFollowings
            if (preg_match('#^/profil/(?P<slug>[^/]++)/following$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_user_userFollowings')), array (  '_controller' => 'Noob\\UserBundle\\Controller\\ProfilController::followingsPageAction',));
            }

            // noob_user_userPostsLiked
            if (preg_match('#^/profil/(?P<slug>[^/]++)/likes$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_user_userPostsLiked')), array (  '_controller' => 'Noob\\UserBundle\\Controller\\ProfilController::likesPageAction',));
            }

        }

        // noob_user_ajax_followUser
        if ($pathinfo === '/follow-user-ajax') {
            return array (  '_controller' => 'Noob\\UserBundle\\Controller\\ProfilController::followUserAction',  '_route' => 'noob_user_ajax_followUser',);
        }

        // noob_user_ajax_get_followers
        if ($pathinfo === '/get-followers-ajax') {
            return array (  '_controller' => 'Noob\\UserBundle\\Controller\\ProfilController::getFollowersAction',  '_route' => 'noob_user_ajax_get_followers',);
        }

        // noob_user_profilcompleteListAjax
        if (0 === strpos($pathinfo, '/profil-complete-list-ajax') && preg_match('#^/profil\\-complete\\-list\\-ajax/(?P<contentType>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'noob_user_profilcompleteListAjax')), array (  '_controller' => 'Noob\\UserBundle\\Controller\\ProfilController::getCompleteListAjaxAction',));
        }

        if (0 === strpos($pathinfo, '/log')) {
            // user_login
            if ($pathinfo === '/login') {
                return array (  '_controller' => 'Noob\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'user_login',);
            }

            // user_logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'user_logout');
            }

            // user_login_check
            if ($pathinfo === '/login_check') {
                return array('_route' => 'user_login_check');
            }

        }

        // noob_user_list
        if ($pathinfo === '/userlist') {
            return array (  '_controller' => 'Noob\\UserBundle\\Controller\\TestController::listAction',  '_route' => 'noob_user_list',);
        }

        // noob_insert_user
        if ($pathinfo === '/insertuser') {
            return array (  '_controller' => 'Noob\\UserBundle\\Controller\\TestController::insertAction',  '_route' => 'noob_insert_user',);
        }

        if (0 === strpos($pathinfo, '/samot')) {
            // noob_user_testpage
            if ($pathinfo === '/samot/pagetestuser') {
                return array (  '_controller' => 'Noob\\UserBundle\\Controller\\TestController::testAction',  '_route' => 'noob_user_testpage',);
            }

            // noob_user_testpagea
            if ($pathinfo === '/samot/okok') {
                return array (  '_controller' => 'Noob\\UserBundle\\Controller\\TestController::testAction',  '_route' => 'noob_user_testpagea',);
            }

        }

        if (0 === strpos($pathinfo, '/test')) {
            // noob_user_testtestpage
            if ($pathinfo === '/testtest') {
                return array (  '_controller' => 'Noob\\UserBundle\\Controller\\TestController::testtestAction',  '_route' => 'noob_user_testtestpage',);
            }

            // noob_user_testpourcrop
            if ($pathinfo === '/testpourcrop') {
                return array (  '_controller' => 'Noob\\UserBundle\\Controller\\TestController::testPourCropAction',  '_route' => 'noob_user_testpourcrop',);
            }

            // noob_user_testLotOfFollowings
            if ($pathinfo === '/testLotOfFollowings') {
                return array (  '_controller' => 'Noob\\UserBundle\\Controller\\TestController::testLotOfFollowingsAction',  '_route' => 'noob_user_testLotOfFollowings',);
            }

        }

        if (0 === strpos($pathinfo, '/samot/log')) {
            // adminlogin
            if ($pathinfo === '/samot/login') {
                return array (  '_controller' => 'Noob\\UserBundle\\Controller\\SecurityController::adminLoginAction',  '_route' => 'adminlogin',);
            }

            // adminlogout
            if ($pathinfo === '/samot/logout') {
                return array('_route' => 'adminlogout');
            }

            // adminlogin_check
            if ($pathinfo === '/samot/login_check') {
                return array('_route' => 'adminlogin_check');
            }

        }

        if (0 === strpos($pathinfo, '/media/cache/resolve')) {
            // liip_imagine_filter_runtime
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/rc/(?P<hash>[^/]++)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter_runtime;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter_runtime')), array (  '_controller' => 'liip_imagine.controller:filterRuntimeAction',));
            }
            not_liip_imagine_filter_runtime:

            // liip_imagine_filter
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter')), array (  '_controller' => 'liip_imagine.controller:filterAction',));
            }
            not_liip_imagine_filter:

        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
