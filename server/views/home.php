<div class="row">
	<div class="left col s7">
		<h2>Cinemanager</h2>
		<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus consectetur exercitationem, quo quis laboriosam voluptatem tenetur, natus deserunt, ex iure nostrum ab autem? Dolor, repellendus et iusto molestias at expedita!</p>
	</div>
	<div class="right col s5">
		<h2>Sign Up</h2>
		<p class="flow-text">It's free &amp; fast!</p>
		
  <div class="row">
    <form id="form-signup" class="col s12" METHOD="POST">
      <div class="row">
        <div class="input-field col s6">
          <input type="text" name="first_name" class="validate">
          <label for="first_name" data-error="wrong">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" name="last_name" type="text" class="validate">
          <label for="last_name" data-error="wrong">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="login" id="login" class="validate">
          <label for="login" data-error="wrong">Email or phone number</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="confirmLogin" id="confirm" class="validate">
          <label for="confirm" data-error="wrong">Confirm email or phone number</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate">
          <label for="password" data-error="wrong">Password</label>
        </div>
      </div>
      <div class="input-field col s4">
	    <select name="birthdate_month">
	      <option value="" disabled selected>Month</option>
	      <?php 
	      for($i=1; $i<=12; $i++)
	      	if($i<10)
		      	echo '
					<option value="0'.$i.'">0'.$i.'</option>
		      	';
		    else
		    	echo '
					<option value="'.$i.'">'.$i.'</option>
		      	';
	      ?>
	    </select>
	  </div>
	  <div class="input-field col s4">
	    <select name="birthdate_day">
	      <option value="" disabled selected>Day</option>
	      <?php 
	      for($i=1; $i<=31; $i++)
	      	if($i<10)
		      	echo '
					<option value="0'.$i.'">0'.$i.'</option>
		      	';
		    else
		    	echo '
					<option value="'.$i.'">'.$i.'</option>
		      	';
	      ?>
	    </select>
	  </div>
	  <div class="input-field col s4">
	    <select name="birthdate_year">
	      <option value="" disabled selected>Year</option>
	      <?php 
	      for($i=2016; $i>=1925; $i--)
	      	echo '
				<option value="'.$i.'">'.$i.'</option>
	      	';
	      ?>
	    </select>
	  </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="radio" name="gender" id="male" class="validate" value="0">
          <label for="male">Male</label>
          <input type="radio" name="gender" id="female" class="validate" value="1">
          <label for="female">Female</label>
        </div>
      </div>
      <div class="row">
	      	<div class="input-field col s12">
	      		<input type="checkbox" name="sign-accept" id="sign-accept" />
		        <label for=sign-accept>
		        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis explicabo harum sed delectus <a href="#">totam quasi</a> architecto.
		        </label>
	    	</div>
      </div>
      <div class="row">
      	<div class="input-field col s12">
      		<button id="newUser" class="waves-effect waves-teal btn-flat btn-large teal white-text">Create new account</button>
      	</div>
      </div>

    </form>
  </div>
        
	</div>
</div>
