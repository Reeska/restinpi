<?php

/* index.html */
class __TwigTemplate_da7ae354111135d2f46860f12602f8e3 extends Twig_Template
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
        echo "<form id=\"proxify\">
\tURL : <input type=\"text\" name=\"url\" placeholder=\"URL\" /> <input type=\"submit\" value=\"GO\" /> 
</form>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
