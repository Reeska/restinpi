/**
 * Togglable panel
 */

angular.module('reeska.panel', ['reeska.storage'])

/**
 * Panel directive to display some infos togglable.
 */
.directive('panel', function() {
    return {
        transclude: true,
        template: 
            '<div class="panel panel-default data-panel">\
                <div class="panel-heading togglable action-bar" ng-click="toggle()">\
                    <i class="panel-icon {{ titleIcon }}" ng-show="titleIcon"></i> {{ title }} \
                    <i class="glyphicon" ng-class="{\'glyphicon-chevron-down\':model.content, \'glyphicon-chevron-up\': !model.content}"></i> \
                </div>\
                <div class="content" ng-show="model.content">\
                </div>\
            </div>',
        scope: { title : '@', titleIcon : '@'},
        replace: true,
        controller: function($scope, $element, $attrs, $http, $storage) {
            /*
             * import specific vars from mainController scope
             */
            if ($attrs.imports) {
                angular.forEach($attrs.imports.split(/\s*,\s*/), function(vaar) {
                    $scope[vaar] = $scope.$parent[vaar];
                });
            }
            
            /**
             * manage storage
             */
            var $model = $storage.get('panel', {});

            if (!$model[$scope.title]) {
                $model[$scope.title] = {
                    content : true  // show content by default
                };
            }
            
            /*
             * init
             */
            $scope.model = $model[$scope.title];
            
            $scope.toggle = function() {
                $scope.model.content = !$scope.model.content;
            };
            
            /*
             * Add button to action bar. For sub directive.
             */
            var actionBar = angular.element('.action-bar', $element);
            this.addAction = function(action) {
                actionBar.append(action);
            };
        },
        /**
         * Import transclude content to this directive scope.
         * From: http://angular-tips.com/blog/2014/03/transclusion-and-scopes/
         */
        link: function(scope, element, attrs, ctrl, transclude) {
            transclude(scope, function(clone, scope) {
                /**
                 * Append all content to panel content div
                 */
                angular.element('.content', element).append(clone);
            });
        }                
    };
})

/**
 * Action bar
 */
.directive('actions', function() {
	return {
		require: '^panel',
		transclude: true,
		template: '<span ng-transclude></span>',
		replace: true,
		scope: {},
		link: function(scope, element, attrs, panelCtrl, transclude) {
			panelCtrl.addAction(element);
		}
	};         
});