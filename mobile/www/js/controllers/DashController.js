Bogani.controller('DashCtrl', function($ionicLoading,$state,$scope,$rootScope) {
  
     $scope.doRefresh = function(){
	   $scope.load();
     }
	 $scope.load = function(){
		 
		 console.log('loha');
		 var ref = firebase.database().ref('books');
		 
		 $ionicLoading.show({
			  template: '<ion-spinner icon="bubbles"></ion-spinner> '
		 });
		 ref.on('value',function(snap){
			if(snap.val()!==null){
				var objv= snap.val();
				
				$scope.records = [];
				
				var objv = snap.val();
				for(i=0;  i < Object.keys(objv).length; i++){
					

					var m={
						id:Object.keys(objv)[i],
						title:objv[Object.keys(objv)[i]].book_title,
						desk:objv[Object.keys(objv)[i]].deskripsi,
						image:objv[Object.keys(objv)[i]].image,
						likes:objv[Object.keys(objv)[i]].likes,
						requests:objv[Object.keys(objv)[i]].requests,
						memberid:objv[Object.keys(objv)[i]].memberid,
						name:objv[Object.keys(objv)[i]].membername,
						timesend:timeSince(objv[Object.keys(objv)[i]].timesend),
						
					};	

					 
					$scope.records.push(m);
					
				
					
		
					
					
				}
				$ionicLoading.hide();
				$scope.$broadcast('scroll.refreshComplete');
				
			 
			}else{
				$ionicLoading.hide();
				$scope.$broadcast('scroll.refreshComplete');
			}
			 
			 
		 });
		 
	 }
	 $scope.init = function(){
 			$scope.load();
		 
		 
	 }
	 $scope.switch_ = function(x,y){
		 $state.go('tab.swaparea');
	 }
	
})
