<?php

/* search.html */
class __TwigTemplate_51ae72fb22fb1f5155406b152bb8cc3e extends Twig_Template
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
        echo "<div id=\"t411\">    
    ";
        // line 3
        echo "    
    <div id=\"header\">
        <div id=\"logo\"><a href=\"view/t411/\">T411</a></div>
    
        <div id=\"user\" class=\"topbox\">
            <strong class=\"username\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "username"), "html", null, true);
        echo "</strong>
             &darr; <strong class=\"down\">";
        // line 9
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ((($this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "downloaded") / 1024) / 1024) / 1024), 0), "html", null, true);
        echo " Gio</strong> 
             &uarr; <strong class=\"up\">";
        // line 10
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ((($this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "uploaded") / 1024) / 1024) / 1024), 0), "html", null, true);
        echo " Gio</strong> 
             % <strong class=\"ratio\">";
        // line 11
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "uploaded") / $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "downloaded")), 4), "html", null, true);
        echo "</strong> 
             # <strong class=\"api\">";
        // line 12
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["tor"]) ? $context["tor"] : null), "requests")), "html", null, true);
        echo "</strong>
             [ <a href=\"view/t411/login?logout\">logout</a> ]
        </div>
        
        <form id=\"search\" class=\"topbox\">
            <input type=\"text\" name=\"search\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "get"), "search"), "html", null, true);
        echo "\" placeholder=\"Rechercher\"  /> 
            Limit : <input type=\"text\" class=\"limit\" name=\"limit\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tor"]) ? $context["tor"] : null), "limit"), "html", null, true);
        echo "\" /> <input type=\"submit\" value=\"Search\" />     
        </form>
        
        <form id=\"transmission\" class=\"topbox\">
            Transmission : <input type=\"text\" name=\"torrent_dir\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "torrent_dir"), "html", null, true);
        echo "\" placeholder=\"Torrent directory\" /> <input type=\"submit\" value=\"Change\" /> 
        </form>
        
        <form id=\"top\" class=\"topbox\">
            Top : <input type=\"text\" name=\"top\" readonly=\"readonly\" maxlength=\"5\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array(), "any", false, true), "top", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array(), "any", false, true), "top"), "-")) : ("-")), "html", null, true);
        echo "\" />
            
            <input type=\"submit\" value=\"OK\" />   
            
            <div class=\"choose\">
                <ul>
                    ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => "100", 1 => "today", 2 => "week", 3 => "month"));
        foreach ($context['_seq'] as $context["_key"] => $context["top"]) {
            // line 33
            echo "                    <li class=\"ctop\" data-name=\"";
            echo twig_escape_filter($this->env, (isset($context["top"]) ? $context["top"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["top"]) ? $context["top"] : null), "html", null, true);
            echo " ";
            echo ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "top") == (isset($context["top"]) ? $context["top"] : null))) ? ("==") : (""));
            echo "</li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['top'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "                </ul>
            </div>            
        </form>
    </div>
    
    ";
        // line 41
        echo "    
    <div class=\"apilog\">
        <h3>Requests : ";
        // line 43
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["tor"]) ? $context["tor"] : null), "requests")), "html", null, true);
        echo "</h3>
        
       ";
        // line 45
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["tor"]) ? $context["tor"] : null), "requests"));
        foreach ($context['_seq'] as $context["_key"] => $context["req"]) {
            // line 46
            echo "        <p>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["req"]) ? $context["req"] : null), "action"), "html", null, true);
            echo " : ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["req"]) ? $context["req"] : null), "response"), "html", null, true);
            echo "</p>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['req'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "    </div>
    
    ";
        // line 51
        echo "    
    ";
        // line 52
        if ($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "list")) {
            // line 53
            echo "        ";
            $context["fields"] = array("name" => "Nom", "seeders" => "Seeders", "leechers" => "Leechers", "size" => "Taille");
            // line 59
            echo "        
        ";
            // line 61
            echo "        
        <div id=\"results-wrapper\">
            <table id=\"results\">
                ";
            // line 64
            if ($this->getAttribute($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "list"), "pages")) {
                // line 65
                echo "                <thead>
                    <tr>
                        ";
                // line 67
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["fields"]) ? $context["fields"] : null));
                foreach ($context['_seq'] as $context["field"] => $context["label"]) {
                    // line 68
                    echo "                        <th><a href=\"view/t411/search?";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "search")) ? ((("search=" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "search")) . "&")) : ("")), "html", null, true);
                    echo "tpage=";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["results"]) ? $context["results"] : null), "page"), "html", null, true);
                    echo "&order=";
                    echo twig_escape_filter($this->env, (isset($context["field"]) ? $context["field"] : null), "html", null, true);
                    echo "&type=";
                    echo ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "order") != (isset($context["field"]) ? $context["field"] : null))) ? ("asc") : (((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "type") == "asc")) ? ("desc") : ("asc"))));
                    echo "\">";
                    echo twig_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true);
                    echo "</a></th>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['field'], $context['label'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 70
                echo "                        
                        <th>Details</th>
                        <th>Download</th>
                        ";
                // line 73
                if (($this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "username") == $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "user"))) {
                    // line 74
                    echo "                        <th>Transmission</th>
                        ";
                }
                // line 76
                echo "                    </tr>
                </thead>
                ";
            }
            // line 79
            echo "                
                ";
            // line 80
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "list"), "torrents"));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["torrent"]) {
                if (is_object((isset($context["torrent"]) ? $context["torrent"] : null))) {
                    // line 81
                    echo "                <tr>
                    <td>";
                    // line 82
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["torrent"]) ? $context["torrent"] : null), "name"), "html", null, true);
                    echo "</td>   
                    <td>";
                    // line 83
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["torrent"]) ? $context["torrent"] : null), "seeders"), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 84
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["torrent"]) ? $context["torrent"] : null), "leechers"), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 85
                    echo twig_escape_filter($this->env, printsize($this->getAttribute((isset($context["torrent"]) ? $context["torrent"] : null), "size")), "html", null, true);
                    echo "</td>
                    <td><a href=\"http://t411.me/t/";
                    // line 86
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["torrent"]) ? $context["torrent"] : null), "id"), "html", null, true);
                    echo "\">Direct</a> - <a href=\"p/";
                    echo twig_escape_filter($this->env, base64_encode(("http://t411.me/t/" . $this->getAttribute((isset($context["torrent"]) ? $context["torrent"] : null), "id"))), "html", null, true);
                    echo "\">Proxy</a></td>
                    <td><a href=\"view/t411/search?dl=";
                    // line 87
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["torrent"]) ? $context["torrent"] : null), "id"), "html", null, true);
                    echo "\">Download</a></td>
                    ";
                    // line 88
                    if (($this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "username") == $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "user"))) {
                        // line 89
                        echo "                    <td><a href=\"view/t411/search?dl=";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["torrent"]) ? $context["torrent"] : null), "id"), "html", null, true);
                        echo "&transmission=1&redirect=";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "server"), "REQUEST_URI"), "html", null, true);
                        echo "\">Transmission</a></td>
                    ";
                    }
                    // line 91
                    echo "                </tr>
                ";
                    $context['_iterated'] = true;
                }
            }
            if (!$context['_iterated']) {
                // line 93
                echo "                <tr>
                    <td class=\"noresults\" colspan=\"7\">Aucun résultat :-(</td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torrent'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 97
            echo "            </table>
        </div>
        
        ";
            // line 101
            echo "        
        ";
            // line 102
            if ($this->getAttribute($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "list"), "pages")) {
                // line 103
                echo "        <div class=\"pagin\">
            ";
                // line 104
                if (($this->getAttribute($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pagin"), "first") > 1)) {
                    // line 105
                    echo "            <a href=\"view/t411/search?";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "search")) ? ((("search=" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "search")) . "&")) : ("")), "html", null, true);
                    echo "tpage=1\">&lt;&lt;</a> ... 
            ";
                }
                // line 107
                echo "            
            ";
                // line 108
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range($this->getAttribute($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pagin"), "first"), $this->getAttribute($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pagin"), "last")));
                foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                    if (((isset($context["p"]) ? $context["p"] : null) != 0)) {
                        // line 109
                        echo "                ";
                        if (((isset($context["p"]) ? $context["p"] : null) == $this->getAttribute((isset($context["results"]) ? $context["results"] : null), "page"))) {
                            echo "<span class=\"cur\">-";
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo "-</span>
                ";
                        } else {
                            // line 110
                            echo "<a href=\"view/t411/search?";
                            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "search")) ? ((("search=" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "search")) . "&")) : ("")), "html", null, true);
                            echo "tpage=";
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo "</a> 
                ";
                        }
                        // line 112
                        echo "            ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 113
                echo "            
            ";
                // line 114
                if (($this->getAttribute($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pagin"), "last") < $this->getAttribute($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "list"), "pages"))) {
                    // line 115
                    echo "             ... <a href=\"view/t411/search?";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "search")) ? ((("search=" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "search")) . "&")) : ("")), "html", null, true);
                    echo "tpage=";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "list"), "pages"), "html", null, true);
                    echo "\">&gt;&gt;</a>
            ";
                }
                // line 117
                echo "        </div>
        ";
            }
            // line 119
            echo "    ";
        }
        // line 120
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "search.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  329 => 120,  326 => 119,  322 => 117,  314 => 115,  312 => 114,  309 => 113,  302 => 112,  292 => 110,  284 => 109,  279 => 108,  276 => 107,  270 => 105,  268 => 104,  265 => 103,  263 => 102,  260 => 101,  255 => 97,  246 => 93,  239 => 91,  231 => 89,  229 => 88,  225 => 87,  219 => 86,  215 => 85,  211 => 84,  207 => 83,  203 => 82,  200 => 81,  194 => 80,  191 => 79,  186 => 76,  182 => 74,  180 => 73,  175 => 70,  158 => 68,  154 => 67,  150 => 65,  148 => 64,  143 => 61,  140 => 59,  137 => 53,  135 => 52,  132 => 51,  128 => 48,  117 => 46,  113 => 45,  108 => 43,  104 => 41,  97 => 35,  84 => 33,  80 => 32,  71 => 26,  64 => 22,  57 => 18,  53 => 17,  45 => 12,  41 => 11,  37 => 10,  33 => 9,  29 => 8,  22 => 3,  19 => 1,);
    }
}
