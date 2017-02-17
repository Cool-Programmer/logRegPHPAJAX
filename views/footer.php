<footer class="footer">
	<p class="text-center">&copy; Rightless</p>
</footer>

<script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<!-- Modal -->
<div class="modal fade" id="loginSignupModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <input type="hidden" name="loginActive" id="loginActive" value="1">
          <ul class="alert alert-danger" style="display: none;" id="errors"></ul>
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" id="password" placeholder="Your Password" autocomplete="false" required>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
      	<a href="#" id="toggleLogin">Sign Up</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitForm">Login</button>
      </div>
    </div>
  </div>
</div>

<script>
	$('#toggleLogin').click(function(){
		if ($("#loginActive").val() == "1") {
			$("#loginActive").val("0");
			$("#loginModalTitle").html("Sign Up");
			$("#submitForm").html("Sign Up");
			$("#toggleLogin").html("Log In");

		}else if($("#loginActive").val() == "0"){
			$("#loginActive").val("1");
			$("#loginModalTitle").html("Login");
			$("#submitForm").html("Login");
			$("#toggleLogin").html("Sign Up");
		}
	});

	$('#submitForm').click(function(){
		let email = $("#email").val();
		let password = $("#password").val();
		let loginActive = $("#loginActive").val();

		$.ajax({
			type: "POST",
			url: "actions.php?action=loginSignup",
			data: "email="+email+"&password="+password+"&loginActive="+loginActive,
			success: function(result){
				if (result == "1") {
					window.location.assign("index.php");
				}else{
					$("#errors").html(result).slideDown();
				}
			}
		})
	})

</script>

</body>
</html>