/**
 * Remote Content to panel
 */
angular.module('reeska.panel.remotecontent', ['reeska.panel', 'reeska.logger'])

/**
 * Remote content
 */
.directive('remotecontent', function() {
	return {
		require: '^panel',
		transclude: true,
		template: 
			'<div class="remotecontent">\
				<actions>\
					<i class="glyphicon glyphicon-refresh action-refresh" ng-click="refresh($event)" ng-show="dataurl" ng-class="{rotation: loading}"></i>\
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
		controller: function($scope, $element, $attrs, $http, $logger, $rootScope) {
		    /*
		     * Remote content
		     */
            $scope.dataurl = $attrs.url;
            $scope.loading = false;
            $scope.data = [];

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
                var sl = $logger.log('Loading ' + $scope.dataurl);
                
                $http.get($scope.dataurl)
                .success(function(data) {
                    $scope.data = data;
                    
                    
                    sl.append(' [OK]');
                })
                .error(function(data) {
                    $scope.data = [];
                    $scope.error = 'Fail : ' + data.error;
                    
                    sl.append(' [KO]');
                    
                    // error so tell panel to display content
                    if ($e)
                        $pmodel.content = true;                    
                })
                .finally(function() {
                    $scope.loading = false;
                });
            })();
            
            /**
             * Expose to root scope
             */
            var expose = $rootScope.remoteContents || [];
            
            expose.push({
                refresh : $scope.refresh,
                title : $scope.title,
                url : $scope.dataurl
            });
            
            $rootScope.remoteContents = expose;
		}
	}            
})

/*	<div class="progress" ng-show="loading">\
      <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">\
        Loading...\
      </div>\
    </div>\*/