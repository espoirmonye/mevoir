@extends('layouts/default')

{{-- Page title --}}
@section('title')
Connexion
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--global css starts-->

    <!--end of global css-->
    <!--page level css starts-->
    
<link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.6.1/firebaseui.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/jquery.circliful.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl_carousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl_carousel/css/owl.theme.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/proposertrajet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/1.css') }}">

     <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.6.1/firebaseui.css" />
    <script src="https://cdn.firebase.com/libs/firebaseui/2.6.1/firebaseui.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.11.0/firebase.js"></script>
    <!--end of page level css-->
@stop

{{-- content --}}
@section('content')
<body>
    <div class="text-center">
        <h3 class="border-success" style="margin-top: -5px;"></h3>
    </div>
    <div class="container">
    <!--Content Section Start -->
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
      <div class="col-md-6 col-sm-12 col-xs-12" style="padding-left: 5px; padding-top: 5px; border-right: solid 1px #ddd; "> 
          <h4 class="text-primary">
            <strong style="text-align: center; font-size: 2em;"> Vous êtes chauffeur ?</strong>
          </h4>
          <button type="button" class="btn btn-primary" style="margin-top: 1px; margin-bottom: 1px; border-radius: 28px;background-color: #330066;">
            Connectez-vous ici
          </button>
      </div>
        
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div style="border: solid 1px #ddd;" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 animation flipInX" >
          <div >
            <a href="{{ route('redirect') }}">
              <h4 class="text-primary" style="padding-left: 1px; padding-bottom: 5px;color: black"> En<strong style="color: #330066;"> 2 secondes</strong>  via Facebook </h4>
            </a>
              
                          <div class="panel-body">
                       <!--         <fb:login-button 
                                  scope="public_profile,email"
                                  onlogin="checkLoginState();">
                                </fb:login-button>  -->
                             <a onclick="signInWithFacebook()" class="btn btn-block btn-social btn-facebook"><span class="fa fa-facebook"></span> S'inscrire avec Facebook</a >
                          </div>
              <h4 class="text-primary">Ou</h4>
              <h4 class="text-primary" style="padding-left: 1px; padding-bottom: 5px;color: black"> En<strong style="color: #330066;"> 5 seconde</strong> avec votre email </h4>
                        
                  <!-- Notifications -->
              <div id="notific">
                  @include('notifications')
              </div>
              <form accept-charset="UTF-8" role="form" action="" method="post">
                          <!-- CSRF Token -->
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                  <fieldset >
                      <div class="form-group {{ $errors->first('first_name', 'has-error') }}" style="height: 45px;">
                          <div class=" input-group ">
                              <div class="input-group-addon">
                                  <i class="livicon" data-name="mail" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                              </div>
                              <input class="form-control" placeholder="Votre e-mail" id="email" name="email" type="text" value="{!! old('first_name') !!}"/>
                          </div>
                                  {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                      </div>
                      <div class="form-group  {{ $errors->first('last_name', 'has-error') }}" style="height: 45px;">
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="livicon" data-name="key" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                              </div>
                              <input class="form-control" placeholder="Mot de passe" id="password" name="password" type="password" value="{!! old('last_name') !!}"/>
                          </div>
                      </div>
                       <button onclick="signInWithEmailAndPassword()" class="btn btn-block btn-primary" style="margin-top: 1px ;margin-bottom: 1px; border-radius: 28px; background-color: #8a2de4c9;"><h4>Connexion</h4></button>
              </form>
          </div>
          <div class="bg-light animation flipInX fgp">
              Mot de passe oublié?
          </div>
      </div>
      </div> 
  </div>
    <!-- //Content Section End -->
</div>
<!--global js starts-->
<!--global js end-->
@stop
{{-- footer scripts --}}
@section('footer_scripts')

<script>
    // body...
  var config = {
    apiKey: "AIzaSyDrfeK8jlIzWDp0Wz_RQdktVLcFTiP56Hw",
    authDomain: "agogocar-197510.firebaseapp.com",
    databaseURL: "https://agogocar-197510.firebaseio.com",
    projectId: "agogocar-197510",
    storageBucket: "agogocar-197510.appspot.com",
    messagingSenderId: "1029976310169",  

  }
</script>

 <script>
function signInWithFacebook() {
    // Initialize the default app
var defaultApp = firebase.initializeApp(config);

console.log(defaultApp.name);  // "[DEFAULT]"

var provider = new firebase.auth.FacebookAuthProvider();
firebase.auth().signInWithPopup(provider).then(function(result) {
  // This gives you a Facebook Access Token. You can use it to access the Facebook API.
  var token = result.credential.accessToken;
  // The signed-in user info.
  var user = result.user;
  console.log(result);
  alert(result);
  // ...
}).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
  // The email of the user's account used.
  var email = error.email;
  // The firebase.auth.AuthCredential type that was used.
  var credential = error.credential;
  console.log(error);
  alert(error);
  // ...
});
sentDataToController();

}


    function sentDataToController(result) {
      console.log(result);
      $.ajax({
      url: '/login',
      method: 'POST',
      headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      data: { mydata: result, _token: '{{csrf_token()}}' },
       
      dataType: "json",
      success: function(result){
        console.log(result);
             //TODO: tu ecrit ta logic si la requete sexecute bien
      },

      error: function(result, status, error){
                                //En cas d'erreur
        console.log('erreur');
      },
      complete: function(result){
        console.log('completed');
      }
    });
  }

   function signInWithEmailAndPassword(){
      var defaultApp = firebase.initializeApp(config);
      console.log(defaultApp.name);
    
      var auth = firebase.auth();
      var user = firebase.auth().currentUser;
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;

        // sign in 
        auth.signInWithEmailAndPassword(email, password).then(function (user) {

alert('sucess');
}, function(error){alert(error);});

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {

        var name = user.displayName;
        var email = user.email;
        var photo = user.photoURL;
        var idpassager = user.uid;
        console.log(user);
        console.log(JSON.stringify(user));

        createNewPost(name, email, photo, uid);
        console.log("name: "+user.displayName);
        console.log("email: "+user.email);
        console.log("photoUrl: "+user.photoURL);
        console.log("idpassager: "+user.uid);
    }
});

        window.location = '{!! url("index")!!}';
        }

</script>
<fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>
    <!-- page level js starts-->
<script src='https://code.jquery.com/jquery-3.1.0.js'></script> 
<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase-messaging.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/login_custom.js') }}"></script>
    <!--page level js ends-->
@stop
