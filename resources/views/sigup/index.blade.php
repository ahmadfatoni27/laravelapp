@extends('siginadnsigup')
@section('content')
<script>
model.masterModel = {
  name:"",
	username:"",
	password:"",
}
var material = {
	url_dir: ko.observable('/resgist'),  /* location of Controller file */
	Recordmaterial: ko.mapping.fromJS(model.masterModel),
}

material.Regist = function(){
  model.Processing(true);
  var val = material.Recordmaterial;
  var url = material.url_dir(); // insert && update
  $.ajax({
    url: url,
    method: 'POST', // method: 'post' //GET, HEAD, PUT, PATCH, DELETE."
    data : val,
    success : function(res) {
      var res = JSON.parse(res);
      location.href = '/';
      model.Processing(false); /* end proses simpan / update*/
    }
  });
  model.Processing(false); /* for process cancel button  */
}

</script>
<div class="wrapper">
<section class="login-content">
   <div class="row m-0 align-items-center bg-white vh-100">
         <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
         <img src="../../assets/images/auth/05.png" class="img-fluid gradient-main animated-scaleX" alt="images">
      </div>
      <div class="col-md-6">
         <div class="row justify-content-center">
            <div class="col-md-10">
               <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
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
                     <h2 class="mb-2 text-center">Sign Up</h2>
                     <p class="text-center">Create your Hope UI account.</p>
                     <form data-bind="with: material">
                        <div class="row" data-bind="with: Recordmaterial">
                          <div class="col-lg-12">
                             <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" data-bind="value: name" placeholder=" ">
                             </div>
                          </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="username" class="form-label">Username</label>
                                 <input type="text" class="form-control" id="username" data-bind="value: username" placeholder=" ">
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="password" class="form-label">Password</label>
                                 <input type="password" class="form-control" id="password" data-bind="value: password" placeholder=" ">
                              </div>
                           </div>
                           <div class="col-lg-12 d-flex justify-content-center">
                              <div class="form-check mb-3">
                                 <input type="checkbox" class="form-check-input" id="customCheck1">
                                 <label class="form-check-label" for="customCheck1">I agree with the terms of use</label>
                              </div>
                           </div>
                        </div>
                        <div class="d-flex justify-content-center">
                           <button type="submit" data-bind="click:Regist" class="btn btn-primary">Sign Up</button>
                        </div>
                        <p class="mt-3 text-center">
                           Already have an Account <a href="/sigin" class="text-underline">Sign In</a>
                        </p>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="sign-bg sign-bg-right">
            <svg width="280" height="230" viewBox="0 0 421 359" fill="none" xmlns="http://www.w3.org/2000/svg">
               <g opacity="0.05">
                  <rect x="-15.0845" y="154.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -15.0845 154.773)" fill="#3A57E8"/>
                  <rect x="149.47" y="319.328" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 149.47 319.328)" fill="#3A57E8"/>
                  <rect x="203.936" y="99.543" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 203.936 99.543)" fill="#3A57E8"/>
                  <rect x="204.316" y="-229.172" width="543" height="77.5714" rx="38.7857" transform="rotate(45 204.316 -229.172)" fill="#3A57E8"/>
               </g>
            </svg>
         </div>
      </div>
   </div>
</section>
</div>
@stop
