Bogani.controller('switchCtrl', function($ionicPopup,$state,$ionicLoading,$ionicLoading,$scope,$rootScope) {
 
	
	$scope.init = function(){
		$ionicLoading.show({
			  template: '<ion-spinner icon="bubbles"></ion-spinner> '
		});
		var get = firebase.database().ref('switch_books/'+$rootScope.tr.notifdetail);		
		get.once('value',function(snap){
			var msg = snap.val();
			if(msg !== null){
				console.log('ada');
				var fg = firebase.database().ref('books/'+msg.book_master.bookid)
				.once('value',function(s){
					var t=s.val();
					$scope.bookform={
						book_title:t.book_title,
						book_img:t.image,
						book_desk:t.deskripsi,
 					}
 				});	

				var fg = firebase.database().ref('books/'+msg.book_request.bookid)
				.once('value',function(s){
					var t=s.val();
					$scope.bookreq={
						book_title:t.book_title,
						book_img:t.image,
 					}
					$ionicLoading.hide();
				});
				
				
				
			}else console.log('tidak ada');
		});
	}	
	 
	$scope.acceptRequest = function(a,b){
		
		$ionicPopup.show({
			template:'Sure,Accept Request?',
			title: 'Confirm Box',
			buttons: [
				{  text:'No' },
				{ 
					text: 'Yes',
					onTap:function(){
						
						$ionicLoading.show({
							template: '<ion-spinner icon="bubbles"></ion-spinner> '
						});
						var get = firebase.database().ref('switch_books/'+$rootScope.tr.notifdetail);
						
						get.update({switch_status:1}).then(function(){
							$ionicLoading.hide();
							
							
							
							$state.go('tab.dash');							
						});
						
						
					}
				},
			]
		});	
		
	}	
	$scope.rejeckRequest = function(){
		
		$ionicPopup.show({
			template:'Sure,Reject Request?',
			title: 'Confirm Box',
			buttons: [
				{  text:'No'},
				{ 
					text: 'Yes',
					onTap:function(){
						
						$ionicLoading.show({
							template: '<ion-spinner icon="bubbles"></ion-spinner> '
						});
						var get = firebase.database().ref('switch_books/'+$rootScope.tr.notifdetail);
						
						get.update({switch_status:2}).then(function(){
							ionicLoading.hide();
							$state.go('tab.dash');
						});
						
						
					}
				},
			]
		});	
		
		
	}
 
 
});