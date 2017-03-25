Bogani.controller('notifCtrl', function($state,$scope) {
 
 
 
 
	
	
	$scope.detailNotif = function(){
		$state.go('tab.switch');
	}
});