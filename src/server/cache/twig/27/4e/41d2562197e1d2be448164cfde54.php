<?php

/* login.html */
class __TwigTemplate_274e41d2562197e1d2be448164cfde54 extends Twig_Template
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
        echo "<h1>T411 : Connexion</h1>

<p>Connexion requise.</p>

<form method=\"post\">
    user : <input type=\"text\" name=\"user\" /> 
    pass : <input type=\"password\" name=\"pass\" /> <input type=\"submit\" value=\"Connexion\" />
</form>";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
