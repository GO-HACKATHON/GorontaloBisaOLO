Bogani.controller('personCtrl', function($scope,$ionicLoading) {
 
 
	$scope.mid   = window.localStorage.getItem('mid');
	$scope.name= window.localStorage.getItem('mname');
	$scope.swap = [];
 	$scope.init = function(){
		
		 var ref = firebase.database().ref('books').orderByChild('memberid').equalTo($scope.mid);
		 $ionicLoading.show({
			  template: '<ion-spinner icon="bubbles"></ion-spinner> '
		 });
		 ref.once('value',function(snap){
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
			 }else console.log('belum ada'+$scope.mid);
			 $ionicLoading.hide();
			 $scope.$broadcast('scroll.refreshComplete');
			 
		 });
			
	}
    $scope.account = function(){
		
		$ionicLoading.show({
			  template: '<ion-spinner icon="bubbles"></ion-spinner> '
		});
		var get = firebase.database().ref('members/'+$scope.mid);
		$scope.data=[];
		get.once('value',function(snap){
			
			var v = snap.val();
 			$scope.nama = v.name;
			$scope.address = v.address,
			$scope.email= v.email,
			$scope.phone=v.phone;
			$ionicLoading.hide()
			
		});
		
		
		
	}
 	$scope.save = function(){
		
		var address= $("#address").val();
		var nama = $("#nama").val();
		var email = $("#email").val();
		var phone= $("#phone").val();
		var passworrd= $("#passworrd").val();
		
		var data = {
			name:nama,
			email:email,
			phone:phone,
			address:address,
		}
		
		firebase.database().ref('members/'+$scope.mid).update(data).then(function(){
			alert('updated......');
		});
		 
	}
 
 
});