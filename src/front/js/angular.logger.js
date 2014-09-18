/**
 * Dynamique logger
 */
angular.module('reeska.logger', [])

/**
 * Logger
 */
.factory('$logger', function ($rootScope) {
	var l = new Logger();
	
	return l;
});

/**
 * Logger
 * 
 * @require utils.js
 */

function Logger(list) {
    var self = this;
    self.list = list || [];
    
    self.init = function(list) {
        self.list = list;
        return self;
    };
    
    self.log = function(msg) {
        var line = {date: Time.now(), msg : msg};
        self.list.unshift(line);
        
        return new SubLogger(line);
    };
    
    self.clean = function() {
        self.list.splice(0);
        return self;
    };
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