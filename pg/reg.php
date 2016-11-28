<style>

/* form starting stylings ------------------------------- */
.group            { 
  position:relative; 
  
}
input             {
  font-size:16px;
  padding:10px 10px 10px 5px;
  display:block;
  width: 100%;
  border:none;
  border-bottom:1px solid  rgba(0, 0, 0, .12)
}
.sele            {
  font-size:16px;
  padding:10px 10px 8px 5px;
  display:block;
  width: 100%;
  border:none;
  border-bottom:1px solid  rgba(0, 0, 0, .12)
}
input:focus ,select:focus         { outline:none; }

/* LABEL ======================================= */
.dypadin {margin-top: 28px;}
.group label                {
  color:rgba(0,0,0,.26); 
  font-size:14px;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:5px;
  top:14px;
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}
.padinbtt {    margin-bottom: 15px;}

/* active state */
input:focus ~ label, input:valid ~ label,select:focus ~ label, select:valid ~ label        {
  top:-20px;
  font-size:14px;
  color:#5264AE;
}
select:blank ~ label, select ~ label        {
  top:0px;
}

/* BOTTOM BARS ================================= */
.bar    { position:relative; display:block; width:100% }
.bar:before, .bar:after     {
  content:'';
  height:2px; 
  width:0;
  bottom:1px; 
  position:absolute;
  background:#5264AE; 
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}
.bar:before {
  left:50%;
}
.bar:after {
  right:50%; 
}

/* active state */
input:focus ~ .bar:before, input:focus ~ .bar:after,select:focus ~ .bar:before, select:focus ~ .bar:after {
  width:50%;
}

/* HIGHLIGHTER ================================== */
.highlight {
  position:absolute;
  height:60%; 
  width:100px; 
  top:25%; 
  left:0;
  pointer-events:none;
  opacity:0.5;
}

/* active state */
input:focus ~ .highlight,select:focus ~ .highlight {
  -webkit-animation:inputHighlighter 0.3s ease;
  -moz-animation:inputHighlighter 0.3s ease;
  animation:inputHighlighter 0.3s ease;
}

/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
    from { background:#5264AE; }
  to    { width:0; background:transparent; }
}
@-moz-keyframes inputHighlighter {
    from { background:#5264AE; }
  to    { width:0; background:transparent; }
}
@keyframes inputHighlighter {
    from { background:#5264AE; }
  to    { width:0; background:transparent; }
}
.mdl-r {
    background: rgb(255,64,129) !important;
	color:#fff
}.mdl-button--fab.mdl-button--colored:hover {
    background-color: rgb(255,64,129);
	color:#fff
}
.mdl-textfield.is-invalid .mdl-textfield__label {
    color: #de3226;
}
.mdl-textfield.is-invalid .mdl-textfield__input {
    border-bottom: 1px solid #de3226;
}
</style><div class="mdl-grid"><div class="mdl-cell mdl-cell--8-col mdl-card  mdl-shadow--2dp" style="padding:15px;">
<!-- Simple Textfield -->
<h4>Get Started - It's free</h4>
<hr class="soften" />
<form id="frm" name="aa" enctype="application/x-www-form-urlencoded" >


<div class="mdl-grid ind">
  <div style="margin-left:0px;" ng-class='{"is-invalid":aa.fname.$invalid && aa.fname.$touched}' class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col">
    <input class="mdl-textfield__input mdl-bord" name="fname" ng-model="user.fname" type="text"  ng-required="true"    ng-minlength="3" pattern="[A-Z,a-z, ]*">
    <label class="mdl-textfield__label" for="sample3">First Name</label>
    <span class="mdl-textfield__error"  ng-show="aa.fname.$pristine && aa.fname.$invalid">First name must not be empty!</span>
	<span class="mdl-textfield__error"  ng-show="aa.fname.$dirty && aa.fname.$invalid">First Should contains only alphabets!</span>
  </div>
  <div style="margin-right:0px;width:50%;" ng-class='{"is-invalid":aa.lname.$invalid && aa.lname.$touched}' class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col">
    <input class="mdl-textfield__input mdl-bord" name="lname" ng-model="user.lname"  ng-required="true"  type="text" id="lname" ng-minlength="3" pattern="[A-Z,a-z, ]*">
    <label class="mdl-textfield__label" for="sample3">Last Name</label>
    <span class="mdl-textfield__error" ng-show="aa.lname.$pristine && aa.lname.$invalid">Last name should not be empty</span>
	<span class="mdl-textfield__error"  ng-show="aa.lname.$dirty && aa.lname.$invalid">Last name Should contains only alphabets!</span>
  </div>
  </div>                  
<div class="mdl-grid">


<div class="mdl-cell mdl-cell--5-col" style="padding-top:20px;font-weight:bold;color:#ccc;">
<label >Select Patient Gender</label>
</div>
<div class="mdl-cell mdl-cell--7-col"   >
<div id="ind1" style="display:inline-block;margin:0px 20px" ng-click="user.gender=1"><input type="radio" hidden="1" name="gender" ng-model="user.gender" ng-value="1" required />
<div style="display:block;padding:10px;"><button id="i1" type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect  "  ng-class='{"mdl-r":user.gender==1}'>
<i class="fa fa-male" aria-hidden="true"></i>
</button></div>
<div align="center">Male</div>
</div>


<div id="biz1" style="display:inline-block;"  ng-click="user.gender=2">
<input type="radio" ng-model="user.gender" value="2" name="gender"  hidden="1" required />
<div style="display:block;padding:10px;"><button id="b1"  type="button"  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect"  ng-class='{"mdl-r":user.gender==2}'>
<i class="fa fa-female" aria-hidden="true"></i>
</button></div>
<div  align="center">Female</div>
</div>
</div>

</div>

  <div class="mdl-grid ind">
  <div  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col" ng-class='{"is-invalid":aa.dob.$invalid && aa.dob.$touched}'>
    <input onfocus="(this.type='date')" onfocusout="(this.type='text')" ng-change='AgeFunction()' class="mdl-textfield__input mdl-bord" name="dob" ng-model="user.dob" type="text"  ng-required="true"  >
    <label class="mdl-textfield__label" for="sample3">Date of Birth</label>
    <span class="mdl-textfield__error"  ng-show="aa.dob.$pristine && aa.dob.$invalid">DOB name must not be empty!</span>
	<span class="mdl-textfield__error"  ng-show="aa.dob.$dirty && aa.dob.$invalid">First Should not contains alphabets!</span>
  </div>
  <div  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col" ng-class='{"is-invalid":aa.age.$invalid && aa.age.$touched}'>
    <input class="mdl-textfield__input mdl-bord" name="age" ng-value="{{ user.dob | ageFilter }}" ng-model="user.age"  ng-required="true"  type="text" id="lname">
    <label class="mdl-textfield__label" for="sample3">Age</label>
  </div>
  </div>     

  <div class="mdl-grid ind">
  <div  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col" ng-class='{"is-invalid":aa.amobile.$invalid && aa.amobile.$touched}'>
    <input class="mdl-textfield__input mdl-bord" name="amobile" ng-model="user.mobile1" type="text"  ng-required="true"    ng-minlength="10" pattern="[0-9]*">
    <label class="mdl-textfield__label" for="sample3">Mobile</label>
 <span class="mdl-textfield__error"  ng-show="aa.amobile.$pristine && aa.amobile.$invalid">Mobile must not be empty!</span>
	<span class="mdl-textfield__error"  ng-show="aa.amobile.$dirty && aa.amobile.$invalid">Only numbers are allowed!</span>
  </div>
  <div  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col" ng-class='{"is-invalid":aa.bmobile.$invalid && aa.bmobile.$touched}'>
    <input class="mdl-textfield__input mdl-bord" name="bmobile" ng-model="user.mobile2"  ng-required="true"  type="text" id="lname" pattern="[0-9]*">
    <label class="mdl-textfield__label" for="sample3">Alternate Mobile</label>
     <span class="mdl-textfield__error"  ng-show="aa.bmobile.$pristine && aa.bmobile.$invalid">Alternative Mobile must not be empty!</span>
	<span class="mdl-textfield__error"  ng-show="aa.bmobile.$dirty && aa.bmobile.$invalid">Only numbers are allowed!</span>
  </div>
  </div>      

  <div class="mdl-grid ind" >
  <div  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col" ng-class='{"is-invalid":aa.desc.$invalid && aa.desc.$touched}'>
    <textarea class="mdl-textfield__input mdl-bord" name="desc" ng-model="user.desc" type="text"  ng-required="true"    ng-minlength="25" ></textarea>
    <label class="mdl-textfield__label" for="sample3">Description</label>
    <span class="mdl-textfield__error" ng-show="aa.desc.$pristine && aa.desc.$invalid">Description should not be empty!.</span>
	<span class="mdl-textfield__error"  ng-show="aa.desc.$dirty && aa.desc.$invalid">Description Should contains only alphabets!</span>
  </div>
 
  </div>   
  
<!---contacts --->
   
  <!-- --->

<!--- ---->
<!--contacts end--->
</div>
<div class="mdl-cell mdl-cell--4-col ">
  
 <div>
<button type="submit" ng-click="add()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  mdl-button--colored mdl-cell mdl-cell--12-col">Add patient</button>

  </div>
          
</div>
</div>
</form>
<script>
(function($){
	$(function(){	
      $('#cat,#scat').selectize({
    persist: false,
    createOnBlur: true,
    create: true
});
	//$('.biz').hide();

})
})(jQuery);
</script>