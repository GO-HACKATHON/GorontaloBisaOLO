Bogani.controller('BookCtrl', function($ionicLoading,$state,$scope,$ionicPopup) {
	
	$scope.mid   = window.localStorage.getItem('mid');
	$scope.mname= window.localStorage.getItem('mname');
	
	$scope.fire  = firebase.database();
	
	$scope.popMsg = function(msg,title){
		
		$ionicPopup.show({
			template:msg,
			title: title,
			buttons: [
				{ text: 'Close' },
			]
		});
		
	}
	
	$scope.upload = function(judul,desk){
		
		var img 	= $("#imgprev");
  	 
		 if(judul==null){
			$scope.popMsg("Judul Buku Harus Lebih dari 5 Karakter","Error!");
			return false;
		}else if(desk==null){
			$scope.popMsg("Deksrpsi Harus Lebih dari 5 Karakter","Error!");
			return false;
		}else{ 
			$ionicLoading.show({
				template: '<ion-spinner icon="bubbles"></ion-spinner><br/>Tunggu Sadiki... !'
			});
			var waktu = new Date();
			var d = {
				memberid:$scope.mid,
				membername:$scope.mname,
				book_title:judul,
				deskripsi:desk,
				image:img.attr('src'),
				likes:0,
				requests:0,
				timesend:waktu.getTime(),
			}
			$scope.fire.ref('books').push(d).then(function(){
				$ionicLoading.hide();
 				$ionicPopup.show({
					template:"Berhasil menambahkan...",
					title: "Sukses",
					buttons: [
						{ 
							text: 'Close',
							onTap:function(){
								
							  $("#file").val('');
							  $("#judul").val('');
							  $("#desk").val('');
							  $state.go('tab.dash');	
							}
						},
					]
				});
			});
		} 

	}
	
})
