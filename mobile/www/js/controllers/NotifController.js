Bogani.controller('notifCtrl', function($state,$scope,$rootScope,$ionicLoading) {
 
    
	$scope.id = window.localStorage.getItem('mid');
	$scope.init = function(){
		
		var notif = firebase.database().ref('switch_books').orderByChild('memberid').equalTo($scope.id);
		$ionicLoading.show({
			  template: '<ion-spinner icon="bubbles"></ion-spinner> '
		});
		notif.on('value',function(snap){
			if(snap.val()!==null){
			  console.log('ada');	
			    var objv= snap.val();
 				$scope.records = [];
 				for(i=0;  i < Object.keys(objv).length; i++){
					
					if(objv[Object.keys(objv)[i]].switch_status==0){
					
						$scope.m = {
							id:Object.keys(objv)[i],
							time:objv[Object.keys(objv)[i]].date_request_send,
							bookid:objv[Object.keys(objv)[i]].book_master.bookid,
							formername:objv[Object.keys(objv)[i]].book_request.name,
						}
						
						var f = firebase.database().ref('books/'+$scope.m.bookid);					
						f.once('value',function(snap){
							if(snap.val()!==null){
								var r=snap.val();
								var m={
									id:$scope.m.id,
									bookname:r.book_title,
									date_request_send:timeSince($scope.m.time),
									formername:$scope.m.formername,
								}
								$scope.records.push(m);
								console.log(m);
								$ionicLoading.hide();
							}else {
								console.log('kosong!'+$scope.m.bookid);
								$ionicLoading.hide();
							}
						});
					
					}else{ 
						$ionicLoading.hide();
					}
					
					
				}
			   
			}else {
				$ionicLoading.hide();
			}
		});
		
		
	}
	
	$scope.detailNotif = function( id ){
		$rootScope.tr.notifdetail=id;
		$state.go('tab.switch');
	}
	

	
});