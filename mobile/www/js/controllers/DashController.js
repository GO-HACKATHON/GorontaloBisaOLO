Bogani.controller('DashCtrl', function($ionicLoading,$state,$scope,$rootScope) {
  
     $scope.doRefresh = function(){
	   $scope.load();
     }
 	$scope.mid= window.localStorage.getItem('mid');
 	$scope.name= window.localStorage.getItem('mname');

	 $scope.load = function(){
		 
		 console.log('loha');
		 var ref = firebase.database().ref('books');
		 
		 $ionicLoading.show({
			  template: '<ion-spinner icon="bubbles"></ion-spinner> '
		 });
		 ref.on('value',function(snap){
			if(snap.val()!==null){
				var objv= snap.val();
				
				
				var objv = snap.val();
				$scope.records = [];
				
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
	 $scope.switch_ = function(bookid,memberid){
		 firebase.database().ref('members/'+memberid).on('value',function(snap){
			 var v = snap.val();
			 
			 $rootScope.tr.former = {
				  bookid:bookid,
				  memberid:memberid,
				  name:v.name,
			 };
			 $state.go('tab.swaparea');
			 
		 });
	 }
	 
	 $scope.addLike = function(id,mid){
		 
		 
		 var ref   = firebase.database().ref('books/'+id);
		 var cek   = firebase.database().ref('books/'+id+'/like_history').orderByChild('memberid').equalTo(mid);
		 var refhis= firebase.database().ref('books/'+id+'/like_history');
		 
		 cek.once('value',function(snap){
			 var msg = snap.val();
			 if(msg!==null){
				 //
			 }else{ 
				 ref.once('value',function(snap){
					 var r =snap.val();
					 var like = parseInt(r.likes) + 1;
					 ref.update({
						 likes:like,
					 }).then(function(){
						 var d = {
							 memberid:mid,
						 }
						 refhis.push(d);
					 });
					 
				 });
			 }
			 
			 
		 });
		 
		 
	 }
	
})
