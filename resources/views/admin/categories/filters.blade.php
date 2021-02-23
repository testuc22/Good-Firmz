<div class="admin-filters">
	<form action="" method="GET">
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label>Name</label>
					<div>
						<input type="text" name="category_name" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Status</label>
					<div>
						<select name="status" class="form-control">
							<option value="">Select Status</option>
	                        <option value="1">Show</option>
	                        <option value="0">Hide</option>
	                    </select>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Parent</label>
					<div>
						<select name="parent" class="form-control">
	                        <option value="">Select Parent Category</option>
	                        {!! $dropdown !!}
	                    </select>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label> </label>
					<div style="margin-top: 7px;">
						<input type="submit" name="search" class="btn btn-primary" value="Search">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>