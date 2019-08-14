<form role="form" action="{{ route('register') }}" method="POST">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<fieldset>
		<label class="block clearfix">
			<span class="block input-icon input-icon-right">
				<input type="email" class="form-control" placeholder="Email" name="txtEmail" />
				<i class="ace-icon fa fa-envelope"></i>
			</span>
		</label>

		<label class="block clearfix">
			<span class="block input-icon input-icon-right">
				<input type="text" class="form-control" placeholder="Username" name="txtName" />
				<i class="ace-icon fa fa-user"></i>
			</span>
		</label>

		<label class="block clearfix">
			<span class="block input-icon input-icon-right">
				<input type="password" class="form-control" placeholder="Password" name="txtPassword" />
				<i class="ace-icon fa fa-lock"></i>
			</span>
		</label>

		<label class="block clearfix">
			<span class="block input-icon input-icon-right">
				<input type="password" class="form-control" placeholder="Repeat password" />
				<i class="ace-icon fa fa-retweet"></i>
			</span>
		</label>

		<label class="block">
			<input type="checkbox" class="ace" />
			<span class="lbl">
				I accept the
				<a href="#">User Agreement</a>
			</span>
		</label>

		<div class="space-24"></div>

		<div class="clearfix">
			<button type="reset" class="width-30 pull-left btn btn-sm">
				<i class="ace-icon fa fa-refresh"></i>
				<span class="bigger-110">Reset</span>
			</button>

			<button type="submit" class="width-65 pull-right btn btn-sm btn-success">
				<span class="bigger-110">Register</span>

				<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
			</button>
		</div>
	</fieldset>
</form>