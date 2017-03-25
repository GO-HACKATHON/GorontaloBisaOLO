// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js
 var config = {
    apiKey: "AIzaSyA978yf2RnagLUBnXf9_CcAsOKyQ5_k5Ow",
    authDomain: "tukarbuku-92a26.firebaseapp.com",
    databaseURL: "https://tukarbuku-92a26.firebaseio.com",
    storageBucket: "tukarbuku-92a26.appspot.com",
    messagingSenderId: "859493956464",
  };
firebase.initializeApp(config);



angular.module('starter', ['ionic', 'starter.controllers', 'starter.services'])

.run(function($ionicPlatform,$rootScope,$state,$ionicPopup) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);

    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
  });
  
   //app js 
   firebase.auth().onAuthStateChanged(function(user) {
	   if(user){
		 $rootScope.isLogin=true;
	   }else{
		    $rootScope.isLogin=false;
		   $state.go('tab.login');
	   }
   });
   
   $rootScope.logout = function(){
		var confirmPopup = $ionicPopup.confirm({
			title: 'Sure to Logout?',
			buttons: [
				{
						text: 'No',
								onTap:function(e){
									
								}
							  },
							  {
								text: 'Yes',
								type: 'button-assertive',
								onTap: function(e) {
									firebase.auth().signOut();
								}
							  }
						]
	   });
	   
   }
  
  
  
  
  
  
  
  
  
})

.config(function($stateProvider, $urlRouterProvider,$ionicConfigProvider) {


 
   $ionicConfigProvider.tabs.position('bottom'); // other values: top
  

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider

  // setup an abstract state for the tabs directive
    .state('tab', {
    url: '/tab',
    abstract: true,
    templateUrl: 'templates/tabs.html'
  })

  // Each tab has its own nav history stack:

  .state('tab.dash', {
    url: '/dash',
    views: {
      'tab-dash': {
        templateUrl: 'templates/tab-dash.html',
        controller: 'DashCtrl'
      }
    }
  })  
  .state('tab.addbook', {
    url: '/addbook',
    views: {
      'tab-upload': {
        templateUrl: 'templates/tab-addbook.html',
        controller: 'BookCtrl'
      }
    }
  })

  .state('tab.chats', {
      url: '/chats',
      views: {
        'tab-chats': {
          templateUrl: 'templates/tab-chats.html',
          controller: 'ChatsCtrl'
        }
      }
    })
    .state('tab.chat-detail', {
      url: '/chats/:chatId',
      views: {
        'tab-chats': {
          templateUrl: 'templates/chat-detail.html',
          controller: 'ChatDetailCtrl'
        }
      }
    })    
	.state('tab.search', {
      url: '/search',
      views: {
        'tab-search': {
          templateUrl: 'templates/tab-search.html',
          controller: 'SearchCtrl'
        }
      }
    })   

	.state('tab.register', {
      url: '/register',
      views: {
        'tab-register': {
          templateUrl: 'templates/tab-register.html',
          controller: 'authCtrl'
        }
      }
    })
	.state('tab.login', {
      url: '/login',
      views: {
        'tab-login': {
          templateUrl: 'templates/tab-login.html',
          controller: 'authCtrl'
        }
      }
    })	
	.state('tab.person', {
      url: '/person',
      views: {
        'tab-person': {
          templateUrl: 'templates/tab-person.html',
          controller: 'personCtrl'
        }
      }
    })	
	.state('tab.account', {
      url: '/account',
      views: {
        'tab-person': {
          templateUrl: 'templates/tab-account.html',
          controller: 'personCtrl'
        }
      }
    })	
	.state('tab.notif', {
      url: '/notif',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-notif.html',
          controller: 'notifCtrl'
        }
      }
    })	
	.state('tab.switch', {
      url: '/switch',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-switch-detail.html',
          controller: 'switchCtrl'
        }
      }
    })
 

  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/tab/dash');

});
