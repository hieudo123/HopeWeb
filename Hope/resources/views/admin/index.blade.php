@extends('layout.admin')
@section('content')
<div class="col-xs-12">
	<a class="btn btn-xs btn-success" href="{{ route('create') }}">
		Add Country
	</a>
</div>
<div class="col-xs-12">
	<table id="simple-table" class="table  table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace">
						<span class="lbl"></span>
					</label>
				</th>
				<th>Id</th>
				<th class="detail-col">Country_code</th>
				<th>Country_name</th>
				<th></th>
			</tr>	
		</thead>

		<tbody>
			@foreach($countries as $item)
			<tr>
				<td class="center">
					<label class="pos-rel">
						<input value="{{ $item->id }}" type="checkbox" class="ace">
						<span class="lbl"></span>
					</label>
				</td>

				<td class="center">
					{{ $item->id }}
				</td>
		
				<td>
					{{ $item->country_code }}
				</td>
				<td>
					{{ $item->country_name }}
				</td>
				<td>
					<div class="hidden-sm hidden-xs btn-group">
						<button class="btn btn-xs btn-success">
							<i class="ace-icon fa fa-check bigger-120"></i>
						</button>

						<a class="btn btn-xs btn-info" href="{{ route('edit',['id'=>$item->id])  }}">
							<i class="ace-icon fa fa-pencil bigger-120"></i>
						</a>
						<a class="btn btn-xs btn-danger" href="{{ route('delete',['id'=>$item->id])  }}">
							<i class="ace-icon fa fa-trash-o bigger-120"></i>
						</a>
						<button class="btn btn-xs btn-warning">
							<i class="ace-icon fa fa-flag bigger-120"></i>
						</button>
					</div>

					<div class="hidden-md hidden-lg">
						<div class="inline pos-rel">
							<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
								<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
							</button>

							<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
								<li>
									<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
										<span class="blue">
											<i class="ace-icon fa fa-search-plus bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
										<span class="green">
											<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
										<span class="red">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop
@section('js')
<script>
	$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				

</script>
@stop