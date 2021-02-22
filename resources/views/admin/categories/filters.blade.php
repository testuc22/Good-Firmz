<div class="admin-filters">
	<form action="" method="GET">
		<div class="row">
			<div class="form-group">
				<label>Name</label>
				<div>
					<input type="text" name="category_name">
				</div>
			</div>
			<div class="form-group">
				<label>Status</label>
				<div>
					<select name="status">
						<option value="">Select Status</option>
                        <option value="1">Show</option>
                        <option value="0">Hide</option>
                    </select>
				</div>
			</div>
			<div class="form-group">
				<label>Parent</label>
				<div>
					<select name="parent">
                        <option value="">Select Parent Category</option>
                        {!! $dropdown !!}
                    </select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label></label>
				<div>
					<input type="submit" name="search" value="Search">
				</div>
			</div>
		</div>
	</form>
</div>