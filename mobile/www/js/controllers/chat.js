ChatCtrl.$inject = ['$ionicLoading','$rootScope','$scope','$ionicHistory'];
Bogani.controller('ChatCtrl',ChatCtrl);
function ChatCtrl ($ionicLoading,$rootScope,$scope,$ionicHistory) {
 
	
	var chat = firebase.database().ref('switch_books/'+$rootScope.switchid()+'/chats');
	$scope.chats = [];
	$scope.height   = window.screen.height - 130;
	
	$scope.kirimPesan = function(){
		var waktu = new Date();
		

		var t = {
			
			oleh:0,
			waktu:waktu.getTime(),
			pesan:$scope.pesan,
 			
		}
		chat.push(t);
		$("#pesan_text").val('');
		
			 
	}
	$scope.loadChat = function(){
		var ref  = chat.on('value',function(snap){
			
			$ionicLoading.show({
				template: '<ion-spinner icon="bubbles"></ion-spinner> '
			});
	
			var msg = snap.val();
			if(msg !== null){
				
				for(i=0;  i < Object.keys(msg).length; i++){
					
				 var m = {
							id:Object.keys(msg)[i],
							waktu:msg[Object.keys(msg)[i]].waktu,
							oleh:msg[Object.keys(msg)[i]].oleh,
							pesan:msg[Object.keys(msg)[i]].pesan,
				 };
				 $scope.chats.push(m);
				 
				 
				}
				  
			 
				
				$scope.chats.sort(function(a,b){
					return a.waktu-b.waktu;
				});
				
				
				$("#chat-cont").html("");
				 
				$scope.chats.forEach(function(fin){
					
					if(fin.oleh==0){
						def='chat-right';
						var img = "img/noimage.gif";
					}
					else{
						def='chat-left';
						var img = "img/noimage.gif";
					}
					
					var html_ = '<div class="chat"><div class="'+def+'"> '+
						'<div class="img"> '+
							'<img src='+img+'>  '+
						'</div> ' +
						'<div class="pesan"> '+
							'<p>'+fin.pesan+'</p>'+
						'</div>'+
					'</div></div>';
					$("#chat-cont").append(html_);
				});
				$('#chat-cont').scrollTop($('#chat-cont')[0].scrollHeight);
				 $('#chat-cont').animate({scrollTop: $('#chat-cont').get(0).scrollHeight}, 2000); 
				$scope.chats = [];
 				$ionicLoading.hide();
			} 
			
			
			
			
		});
	}
	
    $scope.init = function(){
		
		$scope.loadChat();
		
	}
	
	
};
