/**
 * Dynamique logger
 */
angular.module('reeska.logger', [])

/**
 * Logger
 */
.provider('$logger', function () {
	var sets;
	
	/*
	 * expose to config as $loggerProvider
	 */
	this.init = function(settings) {
	    sets = settings;
	}
	
	this.$get = [function() {
    	var l = new Logger(sets.list, sets.bound);
    	
    	/*
    	 * override clean to stop gui event propagation on click
    	 */
    	var clean = l.clean;
    	l.clean = function($e) {
    	    $e.stopPropagation();
    	    
    	    return clean();
    	}	    
	    
	    return l;
	}];
});

/**
 * Logger
 * 
 * @require utils.js
 */

function Logger(list, bound) {
    var self = this;
    self.list = list || [];
    self.bound = bound || 50;
    
    self.init = function(list, bound) {
        self.list = list;
        self.bound = bound;
        return self;
    };
    
    self.log = function(msg) {
        var line = {date: Time.now(), msg : msg};
        self.list.unshift(line);
        
        /*
         * truncate log
         */
        if (self.bound)
            self.list.splice(self.bound);
        
        return new SubLogger(line);
    };
    
    self.clean = function() {
        self.list.splice(0);
        return self;
    };
    
    self.size = function() {
        return self.list.length;
    }
}

function SubLogger(line) {
    var self = this;
    self.line = line;
    
    self.append = function(ad) {
        self.line.msg += ad;
        return self;
    };
    
    self.replace = function(l) {
        self.line.msg = l;
        return self;
    };
}