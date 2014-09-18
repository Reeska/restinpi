<?php

/* global/footer.html */
class __TwigTemplate_654a9cf71720182c49fee31b5d03b6b9 extends Twig_Template
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
        echo "    <footer>
        Time : ";
        // line 2
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (microtime(true) - twig_constant("TIME_BEGIN")), 2), "html", null, true);
        echo " ms
    </footer>
</body>


</html>";
    }

    public function getTemplateName()
    {
        return "global/footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  116 => 40,  98 => 35,  95 => 34,  91 => 33,  82 => 26,  73 => 25,  69 => 24,  61 => 18,  52 => 17,  48 => 16,  43 => 13,  30 => 10,  102 => 36,  97 => 33,  88 => 31,  84 => 30,  81 => 29,  79 => 28,  71 => 22,  62 => 20,  58 => 19,  47 => 10,  38 => 9,  34 => 11,  29 => 6,  25 => 5,  19 => 1,);
    }
}
