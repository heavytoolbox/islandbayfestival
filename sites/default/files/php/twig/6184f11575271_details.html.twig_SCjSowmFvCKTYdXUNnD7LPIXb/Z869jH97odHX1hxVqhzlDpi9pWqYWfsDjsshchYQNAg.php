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

/* themes/contrib/bootstrap5/templates/form/details.html.twig */
class __TwigTemplate_a83026fc9bbfa9088e3e39d73cdb257ee80cb2624b98d69b7f8f3d3bfcf84684 extends \Twig\Template
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
        // line 18
        $context["collapseId"] = ($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "id", [], "any", false, false, true, 18), 18, $this->source) . "-collapse");
        // line 19
        $context["headingId"] = ($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "id", [], "any", false, false, true, 19), 19, $this->source) . "-heading");
        // line 20
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => "accordion"], "method", false, false, true, 20), 20, $this->source), "html", null, true);
        echo ">
  <div class=\"accordion-item\">";
        // line 22
        if (($context["title"] ?? null)) {
            // line 23
            $context["summary_classes"] = [0 => "accordion-button", 1 => (( !twig_get_attribute($this->env, $this->source,             // line 25
($context["attributes"] ?? null), "open", [], "any", false, false, true, 25)) ? ("collapsed") : ("")), 2 => ((            // line 26
($context["required"] ?? null)) ? ("js-form-required") : ("")), 3 => ((            // line 27
($context["required"] ?? null)) ? ("form-required") : (""))];
            // line 29
            echo "      <h2 class=\"accordion-header\" id=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["headingId"] ?? null), 29, $this->source), "html", null, true);
            echo "\">
        <button ";
            // line 30
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["summary_attributes"] ?? null), "addClass", [0 => ($context["summary_classes"] ?? null)], "method", false, false, true, 30), 30, $this->source), "html", null, true);
            echo " type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["collapseId"] ?? null), 30, $this->source), "html", null, true);
            echo "\"
                aria-controls=\"";
            // line 31
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["collapseId"] ?? null), 31, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 31, $this->source), "html", null, true);
            echo "</button>
      </h2>";
        }
        // line 34
        echo "<div id=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["collapseId"] ?? null), 34, $this->source), "html", null, true);
        echo "\" class=\"accordion-collapse collapse ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "open", [], "any", false, false, true, 34)) ? ("show") : ("")));
        echo "\" aria-labelledby=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["headingId"] ?? null), 34, $this->source), "html", null, true);
        echo "\">
      <div class=\"accordion-body\">
        ";
        // line 36
        if (($context["errors"] ?? null)) {
            // line 37
            echo "          <div class=\"alert alert-danger\" role=\"alert\">
            <strong>";
            // line 38
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 38, $this->source), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 41
        if (($context["description"] ?? null)) {
            // line 42
            echo "<div class=\"alert alert-info\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 42, $this->source), "html", null, true);
            echo "</div>";
        }
        // line 44
        if (($context["children"] ?? null)) {
            // line 45
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 45, $this->source), "html", null, true);
        }
        // line 47
        if (($context["value"] ?? null)) {
            // line 48
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["value"] ?? null), 48, $this->source), "html", null, true);
        }
        // line 50
        echo "</div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap5/templates/form/details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 50,  108 => 48,  106 => 47,  103 => 45,  101 => 44,  96 => 42,  94 => 41,  88 => 38,  85 => 37,  83 => 36,  73 => 34,  66 => 31,  60 => 30,  55 => 29,  53 => 27,  52 => 26,  51 => 25,  50 => 23,  48 => 22,  43 => 20,  41 => 19,  39 => 18,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/bootstrap5/templates/form/details.html.twig", "/var/www/html/letterbox/themes/contrib/bootstrap5/templates/form/details.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 18, "if" => 22);
        static $filters = array("escape" => 20);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
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
