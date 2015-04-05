/****************************************
 * Utils
 ****************************************/
var Time = {
    now : function() {
        var d = new Date();
        
        return [d.getDate(), d.getMonth(), d.getFullYear()].join('/') + 
            ' ' + [d.getHours(), d.getMinutes()].join(':');
    }
};

function Id() {
    var self = this;
    self.last = 0;
    self.next = function() {
        return ++self.last;
    };
}

var Id = new Id();   
var Arrows = {
	UP: 38,
	DOWN: 40,
	LEFT: 37,
	RIGHT: 36
};  

    
/**
 * Timeout looper
 */
function loop(fn, time, watch) {
    var t = time,
        w = watch || function() {};
    
    if (typeof time == 'function')
        t = time();
    
    w(setTimeout(function() {
        fn();
        loop(fn, time, w);
    }, t));
} 