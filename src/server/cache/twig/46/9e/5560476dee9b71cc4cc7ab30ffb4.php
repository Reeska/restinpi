<?php

/* beta.html */
class __TwigTemplate_469e5560476dee9b71cc4cc7ab30ffb4 extends Twig_Template
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
        echo "<!doctype html>
<html ng-app=\"app\">
  <head>
    <script src=\"https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-rc.1/angular.min.js\"></script>
    <link rel=\"stylesheet\" href=\"//netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap-combined.min.css\">
  
\t<script>
\t\tangular.module('mycomp', [/* dependencies */])
\t\t.directive('tutu', function() {
\t\t\treturn {
\t\t\t\ttransclude: true,
\t\t\t\ttemplate: '<div class=\"tutu ";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
        echo "\" ng-transclude ng-click=\"touched()\"></div>',
\t\t\t\treplace: true,
\t\t\t\tscope: {p : '@'},
\t\t\t\tlink: function(\$scope) {
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t},
\t\t\t\tcontroller: function(\$scope) {
\t\t\t\t\t\$scope.touched = function() {
\t\t\t\t\t\tconsole.log('Tutu touched');
\t\t\t\t\t};
\t\t\t\t}
\t\t\t}
\t\t});
\t\t
\t\tangular.module('app', ['mycomp'])
\t\t.controller('SuperCtrl', function(\$scope) {
\t\t\t\$scope.name = \"Blah\";
\t\t\t\$scope.props = { name : \"my name\" };
\t\t\t\$scope.clicked = function() {
\t\t\t\tconsole.log('Tutu clicked');
\t\t\t
\t\t\t\tvar sw = \$scope.props.name;
\t\t\t\t\$scope.props.name = \$scope.name;
\t\t\t\t\$scope.name = sw;
\t\t\t};\t\t\t
\t\t});
\t</script>
  </head>
  <body>
\t<tutu p=\"bla\">
\t\t<div ng-controller=\"SuperCtrl\" ng-click=\"clicked()\">
\t\t\tMy super content : ";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo ". ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["props"]) ? $context["props"] : null), "name"), "html", null, true);
        echo "
\t\t</div>
\t</tutu>
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "beta.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 44,  32 => 12,  19 => 1,);
    }
}
