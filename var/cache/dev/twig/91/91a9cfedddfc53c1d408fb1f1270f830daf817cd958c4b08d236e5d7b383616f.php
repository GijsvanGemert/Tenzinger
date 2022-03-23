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

/* weergave_reisgegevens/index.html.twig */
class __TwigTemplate_aa3609996a531feed372a9e7e4970dca122b854b4f9e651e3fae42151e99404b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "weergave_reisgegevens/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "weergave_reisgegevens/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "weergave_reisgegevens/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "<h2>Reisgegevens</h2>
";
        // line 5
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["makeForm"]) || array_key_exists("makeForm", $context) ? $context["makeForm"] : (function () { throw new RuntimeError('Variable "makeForm" does not exist.', 5, $this->source); })()), 'form');
        echo "
<table class=\"table table-striped\">

    <thead>
        <tr>\t\t\t\t
            <td>werknemer</td>
            ";
        // line 12
        echo "            <td>afstand</td>
            <td>vervoersmiddel</td>
            ";
        // line 14
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["reisgegevens"] ?? null), 0, [], "array", false, true, false, 14), "month", [], "any", true, true, false, 14)) {
            // line 15
            echo "            <td>jaar</td>
            <td>maand</td>
            ";
        } else {
            // line 18
            echo "            <td>datum</td>
            <td>heen</td>
             ";
        }
        // line 20
        echo "       
            <td>compensatie</td>
        </tr>
    </thead>
    <tbody>
        ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["reisgegevens"]) || array_key_exists("reisgegevens", $context) ? $context["reisgegevens"] : (function () { throw new RuntimeError('Variable "reisgegevens" does not exist.', 25, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["gegevens"]) {
            // line 26
            echo "        <tr>\t\t\t\t
            <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["gegevens"], "werknemerId", [], "any", false, false, false, 27), "html", null, true);
            echo "</td>
            ";
            // line 29
            echo "            <td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["gegevens"], "afstand", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
            <td>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["gegevens"], "vervoersmiddel", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
            ";
            // line 31
            if (twig_get_attribute($this->env, $this->source, $context["gegevens"], "month", [], "any", true, true, false, 31)) {
                // line 32
                echo "                <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["gegevens"], "year", [], "any", false, false, false, 32), "html", null, true);
                echo "</td>
                <td>";
                // line 33
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["gegevens"], "month", [], "any", false, false, false, 33), (("2012-" . twig_get_attribute($this->env, $this->source, $context["gegevens"], "month", [], "any", false, false, false, 33)) . "-01")), "M"), "html", null, true);
                echo "</td>
                ";
            } else {
                // line 35
                echo "                <td>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["gegevens"], "datum", [], "any", false, false, false, 35), "d-m-Y"), "html", null, true);
                echo "</td>
                <td>";
                // line 36
                if ((twig_get_attribute($this->env, $this->source, $context["gegevens"], "heen", [], "any", false, false, false, 36) == 1)) {
                    echo " Ja 
                ";
                } else {
                    // line 37
                    echo " Nee";
                }
                echo "</td>
                ";
            }
            // line 39
            echo "            <td>
             ";
            // line 40
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["reisgegevens"] ?? null), 0, [], "array", false, true, false, 40), "month", [], "any", true, true, false, 40)) {
                // line 41
                echo "                ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["gegevens"], "compensatie", [], "any", false, false, false, 41), "html", null, true);
                echo "
                ";
            } else {
                // line 42
                echo " 
                ";
                // line 43
                if ((twig_get_attribute($this->env, $this->source, $context["gegevens"], "vervoersmiddel", [], "any", false, false, false, 43) == "fiets")) {
                    echo " 
                
                
                ";
                    // line 46
                    if ((twig_get_attribute($this->env, $this->source, $context["gegevens"], "afstand", [], "any", false, false, false, 46) > 5)) {
                        echo "  ";
                        echo twig_escape_filter($this->env, (1.0 * twig_get_attribute($this->env, $this->source, $context["gegevens"], "afstand", [], "any", false, false, false, 46)), "html", null, true);
                        echo " 
                ";
                    } else {
                        // line 47
                        echo "  ";
                        echo twig_escape_filter($this->env, (0.5 * twig_get_attribute($this->env, $this->source, $context["gegevens"], "afstand", [], "any", false, false, false, 47)), "html", null, true);
                        echo "
                
                ";
                    }
                    // line 50
                    echo "                ";
                } elseif (((twig_get_attribute($this->env, $this->source, $context["gegevens"], "vervoersmiddel", [], "any", false, false, false, 50) == "bus") || (twig_get_attribute($this->env, $this->source, $context["gegevens"], "vervoersmiddel", [], "any", false, false, false, 50) == "train"))) {
                    echo " 
                ";
                    // line 51
                    echo twig_escape_filter($this->env, (0.25 * twig_get_attribute($this->env, $this->source, $context["gegevens"], "afstand", [], "any", false, false, false, 51)), "html", null, true);
                    echo " 
                ";
                } else {
                    // line 53
                    echo "                ";
                    echo twig_escape_filter($this->env, (0.1 * twig_get_attribute($this->env, $this->source, $context["gegevens"], "afstand", [], "any", false, false, false, 53)), "html", null, true);
                    echo " 
                ";
                }
                // line 55
                echo "                ";
            }
            echo "</td>
             
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gegevens'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "    </tbody>
</table>
";
        // line 61
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["reisgegevens"] ?? null), 0, [], "array", false, true, false, 61), "month", [], "any", true, true, false, 61)) {
            // line 62
            echo "<a href=\"/tenzinger/public/index.php/weergave/download\" class=\"button\">Download data</a> 
";
        } else {
            // line 64
            echo "<a href=\"/tenzinger/public/index.php/weergave/groupby\" class=\"button\">Group Data</a> 
 ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "weergave_reisgegevens/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 64,  218 => 62,  216 => 61,  212 => 59,  201 => 55,  195 => 53,  190 => 51,  185 => 50,  178 => 47,  171 => 46,  165 => 43,  162 => 42,  156 => 41,  154 => 40,  151 => 39,  145 => 37,  140 => 36,  135 => 35,  130 => 33,  125 => 32,  123 => 31,  119 => 30,  114 => 29,  110 => 27,  107 => 26,  103 => 25,  96 => 20,  91 => 18,  86 => 15,  84 => 14,  80 => 12,  71 => 5,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}
<h2>Reisgegevens</h2>
{{form(makeForm)}}
<table class=\"table table-striped\">

    <thead>
        <tr>\t\t\t\t
            <td>werknemer</td>
            {#<<td>id</td>#}
            <td>afstand</td>
            <td>vervoersmiddel</td>
            {% if reisgegevens[0].month is defined %}
            <td>jaar</td>
            <td>maand</td>
            {% else %}
            <td>datum</td>
            <td>heen</td>
             {% endif %}       
            <td>compensatie</td>
        </tr>
    </thead>
    <tbody>
        {% for gegevens in reisgegevens %}
        <tr>\t\t\t\t
            <td>{{gegevens.werknemerId}}</td>
            {#<td>{{gegevens.id}}</td>#}
            <td>{{gegevens.afstand}}</td>
            <td>{{gegevens.vervoersmiddel}}</td>
            {% if gegevens.month is defined %}
                <td>{{gegevens.year }}</td>
                <td>{{gegevens.month |date('2012-' ~ gegevens.month ~ '-01') |date('M') }}</td>
                {% else %}
                <td>{{gegevens.datum|date('d-m-Y')}}</td>
                <td>{% if gegevens.heen == 1%} Ja 
                {% else %} Nee{% endif %}</td>
                {% endif %}
            <td>
             {% if reisgegevens[0].month is defined %}
                {{gegevens.compensatie}}
                {% else %} 
                {% if gegevens.vervoersmiddel == \"fiets\"%} 
                
                
                {% if gegevens.afstand > 5 %}  {{1.00 * gegevens.afstand}} 
                {% else %}  {{0.5 * gegevens.afstand}}
                
                {% endif %}
                {% elseif gegevens.vervoersmiddel == \"bus\" or gegevens.vervoersmiddel == \"train\"%} 
                {{0.25 * gegevens.afstand}} 
                {% else %}
                {{0.1 * gegevens.afstand}} 
                {% endif %}
                {% endif %}</td>
             
        </tr>
        {% endfor %}
    </tbody>
</table>
{% if reisgegevens[0].month is defined %}
<a href=\"/tenzinger/public/index.php/weergave/download\" class=\"button\">Download data</a> 
{% else %}
<a href=\"/tenzinger/public/index.php/weergave/groupby\" class=\"button\">Group Data</a> 
 {% endif %}
{% endblock %}
", "weergave_reisgegevens/index.html.twig", "/Applications/MAMP/htdocs/Tenzinger/templates/weergave_reisgegevens/index.html.twig");
    }
}
