<?php

/* themes/mpinvestnew/templates/page.html.twig */
class __TwigTemplate_4381bf56bf54bf9b887544db3e2d8de35346ea7980a38592d77e63911ff796b7 extends Twig_Template
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
        $tags = array("if" => 11, "set" => 79);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'set'),
                array(),
                array()
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

        // line 1
        echo "<div role=\"main\" class=\"main\">

<!-- breadcrumb 

<div class=\"brdcm_bs\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-9\">
                    <div class=\"brdcm_bs_title text-left\">
 
\t\t\t\t\t\t";
        // line 11
        if ($this->getAttribute($this->getAttribute((isset($context["node"]) ? $context["node"] : null), "title", array()), "value", array())) {
            // line 12
            echo "\t\t\t\t\t  <h2>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute((isset($context["node"]) ? $context["node"] : null), "title", array()), "value", array()), "html", null, true));
            echo "</h2>
\t\t\t\t\t\t";
        } elseif ($this->getAttribute(        // line 13
(isset($context["page"]) ? $context["page"] : null), "#title", array(), "array")) {
            // line 14
            echo " \t\t\t\t\t  <h2>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "#title", array(), "array"), "html", null, true));
            echo "</h2>
\t\t\t\t\t\t";
        }
        // line 16
        echo "\t\t\t\t\t\t
                        <div class=\"h-devider\"></div>

                    </div>
                </div>
                <div class=\"col-md-3\">
            <ol class=\"breadcrumb\">
                        <li><a href=\"index.html\">Home</a></li>
                        <li class=\"active\">About us</li>
                    </ol>
                </div>
            </div>
        </div>
</div>
 breadcrumb --> 
\t
<!--\t\t\t<section class=\"page-header\">
\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t 
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t<!-- <h1>Left Sidebar</h1> 
\t\t\t\t\t\t\t\t";
        // line 38
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_title", array()), "html", null, true));
        echo " 
\t\t\t\t\t\t\t\t<div class=\"h-devider\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</section> -->

\t\t\t\t

\t\t\t\t  ";
        // line 47
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array())) {
            // line 48
            echo "\t\t\t\t\t<div id=\"highlighted-block\">
\t\t\t\t\t  <div class=\"container\">
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t  <div class=\"col-sm-12\">
\t\t\t\t\t\t\t";
            // line 52
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array()), "html", null, true));
            echo "
\t\t\t\t\t\t  </div>
\t\t\t\t\t\t</div>
\t\t\t\t\t  </div>
\t\t\t\t\t</div>
\t\t\t\t  ";
        }
        // line 58
        echo "
\t\t\t\t<div class=\"container\">

\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 63
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array())) {
            // line 64
            echo "\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t<aside class=\"sidebar\">
\t\t\t\t\t\t\t\t\t\t";
            // line 66
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array()), "html", null, true));
            echo " 

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
            // line 69
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "secondary_menu", array()), "html", null, true));
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 70
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array()), "html", null, true));
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 71
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "primary_menu", array()), "html", null, true));
            echo "
\t\t\t\t\t\t\t\t</aside>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t   ";
        }
        // line 74
        echo " 


\t\t\t\t\t\t 
\t\t\t\t\t\t";
        // line 78
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array())) {
            // line 79
            echo "\t\t\t\t\t\t  ";
            $context["primary_col"] = 9;
            // line 80
            echo "\t\t\t\t\t\t";
        } else {
            // line 81
            echo "\t\t\t\t\t\t  ";
            $context["primary_col"] = 12;
            // line 82
            echo "\t\t\t\t\t\t";
        }
        // line 83
        echo "\t\t\t\t\t\t<div class=\"";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, ("content-area col-sm-" . (isset($context["primary_col"]) ? $context["primary_col"] : null)), "html", null, true));
        echo "\"> 

\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t";
        // line 86
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_top", array())) {
            // line 87
            echo "\t\t\t\t\t\t\t\t\t  <div id=\"content_top\">
\t\t\t\t\t\t\t\t\t\t";
            // line 88
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_top", array()), "html", null, true));
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 89
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["messages"]) ? $context["messages"] : null), "html", null, true));
            echo "
\t\t\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t\t\t";
        }
        // line 92
        echo "\t\t\t\t\t\t\t\t\t<div id=\"content-wrap\">
\t\t\t\t\t\t\t\t\t  ";
        // line 93
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array()), "html", null, true));
        echo "
\t\t\t\t\t\t\t\t\t  ";
        // line 94
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true));
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div> 

\t\t\t\t\t\t</div>

\t\t\t\t\t</div>

\t\t\t\t</div>

\t\t\t</div>

 
";
    }

    public function getTemplateName()
    {
        return "themes/mpinvestnew/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 94,  202 => 93,  199 => 92,  193 => 89,  189 => 88,  186 => 87,  184 => 86,  177 => 83,  174 => 82,  171 => 81,  168 => 80,  165 => 79,  163 => 78,  157 => 74,  150 => 71,  146 => 70,  142 => 69,  136 => 66,  132 => 64,  130 => 63,  123 => 58,  114 => 52,  108 => 48,  106 => 47,  94 => 38,  70 => 16,  64 => 14,  62 => 13,  57 => 12,  55 => 11,  43 => 1,);
    }

    public function getSource()
    {
        return "<div role=\"main\" class=\"main\">

<!-- breadcrumb 

<div class=\"brdcm_bs\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-9\">
                    <div class=\"brdcm_bs_title text-left\">
 
\t\t\t\t\t\t{% if node.title.value %}
\t\t\t\t\t  <h2>{{ node.title.value }}</h2>
\t\t\t\t\t\t{% elseif page['#title'] %}
 \t\t\t\t\t  <h2>{{ page['#title'] }}</h2>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t
                        <div class=\"h-devider\"></div>

                    </div>
                </div>
                <div class=\"col-md-3\">
            <ol class=\"breadcrumb\">
                        <li><a href=\"index.html\">Home</a></li>
                        <li class=\"active\">About us</li>
                    </ol>
                </div>
            </div>
        </div>
</div>
 breadcrumb --> 
\t
<!--\t\t\t<section class=\"page-header\">
\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t 
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t<!-- <h1>Left Sidebar</h1> 
\t\t\t\t\t\t\t\t{{ page.content_title }} 
\t\t\t\t\t\t\t\t<div class=\"h-devider\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</section> -->

\t\t\t\t

\t\t\t\t  {% if page.highlighted %}
\t\t\t\t\t<div id=\"highlighted-block\">
\t\t\t\t\t  <div class=\"container\">
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t  <div class=\"col-sm-12\">
\t\t\t\t\t\t\t{{ page.highlighted }}
\t\t\t\t\t\t  </div>
\t\t\t\t\t\t</div>
\t\t\t\t\t  </div>
\t\t\t\t\t</div>
\t\t\t\t  {% endif %}

\t\t\t\t<div class=\"container\">

\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t
\t\t\t\t\t\t{% if page.sidebar_first %}
\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t<aside class=\"sidebar\">
\t\t\t\t\t\t\t\t\t\t{{ page.sidebar_first }} 

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{{ page.secondary_menu }}
\t\t\t\t\t\t\t\t\t\t{{ page.header }}
\t\t\t\t\t\t\t\t\t\t{{ page.primary_menu }}
\t\t\t\t\t\t\t\t</aside>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t   {% endif %} 


\t\t\t\t\t\t 
\t\t\t\t\t\t{% if page.sidebar_first %}
\t\t\t\t\t\t  {% set primary_col = 9 %}
\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t  {% set primary_col = 12 %}
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t<div class=\"{{ 'content-area col-sm-' ~ primary_col }}\"> 

\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t{% if page.content_top %}
\t\t\t\t\t\t\t\t\t  <div id=\"content_top\">
\t\t\t\t\t\t\t\t\t\t{{ page.content_top }}
\t\t\t\t\t\t\t\t\t\t{{ messages }}
\t\t\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t<div id=\"content-wrap\">
\t\t\t\t\t\t\t\t\t  {{ page.help }}
\t\t\t\t\t\t\t\t\t  {{ page.content }}
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div> 

\t\t\t\t\t\t</div>

\t\t\t\t\t</div>

\t\t\t\t</div>

\t\t\t</div>

 
";
    }
}
