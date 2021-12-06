<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/contrib/rate/templates/rate-widgets-summary.html.twig */
class __TwigTemplate_23bb3158e35edb47509c03ac4ad18e1d7a679d2dbd3220ed4d879ce3dad55589 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["trans"] ?? null), 1, $this->source), "html", null, true);
        echo "
  ";
        // line 2
        if (((((twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "rate_count", [], "any", true, true, true, 2)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "rate_count", [], "any", false, false, true, 2))) : ("")) == 0) || twig_test_empty(((twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "rate_count", [], "any", true, true, true, 2)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "rate_count", [], "any", false, false, true, 2))) : (""))))) {
            // line 3
            echo "    No votes have been submitted yet.
  ";
        } else {
            // line 5
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "rate_count", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
            echo " votes with an average rating of ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "rate_average", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
            echo ".
  ";
        }
        // line 7
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["endtrans"] ?? null), 7, $this->source), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/rate/templates/rate-widgets-summary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 7,  49 => 5,  45 => 3,  43 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/rate/templates/rate-widgets-summary.html.twig", "/var/www/html/letterbox/modules/contrib/rate/templates/rate-widgets-summary.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2);
        static $filters = array("escape" => 1, "default" => 2);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'default'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
