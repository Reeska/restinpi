/**
 * Remote Content to panel
 */
angular.module('reeska.panel.remotecontent', ['reeska.panel', 'reeska.logger'])

.factory('$remoteFactory', ['$storage', function($storage) {
	var cfg = $storage.get('remoter', {
	        autorefresh : true,
	        refreshinterval : 10,		
		}),
		contents = [],
		timeout;
	
	return {
		start: function() {
			loop(function() {
                if (cfg.autorefresh)
					angular.forEach(contents, function(item) {
	                    item.refresh();
					})
            }, function() {
                return cfg.refreshinterval * 1000;
            }, function(id) {
            	timeout = id;
            })	
		},
		
		stop: function() {
			clearTimeout(timeout);
			timeout = undefined;
		},
		
		switch: function() {
			if (timeout)
				this.stop();
			else
				this.start();
		},
		
		add: function(remotecontent) {
			contents.push(remotecontent);
		},
		
		settings: cfg
	}
}])

/**
 * Remote content
 */
.directive('remotecontent', function($remoteFactory) {
	return {
		require: '^panel',
		transclude: true,
		template: 
			'<div class="remotecontent">\
				<actions>\
					<i class="glyphicon glyphicon-refresh action-refresh" ng-click="refresh($event)" ng-class="{rotation: loading}"></i>\
				</actions>\
                <div class="alert alert-danger" role="alert" ng-show="error">\
                  {{ error }}\
                </div>\
			</div>',
		replace: true,
		//scope: { url : '@'}, // share same scope of panel
		link: function(scope, element, attrs, panelCtrl, transclude) {
            transclude(scope, function(clone, scope) {
                /**
                 * Append all content to panel content div
                 */
                element.append(clone);
            });							
		},
		controller: function($scope, $element, $attrs, $http, $logger, $rootScope, $interpolate) {
		   /* var $settings = angular.extend({
		        // url : required in attrs,
		        autorefresh : true,
		        refreshinterval : 10,
		        baseurl : ''
		    }, $attrs);*/
		    
		    /*
		     * Remote content
		     */
            $scope.iurl  = $interpolate($attrs.url);
            $scope.loading  = false;
            $scope.data     = [];

            /**
             * Get content from url and assign to $scope.data
             */
            ($scope.refresh = function($e) {
                /*
                 * Loading is running
                 */
                if ($scope.loading)
                    return;
                
            	$e && $e.stopPropagation();
            
            	/*
            	 * parent model
            	 */
            	var $pmodel = $scope.model;
                
                /*
                 * reset
                 */
                $scope.error = '';
                $scope.loading = true;
                
                // user action so tell panel to display content
                if ($e)
                    $pmodel.content = true;
                
                /*
                 * Get logging
                 */
                var url = $scope.iurl($scope);
                var sl = $logger.log('Loading ' + url);
                
                $http.get(url)
                .success(function(data) {
                    $scope.data = data;
                    
                    
                    sl.append(' [OK]');
                })
                .error(function(data, status) {
                    $scope.data = [];
                    $scope.error = 'Fail : [' + status + '] ' + (data.error || data) + ' url:' + url;
                    
                    sl.append(' [KO]');
                    
                    // error so tell panel to display content
                    //if ($e)
                        $pmodel.content = true;                    
                })
                .finally(function() {
                    $scope.loading = false;
                });
            })();
            
            /**
             * Autorefresh
             */
            /*loop(function() {
                if ($settings.autorefresh)
                    $scope.refresh();
            }, function() {
                return $settings.refreshinterval * 1000;
            });*/
            
            /**
             * Expose to root scope
             */
            var expose = $rootScope.remoteContents || [];
            
            expose.push({
                refresh : $scope.refresh,
                title : $scope.title,
                url : $scope.dataurl
            });
            
            //$rootScope.remoteContents = expose;
            
            $remoteFactory.add({
                refresh : $scope.refresh,
                title : $scope.title,
                url : $scope.iurl
            });
		}
	}            
})

/*	<div class="progress" ng-show="loading">\
      <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">\
        Loading...\
      </div>\
    </div>\*/