Bogani.controller('swapareaCtrl', function($ionicLoading,$state,$rootScope,$scope,$ionicPopup) {
	
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

 
	$scope.addSwapBook = function(id){
		var waktu = new Date();
		
		var asal 	 =  {
							bookid:$rootScope.tr.former.bookid,
							memberid:$rootScope.tr.former.memberid,
							name:$rootScope.tr.former.name,
						};
		
		var myPopup = $ionicPopup.confirm({
				template:"Add this Book to Exchange?",
				title: "Confirm Box",
				buttons: [
					{
						text:"NO",
					},
					{ 
						text: 'YES',
						onTap:function(){
							$ionicLoading.show({
								template: '<ion-spinner icon="bubbles"></ion-spinner> '
							});
							var fir = firebase.database().ref('switch_books');
							var d   = {
								memberid:asal.memberid,
								book_master:{
									bookid:asal.bookid,
									name:asal.name,
								},
								book_request:{
									bookid:id,
									memberid:$scope.mid,
									name:$scope.name,
								},
   								date_request_send:waktu.getTime(),
								switch_status:0,
							};
							fir.push(d).then(function(){
								$ionicLoading.hide();
								
								$ionicPopup.show({
									template:"Book Exchange Sent...",
									title: 'Success',
									buttons: [
										{ 
											text: 'close',
											onTap:function(){
												$state.go('tab.dash');
											}
										},
									]
								});		


								
							});
							
						}
					},
				]
		});	

	}	
	 
	
	
	$scope.removeSwapBook = function(id){
		
		var d = {
			id:id,
			memberid:$scope.mid,
		};
		var temu=false;
		var index=null;
		if($scope.swap.length>0){
			var i=0;
			$scope.swap.forEach(function(row){
				if(row.id==id){
					temu=true;
					delete $scope.swap[i];
					console.log(Object.keys(row));
				}
				i++;
			});
		}else console.log('kosong');
		console.log($scope.swap);
		
		
	}
	
})
