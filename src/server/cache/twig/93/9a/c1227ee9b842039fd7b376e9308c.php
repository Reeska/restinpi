<?php

/* index.html */
class __TwigTemplate_939ac1227ee9b842039fd7b376e9308c extends Twig_Template
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
        echo "<div id=\"tabs\">
    <span class=\"selected\" data-target=\"conky\">Conky</span><span data-target=\"shell-form\">Shell</span>
</div>
<div id=\"shell\">
    <h1>REST in PI</h1>
\t<div id=\"conky\" class=\"tab\">\t
\t\t<!-- <div class=\"toggle\">&uarr;</div> -->
\t\t<div class=\"togglable\">
\t\t\t<div id=\"actions\">
                ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "contents", array(0 => "action"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 11
            echo "                ";
            echo (isset($context["action"]) ? $context["action"] : null);
            echo "
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "\t\t\t</div>
\t\t\t<div>
\t\t\t\t<h3>Infos</h3>
                ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "contents", array(0 => "info"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 17
            echo "                <p>";
            echo nl2br((isset($context["action"]) ? $context["action"] : null));
            echo "</p>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "                
\t\t\t</div>
            
\t\t\t<div>
\t\t\t\t<h3>Pages</h3>
\t\t\t    <ul>
                    ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "pages"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 25
            echo "                    <li>";
            echo (isset($context["p"]) ? $context["p"] : null);
            echo "</li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "                         
\t\t\t\t</ul>
\t\t\t</div>                    
\t\t\t
\t\t\t<div id=\"services\">
\t\t\t\t<h3>Services</h3>
\t\t\t    <ul>
                    ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["services"]) ? $context["services"] : null), "services"));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 34
            echo "                    <li>
                        <span class=\"status ";
            // line 35
            echo (($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "cmd")) ? ("") : ("disabled"));
            echo "\">
                        <input type=\"checkbox\" name=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "name"), "html", null, true);
            echo "\" class=\"switch-button\" ";
            echo (($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "enabled")) ? ("checked=\"checked\"") : (""));
            echo " ";
            echo (($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "cmd")) ? ("") : ("disabled=\"disabled\""));
            echo " />
                        </span>
                        ";
            // line 38
            if ((!twig_test_empty($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "url")))) {
                // line 39
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "url"), "html", null, true);
                echo "\">
                        ";
            }
            // line 41
            echo "                        
                        ";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "name"), "html", null, true);
            echo " 
                        
                        ";
            // line 44
            if ((!twig_test_empty($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "url")))) {
                // line 45
                echo "                        &raquo;
                        </a>
                        ";
            }
            // line 48
            echo "                    </li>                    
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t</div>
    
\t<form id=\"shell-form\" class=\"tab\">
\t\t<div id=\"shell-result\"></div>
\t\t<div id=\"shell-prompt\">
\t\t\t<div class=\"write\"><span class=\"prompt success\">[0] pi@raspberrypi:</span> <input type=\"text\" name=\"cmd\" /></div>
\t\t\t<div class=\"cur\"></div>
\t\t</div>\t\t\t
\t</form>\t\t\t\t
</div>";
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
        return array (  141 => 50,  134 => 48,  129 => 45,  127 => 44,  122 => 42,  119 => 41,  113 => 39,  111 => 38,  102 => 36,  98 => 35,  95 => 34,  91 => 33,  82 => 26,  73 => 25,  69 => 24,  61 => 18,  52 => 17,  48 => 16,  43 => 13,  34 => 11,  30 => 10,  19 => 1,);
    }
}
