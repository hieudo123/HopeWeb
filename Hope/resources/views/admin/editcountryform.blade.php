@extends('layout.admin')
@section('header_text','Edit Country')
@section('content')
<div class="col-xs-12">					
	<!-- PAGE CONTENT BEGINS -->
	<form class="form-horizontal" role="form" action="{{ route('update',['id'=>$data->id]) }}" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Country Code </label>

			<div class="col-sm-9">
				<input type="text" value="{{ $data->country_code }}" id="form-field-1" placeholder="Country Code" class="col-xs-10 col-sm-5" name="txtCountryCode">
				<p> <font color="red">{{ $errors->first('txtCountryCode') }}</font></p>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Country Name </label>

			<div class="col-sm-9">
				<input type="text" value="{{ $data->country_name  }}" id="form-field-1-1" placeholder="Country Name" class="col-xs-10 col-sm-5" name="txtCountryName">
				<p><font color="red">{{ $errors->first('txtCountryName') }}</font></p>
			</div>
		</div>
		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
				<input class="btn btn-info" type="submit" name="btnCreate" value="Edit">
				&nbsp; &nbsp; &nbsp;
				<button class="btn" type="reset">
					<i class="ace-icon fa fa-undo bigger-110"></i>
					Reset
				</button>
			</div>
		</div>

		<div class="hr hr-24"></div>

		<div class="row">
			<!-- /.span -->

			<!-- /.span -->

			<!-- /.span -->
		</div><!-- /.row -->
		<!-- /.row -->
	</form>
	<!-- PAGE CONTENT ENDS -->
</div>
@stop