@extends('siginadnsigup')
@section('content')
<script>
model.masterModel = {
	username:"",
	password:"",
}
var material = {
	url_dir: ko.observable('/login'),  /* location of Controller file */
	Recordmaterial: ko.mapping.fromJS(model.masterModel),
}

material.Login = function(){
  model.Processing(true);
  var val = material.Recordmaterial;
  var url = material.url_dir(); // insert && update
  $.ajax({
    url: url,
    method: 'POST', // method: 'post' //GET, HEAD, PUT, PATCH, DELETE."
    data : val,
    success : function(res) {
      var res = JSON.parse(res);
      console.log(res);
			switch (res) {
				// case "username_and_pass_salah": console.log('salah');
				case "username_and_pass_salah": location.href = '/';
				break;
				// case "username_salah": console.log('salah');
				case "username_salah": location.href = '/';
				break;
				// case "pass_salah": console.log('salah');
				case "pass_salah": location.href = '/';
				break;
				// default: console.log('benar');
				default: location.href = '/admin';
			}
      model.Processing(false); /* end proses simpan / update*/
    }
  });
  model.Processing(false); /* for process cancel button  */
}

</script>
<div class="wrapper">
<section class="login-content">
   <div class="row m-0 align-items-center bg-white vh-100">
      <div class="col-md-6">
         <div class="row justify-content-center">
            <div class="col-md-10">
               <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                  <div class="card-body">
                     <a href="../../dashboard/index.html" class="navbar-brand d-flex align-items-center mb-3">
                        <!--Logo start-->
                        <!--logo End-->

                        <!--Logo start-->
                        <div class="logo-main">
                            <div class="logo-normal">
                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="logo-mini">
                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                </svg>
                            </div>
                        </div>
                        <!--logo End-->
                        <h4 class="logo-title ms-3">Hope UI</h4>
                     </a>
                     <h2 class="mb-2 text-center">Sign In</h2>
                     <p class="text-center">Login to stay connected.</p>
                     <form data-bind="with: material">
                        <div class="row" data-bind="with: Recordmaterial">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="username" class="form-label">Username</label>
                                 <input type="text" class="form-control" id="username" aria-describedby="username" data-bind="value: username" placeholder=" ">
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="password" class="form-label">Password</label>
                                 <input type="password" class="form-control" id="password" aria-describedby="password" data-bind="value: password" placeholder=" ">
                              </div>
                           </div>
                        </div>
                        <div class="d-flex justify-content-center">
                           <button type="submit" data-bind="click:Login" class="btn btn-primary">Sign In</button>
                        </div>
                        <p class="mt-3 text-center">
                           Don’t have an account? <a href="/sigup" class="text-underline">Click here to sign up.</a>
                        </p>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="sign-bg">
            <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
               <g opacity="0.05">
               <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
               <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
               <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
               <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
               </g>
            </svg>
         </div>
      </div>
      <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
         <img src="../../assets/images/auth/01.png" class="img-fluid gradient-main animated-scaleX" alt="images">
      </div>
   </div>
</section>
</div>
@stop
