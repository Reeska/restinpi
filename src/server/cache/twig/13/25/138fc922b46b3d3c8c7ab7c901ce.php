<?php

/* global/header.html */
class __TwigTemplate_1325138fc922b46b3d3c8c7ab7c901ce extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
    <head>
    \t<title>REST in PI</title>
        <base href=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_constant("BASEURL"), "html", null, true);
        echo "/\"/>
\t\t<link rel=\"shortcut icon\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["favicon"]) ? $context["favicon"] : null), "html", null, true);
        echo "\" />
        
        ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["css"]) ? $context["css"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 9
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["c"]) ? $context["c"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "     
        
        <script src=\"assets/j/jquery.min.js\"></script>
        <script src=\"assets/j/jquery-ui/ui/minified/jquery-ui.min.js\"></script>
        <script src=\"assets/j/jquery-ui/ui/jquery.switchButton.js\"></script>
        
        <link href=\"assets/j/jquery-ui/themes/base/jquery-ui.css\" rel=\"stylesheet\"/>
        <link href=\"assets/j/jquery-ui/themes/base/jquery.switchButton.css\" rel=\"stylesheet\"/>
        
        ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["js"]) ? $context["js"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 20
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["c"]) ? $context["c"] : null), "html", null, true);
            echo "\"></script>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t</head>

\t<body>  
        ";
        // line 28
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "notices")) {
            // line 29
            echo "        <div id=\"notices\">
            ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "notices"));
            foreach ($context['_seq'] as $context["_key"] => $context["notice"]) {
                // line 31
                echo "            <p>";
                echo twig_escape_filter($this->env, (isset($context["notice"]) ? $context["notice"] : null), "html", null, true);
                echo "</p>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notice'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "            <div class=\"close\">X</div>
        </div>
        ";
        }
        // line 36
        echo "    
        <div id=\"menu\">
        
        </div>";
    }

    public function getTemplateName()
    {
        return "global/header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 36,  97 => 33,  88 => 31,  84 => 30,  81 => 29,  79 => 28,  71 => 22,  62 => 20,  58 => 19,  47 => 10,  38 => 9,  34 => 8,  29 => 6,  25 => 5,  19 => 1,);
    }
}
