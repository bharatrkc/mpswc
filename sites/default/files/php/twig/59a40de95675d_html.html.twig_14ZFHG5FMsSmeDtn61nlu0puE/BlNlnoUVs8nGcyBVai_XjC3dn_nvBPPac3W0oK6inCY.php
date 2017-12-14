<?php

/* themes/mpinvestnew/templates/html.html.twig */
class __TwigTemplate_568b828115671e0ed81422ff6d58724c8baef88800a7b3e2315b95ca47cecbe3 extends Twig_Template
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
        $tags = array("set" => 48);
        $filters = array("clean_class" => 50, "raw" => 66, "safe_join" => 67, "t" => 84);
        $functions = array("url" => 169);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set'),
                array('clean_class', 'raw', 'safe_join', 't'),
                array('url')
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 48
        $context["body_classes"] = array(0 => ((        // line 49
(isset($context["logged_in"]) ? $context["logged_in"] : null)) ? ("user-logged-in") : ("")), 1 => (( !        // line 50
(isset($context["root_path"]) ? $context["root_path"] : null)) ? ("path-frontpage") : (("path-" . \Drupal\Component\Utility\Html::getClass((isset($context["root_path"]) ? $context["root_path"] : null))))), 2 => ((        // line 51
(isset($context["node_type"]) ? $context["node_type"] : null)) ? (("page-node-type-" . \Drupal\Component\Utility\Html::getClass((isset($context["node_type"]) ? $context["node_type"] : null)))) : ("")), 3 => ((        // line 52
(isset($context["db_offline"]) ? $context["db_offline"] : null)) ? ("db-offline") : ("")), 4 => (($this->getAttribute($this->getAttribute(        // line 53
(isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "navbar_position", array())) ? (("navbar-is-" . $this->getAttribute($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "navbar_position", array()))) : ("")), 5 => (($this->getAttribute(        // line 54
(isset($context["theme"]) ? $context["theme"] : null), "has_glyphicons", array())) ? ("has-glyphicons") : ("")));
        // line 57
        echo "<!DOCTYPE html>
<html ";
        // line 58
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["html_attributes"]) ? $context["html_attributes"] : null), "html", null, true));
        echo ">

<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    
    <head-placeholder token=\"";
        // line 66
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">
    <title>";
        // line 67
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('drupal_core')->safeJoin($this->env, (isset($context["head_title"]) ? $context["head_title"] : null), " | ")));
        echo "</title>
    <css-placeholder token=\"";
        // line 68
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">
    <js-placeholder token=\"";
        // line 69
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">
\t<style>
\t.navbar-nav > li > .dropdown-menu {
      width: auto;
\t}
</style>

\t<link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"";
        // line 76
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["directory"]) ? $context["directory"] : null), "html", null, true));
        echo "/images/favicons/apple-touch-icon.png\">
\t<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"";
        // line 77
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["directory"]) ? $context["directory"] : null), "html", null, true));
        echo "/images/favicons/favicon-32x32.png\">
\t<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"";
        // line 78
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["directory"]) ? $context["directory"] : null), "html", null, true));
        echo "/images/favicons/favicon-16x16.png\">
\t<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"";
        // line 79
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["directory"]) ? $context["directory"] : null), "html", null, true));
        echo "/images/favicons/favi.png\">
  </head>

  <body";
        // line 82
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["body_classes"]) ? $context["body_classes"] : null)), "method"), "html", null, true));
        echo ">
     <a href=\"#main-content\" class=\"visually-hidden focusable skip-link\">
      ";
        // line 84
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Skip to main content")));
        echo "
    </a>

    ";
        // line 87
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page_top"]) ? $context["page_top"] : null), "html", null, true));
        echo "

\t<div id=\"preloader\"></div>
   
<div id=\"top-bar\">
    <div class=\"container-fluid top-navigation\">
        <div class=\"row\">
            <div class=\"col-md-6\">
                    <div class=\"logo-section\">
                        <div class=\"row\">
                            <div class=\"col-md-12\">
                            <img src=\"/";
        // line 98
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["directory"]) ? $context["directory"] : null), "html", null, true));
        echo "/images/logos/newlogo.png\" class=\"logo\">
                            </div>                            
                        </div>
                    </div>
            </div><!-- end col-md-6 -->

            <div class=\"col-md-6 hidden-xs\">            
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <div class=\"pull-right\">
                            <ul class=\"clearfix top_menu\">
                                <li class=\"fac_desk\">
                                    <a class=\"invslogin\"  href=\"/\"> <i class=\"fa fa-send\"></i> Facilitation Desk</a>
                                    <div class=\"fac_desk_item\">
                                        <span class=\"text-left\"><b>General:</b></span><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">failitation@mptrifac.org</a><br>
                                        <span class=\"text-left\"><b>Country Desk:</b></span><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">Japan:  japandesk@mpgov.in</a><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">Korea:  koreadesk@mpgov.in </a>
                                    </div>
                                </li>
                                <li><a class=\"invslogin\" href=\"/faqs\"><i class=\"fa fa-quora\"></i>  FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <div class=\"pt-15\">
                            <!--<ul class=\"clearfix top_menu\">
                                <li>
                                    <a href=\"/\"><i class=\"fa fa-phone\"></i> Contact us</a>
                                </li>
                                <li>
                                    <a href=\"/\"><i class=\"now-ui-icons travel_info\"></i> About Us</a>
                                </li>
                                <li class=\"fac_desk\">
                                    <a href=\"/\"> <i class=\"fa fa-send\"></i> Facilitation Desk</a>
                                    <div class=\"fac_desk_item\">
                                        <span class=\"text-left\"><b>General:</b></span><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">failitation@mptrifac.org</a><br>
                                        <span class=\"text-left\"><b>Country Desk:</b></span><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">Japan:  japandesk@mpgov.in</a><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">Korea:  koreadesk@mpgov.in </a>
                                    </div>
                                </li>

                                <li>
                                    <a href=\"/faqs\"> <i class=\"fa fa-lightbulb-o\"></i> F.A.Q</a>
                                </li>
                            </ul>-->
                            <p class=\"white text-right\"> <i class=\"fa fa-phone\"></i> Helpdesk No: +91-755-2559971</p>
                        </div>
                    </div>
                </div>
            </div><!-- end col-md-6 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</div>   

<nav class=\"navbar navbar-default main_nav\"  data-spy=\"affix\" data-offset-top=\"197\">
  <div class=\"container-fluid\">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class=\"navbar-header\">
      <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
        <span class=\"sr-only\">Toggle navigation</span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
      </button>
      <a class=\"home_ico navbar-brand\" href=\"";
        // line 169
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('drupal_core')->getUrl("<front>")));
        echo "\"><i class=\"fa fa-home\"></i> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
      <ul class=\"nav navbar-nav\">
          
        
        <li><a href=\"/about-us\">About</a></li>
          
          
        <li class=\"dropdown\">
          <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Ease of Doing Business <span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu\">
            <li><a href=\"/list-of-pre-establishment-state-approvals\" title=\"List of Pre Establishment State Approvals / Permissions you may require to start a business / industry\">List of Pre Establishment State Approvals</a></li>
            <li><a href=\"/list-of-pre-operations-state-approvals\" title=\"List of Pre-Operations State Approvals / Permissions you may require to start a business / industry\">List of Pre-Operations State Approvals</a></li>
            <li><a href=\"";
        // line 185
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('drupal_core')->getUrl("<front>")));
        echo "backoffice/index.php?r=wizard/service\" title=\"Online Query for State Approvals /Permissions you may require to start a business / industry\">Online Query for State Approvals</a></li>
          </ul>
        </li>
          
          
          
        <li class=\"dropdown\">
          <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Advantage in MP <span class=\"caret\"></span></a>
           <ul class=\"dropdown-menu\">
\t\t\t\t<li><a href=\"/advantage-mp/mp-at-glance\">MP at a Glance</a></li>
\t\t\t\t<li><a href=\"/advantagemp/VISION_2018_ENGLISH.pdf\" target=\"_Blank\">MP Vision 2018</a></li>
\t\t\t\t<li><a href=\"/advantage-mp/industrial-scenario\">Industrial Scenario of MP</a></li>
\t\t\t\t<li><a href=\"/advantage-mp/profiles-of-potential-sector\">Profiles of Potential Sector</a></li>
\t\t\t\t<li><a href=\"/advantage-mp/incentives-and-concessions\">Incentives and Concessions</a></li>
\t\t\t\t<li><a href=\"/advantage-mp/investment-facilitation\">Investment Facilitation</a></li>
\t\t\t\t<li><a href=\"/advantage-mp/investors-information\">Investors Information</a></li>
\t\t\t</ul>
        </li>
        
        <li> <a href=\"/policy_act&rules\">Policy Act & Rules</a> </li>
          
        <li class=\"dropdown\">
          <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">User Manual<span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu\">
            <li><a href=\"/citizencharter/citizencharter.pdf\" target=\"_Blank\">Citizen Charter</a></li>
            <li><a href=\"/usermanuals/swsportal.pdf\" target=\"_Blank\">SWS Portal</a></li>
\t\t\t<li><a href=\"/usermanuals/akvnwater.pdf\" target=\"_Blank\">AKVN Water</a></li>
\t\t\t<li><a href=\"/usermanual/boilerregistration.pdf\" target=\"_Blank\">Boiler Registration</a></li>
\t\t\t<li><a href=\"/usermanual/boilerinspection.pdf\" target=\"_Blank\">Boiler Inspection</a></li> 
          </ul>
        </li>
          
          
      </ul>
        
      <ul class=\"nav navbar-nav navbar-right\">
        <!--<li><a href=\"#\" class=\"loginbtn white\">Dashboard</a></li> -->
        <li class=\"dropdown\">
          <a href=\"#\" class=\"dropdown-toggle loginbtn white\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"><i class=\"fa fa-user-plus\"></i>&nbsp;&nbsp;Login <span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu\">
            <li><a href=\"/backoffice/index.php?r=site/login\">As an Investor</a></li>
            <li><a href=\"/backoffice/index.php?r=site/login\">Department User</a></li>
            <li role=\"separator\" class=\"divider\"></li>
            <li><a href=\"/backoffice/index.php?r=investor/register\">Signup</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- End navigation -->   

    ";
        // line 237
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page"]) ? $context["page"] : null), "html", null, true));
        echo "
\t
\t<div>&nbsp;<br>&nbsp;<br></div>\t\t

      <footer class=\"footer-minimal\">
        <div class=\" \">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-4 footer-left\">
                        <h4 class=\"white\">ABOUT US</h4>
                        <div class=\"h-devider\"></div>
                        <hr class=\"space s\">
                        <img src=\"/";
        // line 249
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["directory"]) ? $context["directory"] : null), "html", null, true));
        echo "/images/logos/newlogo.png\" alt=\"logo\">
                        <hr class=\"space s\">
                        <p style=\"font-size: 12px\">
                            
Madhya Pradesh Trade & Investment Facilitation Corporation Limited (TRIFAC) formerly known as Madhya Pradesh Export Corporation Limited, is a Company established under Companies Act 1956 and Wholly owned by Government of Madhya Pradesh...<a href=\"about_us.html\">more</a>
                        </p>
                    </div>
                    <div class=\"col-md-4 footer-left\">
                        <h4 class=\"white\">CONTACTS</h4>
                        <div class=\"h-devider\"></div>
                        <hr class=\"space s\">
                        <ul class=\"fa-ul\">
                            <li><i class=\"fa-li im-map-marker2\"></i> \"CEDMAP BHAWAN\" 16-A, Arera Hills Bhopal - 462001, M.P(India)</li>
                            <li><i class=\"fa-li im-cloud-smartphone\"></i> +91-755-2575618, 2571830<br>+91-755-2559973</li>                 <li><i class=\"fa-li im-speach-bubble12\"></i> facilitation@mptrifac.org</li>
                            <li><i class=\"fa-li im-phone\"></i>Helpdesk : +91-755-2559971 (10:30 AM to 05:30 PM)</li>
                        </ul>
                        <div class=\"btn-group navbar-social\">
                            <div class=\"btn-group social-group\">
                                <a target=\"_blank\" href=\"#\"><i class=\"fa fa-facebook\"></i></a>
                                <a target=\"_blank\" href=\"#\"><i class=\"fa fa-twitter\"></i></a>
                                <a target=\"_blank\" href=\"#\"><i class=\"fa fa-instagram\"></i></a>
                                <a target=\"_blank\" href=\"#\"><i class=\"fa fa-youtube\"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-4\">
                        <h4 class=\"white\">INFOMATIONS</h4>
                        <div class=\"h-devider\"></div>
                        <hr class=\"space s\">
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <ul class=\"fa-ul\">
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Home</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Company</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Certifications</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Company</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Core Values</a></li>
                                </ul>
                            </div>
                            <div class=\"col-md-6\">
                                <ul class=\"fa-ul\">
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"/faqs\">Faq</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Manuals</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Locations</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"copyright\">
          <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                  <p class=\"white text-center\">© 2017 M.P. Trade and Investment Facilitation Corporation Limited. &nbsp; <span class=\"pull-right\"> &nbsp; Designed by <a href=\"#\">E&Y</a></span> </p>
                </div>
            </div>      
          </div>
        </div>
    </footer> 
    
    
    <!-- use this for popup-->
    <style>
#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
  border-radius: 15px;
  text-align: center;
}
#boxes #dialog {
  width:450px; 
  height:auto;
  padding:10px;
  background-color:#ffffff;
  font-family: 'Segoe UI Light', sans-serif;
  font-size: 15pt;
}
.maintext{
    text-align: center;
  font-family: \"Segoe UI\", sans-serif;
  text-decoration: none;
}
body{
  background: url('bg.jpg');
}
#lorem{
\tfont-family: \"Segoe UI\", sans-serif;
\tfont-size: 12pt;
  text-align: left;
}
#popupfoot{
\tfont-family: \"Segoe UI\", sans-serif;
\tfont-size: 16pt;
  padding: 10px 20px;
}

    </style>
<!--

<div id=\"boxes\">
  <div style=\"top: 199.5px; left: 551.5px; display: none;\" id=\"dialog\" class=\"window\">Welcomes to
    <div id=\"lorem\">
      <p> Madhya Pradesh Trade & Investment Facilitation Corporation Limited </p>
    </div>
      
      <div class=\"pull-right\">
          <button class=\"btn btn-primary\">Ragister Now</button>
          
          <button class=\"btn btn-info\">Skip</button>
      </div>
  </div>
  <div style=\"width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;\" id=\"mask\"></div>
</div>
-->
    ";
        // line 380
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page_bottom"]) ? $context["page_bottom"] : null), "html", null, true));
        echo "

    <js-bottom-placeholder token=\"";
        // line 382
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "themes/mpinvestnew/templates/html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  432 => 382,  427 => 380,  293 => 249,  278 => 237,  223 => 185,  204 => 169,  130 => 98,  116 => 87,  110 => 84,  105 => 82,  99 => 79,  95 => 78,  91 => 77,  87 => 76,  77 => 69,  73 => 68,  69 => 67,  65 => 66,  54 => 58,  51 => 57,  49 => 54,  48 => 53,  47 => 52,  46 => 51,  45 => 50,  44 => 49,  43 => 48,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - \$css: An array of CSS files for the current page.
 * - \$language: (object) The language the site is being displayed in.
 *   \$language->language contains its textual representation.
 *   \$language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - \$rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - \$grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - \$head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - \$head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the \$head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - \$head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - \$styles: Style tags necessary to import all CSS files for the page.
 * - \$scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - \$page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - \$page: The rendered page content.
 * - \$page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - \$classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @ingroup templates
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
#}
{%
  set body_classes = [
    logged_in ? 'user-logged-in',
    not root_path ? 'path-frontpage' : 'path-' ~ root_path|clean_class,
    node_type ? 'page-node-type-' ~ node_type|clean_class,
    db_offline ? 'db-offline',
    theme.settings.navbar_position ? 'navbar-is-' ~ theme.settings.navbar_position,
    theme.has_glyphicons ? 'has-glyphicons',
  ]
%}
<!DOCTYPE html>
<html {{ html_attributes }}>

<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    
    <head-placeholder token=\"{{ placeholder_token|raw }}\">
    <title>{{ head_title|safe_join(' | ') }}</title>
    <css-placeholder token=\"{{ placeholder_token|raw }}\">
    <js-placeholder token=\"{{ placeholder_token|raw }}\">
\t<style>
\t.navbar-nav > li > .dropdown-menu {
      width: auto;
\t}
</style>

\t<link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"{{ directory }}/images/favicons/apple-touch-icon.png\">
\t<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"{{ directory }}/images/favicons/favicon-32x32.png\">
\t<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"{{ directory }}/images/favicons/favicon-16x16.png\">
\t<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"{{ directory }}/images/favicons/favi.png\">
  </head>

  <body{{ attributes.addClass(body_classes) }}>
     <a href=\"#main-content\" class=\"visually-hidden focusable skip-link\">
      {{ 'Skip to main content'|t }}
    </a>

    {{ page_top }}

\t<div id=\"preloader\"></div>
   
<div id=\"top-bar\">
    <div class=\"container-fluid top-navigation\">
        <div class=\"row\">
            <div class=\"col-md-6\">
                    <div class=\"logo-section\">
                        <div class=\"row\">
                            <div class=\"col-md-12\">
                            <img src=\"/{{ directory }}/images/logos/newlogo.png\" class=\"logo\">
                            </div>                            
                        </div>
                    </div>
            </div><!-- end col-md-6 -->

            <div class=\"col-md-6 hidden-xs\">            
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <div class=\"pull-right\">
                            <ul class=\"clearfix top_menu\">
                                <li class=\"fac_desk\">
                                    <a class=\"invslogin\"  href=\"/\"> <i class=\"fa fa-send\"></i> Facilitation Desk</a>
                                    <div class=\"fac_desk_item\">
                                        <span class=\"text-left\"><b>General:</b></span><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">failitation@mptrifac.org</a><br>
                                        <span class=\"text-left\"><b>Country Desk:</b></span><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">Japan:  japandesk@mpgov.in</a><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">Korea:  koreadesk@mpgov.in </a>
                                    </div>
                                </li>
                                <li><a class=\"invslogin\" href=\"/faqs\"><i class=\"fa fa-quora\"></i>  FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <div class=\"pt-15\">
                            <!--<ul class=\"clearfix top_menu\">
                                <li>
                                    <a href=\"/\"><i class=\"fa fa-phone\"></i> Contact us</a>
                                </li>
                                <li>
                                    <a href=\"/\"><i class=\"now-ui-icons travel_info\"></i> About Us</a>
                                </li>
                                <li class=\"fac_desk\">
                                    <a href=\"/\"> <i class=\"fa fa-send\"></i> Facilitation Desk</a>
                                    <div class=\"fac_desk_item\">
                                        <span class=\"text-left\"><b>General:</b></span><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">failitation@mptrifac.org</a><br>
                                        <span class=\"text-left\"><b>Country Desk:</b></span><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">Japan:  japandesk@mpgov.in</a><br>
                                        <a href=\"#\" class=\"text-left\" style=\"color: #d08346;\">Korea:  koreadesk@mpgov.in </a>
                                    </div>
                                </li>

                                <li>
                                    <a href=\"/faqs\"> <i class=\"fa fa-lightbulb-o\"></i> F.A.Q</a>
                                </li>
                            </ul>-->
                            <p class=\"white text-right\"> <i class=\"fa fa-phone\"></i> Helpdesk No: +91-755-2559971</p>
                        </div>
                    </div>
                </div>
            </div><!-- end col-md-6 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</div>   

<nav class=\"navbar navbar-default main_nav\"  data-spy=\"affix\" data-offset-top=\"197\">
  <div class=\"container-fluid\">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class=\"navbar-header\">
      <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
        <span class=\"sr-only\">Toggle navigation</span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
      </button>
      <a class=\"home_ico navbar-brand\" href=\"{{ url('<front>') }}\"><i class=\"fa fa-home\"></i> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
      <ul class=\"nav navbar-nav\">
          
        
        <li><a href=\"/about-us\">About</a></li>
          
          
        <li class=\"dropdown\">
          <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Ease of Doing Business <span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu\">
            <li><a href=\"/list-of-pre-establishment-state-approvals\" title=\"List of Pre Establishment State Approvals / Permissions you may require to start a business / industry\">List of Pre Establishment State Approvals</a></li>
            <li><a href=\"/list-of-pre-operations-state-approvals\" title=\"List of Pre-Operations State Approvals / Permissions you may require to start a business / industry\">List of Pre-Operations State Approvals</a></li>
            <li><a href=\"{{ url('<front>') }}backoffice/index.php?r=wizard/service\" title=\"Online Query for State Approvals /Permissions you may require to start a business / industry\">Online Query for State Approvals</a></li>
          </ul>
        </li>
          
          
          
        <li class=\"dropdown\">
          <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Advantage in MP <span class=\"caret\"></span></a>
           <ul class=\"dropdown-menu\">
\t\t\t\t<li><a href=\"/advantage-mp/mp-at-glance\">MP at a Glance</a></li>
\t\t\t\t<li><a href=\"/advantagemp/VISION_2018_ENGLISH.pdf\" target=\"_Blank\">MP Vision 2018</a></li>
\t\t\t\t<li><a href=\"/advantage-mp/industrial-scenario\">Industrial Scenario of MP</a></li>
\t\t\t\t<li><a href=\"/advantage-mp/profiles-of-potential-sector\">Profiles of Potential Sector</a></li>
\t\t\t\t<li><a href=\"/advantage-mp/incentives-and-concessions\">Incentives and Concessions</a></li>
\t\t\t\t<li><a href=\"/advantage-mp/investment-facilitation\">Investment Facilitation</a></li>
\t\t\t\t<li><a href=\"/advantage-mp/investors-information\">Investors Information</a></li>
\t\t\t</ul>
        </li>
        
        <li> <a href=\"/policy_act&rules\">Policy Act & Rules</a> </li>
          
        <li class=\"dropdown\">
          <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">User Manual<span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu\">
            <li><a href=\"/citizencharter/citizencharter.pdf\" target=\"_Blank\">Citizen Charter</a></li>
            <li><a href=\"/usermanuals/swsportal.pdf\" target=\"_Blank\">SWS Portal</a></li>
\t\t\t<li><a href=\"/usermanuals/akvnwater.pdf\" target=\"_Blank\">AKVN Water</a></li>
\t\t\t<li><a href=\"/usermanual/boilerregistration.pdf\" target=\"_Blank\">Boiler Registration</a></li>
\t\t\t<li><a href=\"/usermanual/boilerinspection.pdf\" target=\"_Blank\">Boiler Inspection</a></li> 
          </ul>
        </li>
          
          
      </ul>
        
      <ul class=\"nav navbar-nav navbar-right\">
        <!--<li><a href=\"#\" class=\"loginbtn white\">Dashboard</a></li> -->
        <li class=\"dropdown\">
          <a href=\"#\" class=\"dropdown-toggle loginbtn white\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"><i class=\"fa fa-user-plus\"></i>&nbsp;&nbsp;Login <span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu\">
            <li><a href=\"/backoffice/index.php?r=site/login\">As an Investor</a></li>
            <li><a href=\"/backoffice/index.php?r=site/login\">Department User</a></li>
            <li role=\"separator\" class=\"divider\"></li>
            <li><a href=\"/backoffice/index.php?r=investor/register\">Signup</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- End navigation -->   

    {{ page }}
\t
\t<div>&nbsp;<br>&nbsp;<br></div>\t\t

      <footer class=\"footer-minimal\">
        <div class=\" \">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-4 footer-left\">
                        <h4 class=\"white\">ABOUT US</h4>
                        <div class=\"h-devider\"></div>
                        <hr class=\"space s\">
                        <img src=\"/{{ directory }}/images/logos/newlogo.png\" alt=\"logo\">
                        <hr class=\"space s\">
                        <p style=\"font-size: 12px\">
                            
Madhya Pradesh Trade & Investment Facilitation Corporation Limited (TRIFAC) formerly known as Madhya Pradesh Export Corporation Limited, is a Company established under Companies Act 1956 and Wholly owned by Government of Madhya Pradesh...<a href=\"about_us.html\">more</a>
                        </p>
                    </div>
                    <div class=\"col-md-4 footer-left\">
                        <h4 class=\"white\">CONTACTS</h4>
                        <div class=\"h-devider\"></div>
                        <hr class=\"space s\">
                        <ul class=\"fa-ul\">
                            <li><i class=\"fa-li im-map-marker2\"></i> \"CEDMAP BHAWAN\" 16-A, Arera Hills Bhopal - 462001, M.P(India)</li>
                            <li><i class=\"fa-li im-cloud-smartphone\"></i> +91-755-2575618, 2571830<br>+91-755-2559973</li>                 <li><i class=\"fa-li im-speach-bubble12\"></i> facilitation@mptrifac.org</li>
                            <li><i class=\"fa-li im-phone\"></i>Helpdesk : +91-755-2559971 (10:30 AM to 05:30 PM)</li>
                        </ul>
                        <div class=\"btn-group navbar-social\">
                            <div class=\"btn-group social-group\">
                                <a target=\"_blank\" href=\"#\"><i class=\"fa fa-facebook\"></i></a>
                                <a target=\"_blank\" href=\"#\"><i class=\"fa fa-twitter\"></i></a>
                                <a target=\"_blank\" href=\"#\"><i class=\"fa fa-instagram\"></i></a>
                                <a target=\"_blank\" href=\"#\"><i class=\"fa fa-youtube\"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-4\">
                        <h4 class=\"white\">INFOMATIONS</h4>
                        <div class=\"h-devider\"></div>
                        <hr class=\"space s\">
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <ul class=\"fa-ul\">
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Home</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Company</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Certifications</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Company</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Core Values</a></li>
                                </ul>
                            </div>
                            <div class=\"col-md-6\">
                                <ul class=\"fa-ul\">
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"/faqs\">Faq</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Manuals</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Locations</a></li>
                                    <li><i class=\"fa-li im-right-3\"></i> <a href=\"#\">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"copyright\">
          <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                  <p class=\"white text-center\">© 2017 M.P. Trade and Investment Facilitation Corporation Limited. &nbsp; <span class=\"pull-right\"> &nbsp; Designed by <a href=\"#\">E&Y</a></span> </p>
                </div>
            </div>      
          </div>
        </div>
    </footer> 
    
    
    <!-- use this for popup-->
    <style>
#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
  border-radius: 15px;
  text-align: center;
}
#boxes #dialog {
  width:450px; 
  height:auto;
  padding:10px;
  background-color:#ffffff;
  font-family: 'Segoe UI Light', sans-serif;
  font-size: 15pt;
}
.maintext{
    text-align: center;
  font-family: \"Segoe UI\", sans-serif;
  text-decoration: none;
}
body{
  background: url('bg.jpg');
}
#lorem{
\tfont-family: \"Segoe UI\", sans-serif;
\tfont-size: 12pt;
  text-align: left;
}
#popupfoot{
\tfont-family: \"Segoe UI\", sans-serif;
\tfont-size: 16pt;
  padding: 10px 20px;
}

    </style>
<!--

<div id=\"boxes\">
  <div style=\"top: 199.5px; left: 551.5px; display: none;\" id=\"dialog\" class=\"window\">Welcomes to
    <div id=\"lorem\">
      <p> Madhya Pradesh Trade & Investment Facilitation Corporation Limited </p>
    </div>
      
      <div class=\"pull-right\">
          <button class=\"btn btn-primary\">Ragister Now</button>
          
          <button class=\"btn btn-info\">Skip</button>
      </div>
  </div>
  <div style=\"width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;\" id=\"mask\"></div>
</div>
-->
    {{ page_bottom }}

    <js-bottom-placeholder token=\"{{ placeholder_token|raw }}\">
  </body>
</html>
";
    }
}
