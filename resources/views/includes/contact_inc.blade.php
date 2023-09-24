<section class="contact_us_section">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<h5>Contact Us</h5>
                <h6>Send us a Message</h6>
				<hr class="hr_default">
                <p ng-bind-html="includes.global.one[0]['contact']['collections']['contact_edit']['en']"></p>
			</div>
			<div class="col-md-7">
        		<form name="sentMessage" id="contactForm" class="sub_secti_last">
					<div class="row">
						<div class="col-md-6 small_padding-lr">
							<input type="text" name="name" id="" placeholder="Given Name" required>
							<input type="text" name="lname" id="" placeholder="Last name">
							<input type="email" name="email" id="" placeholder="Email" required>
						</div>
						<div class="col-md-6 small_padding-lr">
							<textarea id="" placeholder="Message" name="message"></textarea>
						</div>
						<div class="col-md-12 no_padding">
							<button type="submit" class="btn default_button default_button_white">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>