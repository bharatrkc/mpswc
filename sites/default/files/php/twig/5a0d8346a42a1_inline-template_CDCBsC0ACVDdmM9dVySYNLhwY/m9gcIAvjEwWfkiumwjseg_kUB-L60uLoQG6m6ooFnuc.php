<?php

/* {# inline_template_start #}<a href="services-detail/{{ nid }} " hreflang="en" class="use-ajax clklink" data-dialog-type="colorbox" data-dialog-options="{"width":800,"dialogClass":""}">Click for details</a> */
class __TwigTemplate_5f2a80ba0b29b86d7c2a6f339338e79c7ae8d59fa38d97b1067eaac304c3da5c extends Twig_Template
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
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
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
        echo "<a href=\"services-detail/";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["nid"]) ? $context["nid"] : null), "html", null, true));
        echo " \" hreflang=\"en\" class=\"use-ajax clklink\" data-dialog-type=\"colorbox\" data-dialog-options=\"{\"width\":800,\"dialogClass\":\"\"}\">Click for details</a>";
    }

    public function getTemplateName()
    {
        return "{# inline_template_start #}<a href=\"services-detail/{{ nid }} \" hreflang=\"en\" class=\"use-ajax clklink\" data-dialog-type=\"colorbox\" data-dialog-options=\"{\"width\":800,\"dialogClass\":\"\"}\">Click for details</a>";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSource()
    {
        return "{# inline_template_start #}<a href=\"services-detail/{{ nid }} \" hreflang=\"en\" class=\"use-ajax clklink\" data-dialog-type=\"colorbox\" data-dialog-options=\"{\"width\":800,\"dialogClass\":\"\"}\">Click for details</a>";
    }
}
