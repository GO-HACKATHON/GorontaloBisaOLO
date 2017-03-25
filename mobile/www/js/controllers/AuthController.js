Bogani.controller('authCtrl', function($rootScope,$ionicPopup,$ionicLoading,$state,$scope) {
 
	$rootScope.isLogin=false
	firebase.auth().onAuthStateChanged(function(user) {
		if(user){
			window.localStorage.setItem('mid',user.uid);
			window.location.href='index.html';
		}else{
			firebase.auth().signOut();
		}
	});
	
 
    $scope.loginEvent = function(demail,pass){
		
		if(demail==null && pass==null) return false;
		
		else if(validateEmail(demail)==false){
			$scope.popMsg("Email yang anda masukan salah","Error");
			return false;
		}
 
		var sukses = true;
		const auth = firebase.auth();
		const prom = auth.signInWithEmailAndPassword(demail,pass).
		then(function(result){
			//alert(1);
			var msgCode = result.code;
			var msg= result.message;
	 
				 
			
		})
		.catch(
			function(error){
	
			$ionicLoading.hide();
			
				if(error){
					
					var errorCode=error.code;
					var errorMsg =error.message;
					var msg=null;
					//alert(errorCode);
				 
				    msg = errorMsg;	
					
					var myPopup = $ionicPopup.show({
								template:msg,
								title: 'Warning!!!',
								buttons: [
									{ text: 'Exit' },
								]
					});							
					
					
				} 
			}
		)
	
		  
	}
	$scope.popMsg = function(msg,title){
		
		$ionicPopup.show({
			template:msg,
			title: title,
			buttons: [
				{ text: 'Close' },
			]
		});
		
	}
	function validateEmail(email) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
	$scope.registerEvent = function (nama,email,pass){
		var error=false;
		if( nama==null || email==null || pass==null){
			$scope.popMsg("Mohon Jangan Mengosongkan Field","Error");
 			return false;
		}
		else if(validateEmail(email)==false){
			$scope.popMsg("Email yang anda masukan salah","Error");
 			return false;
		}
		else if(pass.length < 6){
			$scope.popMsg("Password Harus Lebih dari 6 karakter","Error");
 			return false;
		}else if(nama.length < 5){
			$scope.popMsg("Nama Harus Lebih dari 5 karakter","Error");
 			return false;
		}else{ 
			
			$ionicLoading.show({
				template: '<ion-spinner icon="bubbles"></ion-spinner><br/>Tunggu Sadiki... !',
			}); 
			
			firebase.auth().createUserWithEmailAndPassword(email,pass).catch(function(error) {
				  $ionicLoading.hide();
				  var errorCode = error.code;
				  var errorMessage = error.message;
				  $scope.popMsg(errorMessage,"Error");
				  
			});
			
		}
		
		 
			
			 
		
	}
	$scope.logoutEvent = function(){
		
		firebase.auth().signOut().then(function() {
			 Bogani.clearAll();
			 $state.go('login');
		}, function(error) {
			 $ionicPopup.show({
				template:"Terjadi Kesalahan....",
				title: 'Warning!!!',
				buttons: [
					{ text: 'Exit' },
				]
			});
		});
		
		
	}
    $scope.verifikasi = function(kode){
			
		$ionicLoading.show({
			template: '<ion-spinner icon="bubbles"></ion-spinner><br/>Tunggu Sadiki... !'
		});
		var datax = {
 			nohp:$rootScope.auth.nohp,
			kode:kode,
 		};
							
		var configx = {headers : {'Content-Type': 'application/x-www-form-urlencoded'}};
		$http.post($scope.host_+"verifikasi_kode",datax, configx).
		then(function(respon){
			
			var d    = respon.data;
 			if(d.code==1){
				var row = d.row;
				var pass = ""+row.password+"";
				firebase.auth().createUserWithEmailAndPassword(row.email,pass).
				then(function(result){
					alert('anda sukses terdaftar');
					$ionicLoading.hide();			
					$state.go('login');
				});
				
			}else{ 
				alert('Kode Tidak Valid....');
				console.log('bad');
				$ionicLoading.hide();
			}
		});	
		
	}
 
 
 
});