<?php

/* index.html */
class __TwigTemplate_d3f76dcda7438a4a8ff71346c6cd7ddc extends Twig_Template
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
        // line 1
        echo "<h1>Modules Manager</h2>

<form method=\"post\" enctype=\"multipart/form-data\">
    Install : <input type=\"file\" name=\"package\" /> <input type=\"submit\" name=\"\" value=\"Upload\" />
</form>

<table>
    <tr>
        <th>Module</th>
    </tr>
    
    ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mods"]) ? $context["mods"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 13
            echo "    <tr>
        <td>";
            // line 14
            echo twig_escape_filter($this->env, (isset($context["m"]) ? $context["m"] : null), "html", null, true);
            echo "</td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "</table>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 17,  39 => 14,  36 => 13,  32 => 12,  19 => 1,);
    }
}
