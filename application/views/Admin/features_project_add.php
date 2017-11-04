<ul class="breadcrumb">
	<li>
		<a href="<?php echo base_url(); ?>admin/welcome">Home</a>
	</li>
	<li>
		<a href="#">Project</a>
	</li>
</ul>
</div>

<div class="row">
	<div class="box col-md-12">
		<div class="box-inner homepage-box" style="height: 1050px;">
			<div class="box-header well">
				<h2><i class="glyphicon glyphicon-th"></i> Tabs</h2>

			</div>
			<div class="box-content">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a href="#info">NewBanner</a></li>
					<li><a href="#custom">BannerList</a></li>
				</ul>

				<div id="myTabContent" class="tab-content">
					<div class="tab-pane active" id="info">
						<h3>Benner
							<small>Create New Banner</small>
						</h3>
						<?php if($this->session->flashdata('error_log')): ?>
							<div class="alert alert-danger">
								<?php echo $this->session->flashdata('error_log'); ?>
							</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('success_log')): ?>
							<div class="alert alert-success">
								<?php echo $this->session->flashdata('success_log'); ?>
							</div>
						<?php endif; ?>
						<?php echo form_open_multipart('admin/manage_banner'); ?>							
						<div class="form-group col-md-6 text-center">
							<label for="txtProjectTitle">Project Title</label>
							<input type="text" name="txtProjectTitle" id="txtProjectTitle" placeholder="Enter Project Title">
						</div>
						<div class="form-group col-md-6 text-center">
							<label for="txtPrice">Price</label>
							<input type="text" name="txtPrice" id="txtPrice" placeholder="Enter Project Price">
						</div>
						<div class="form-group col-md-6 text-center">
							<label for="txtProjectLocation">Project Location</label>
							<input type="text" name="txtProjectLocation" id="txtProjectLocation" placeholder="Enter Project Location">
						</div>
						<div class="form-group col-md-6 text-center">
							<label for="txtPropertyType">Property Type</label>
							<input type="text" name="txtPropertyType" id="txtPropertyType" placeholder="Enter Project Type">
						</div>
						<div class="form-group col-md-6 text-center">
							<label for="txtBuiltUp">Built Up</label>
							<input type="text" name="txtBuiltUp" id="txtBuiltUp" placeholder="Enter Project Built Up">
						</div>
						<div class="form-group col-md-12 text-center">

						</div>

						<? echo form_close(); ?>

					</div>
					<div class="tab-pane" id="custom">
						<h3>List
							<small>Get All Banner</small>
						</h3>
						<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
							<thead>
								<tr>
									<th>Image</th>
									<th>Added By </th>
									<th>Added Date Time</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($bannerlist as $object):?>
									<tr>
										<td><img src="<?php echo base_url(); ?>assets/media-demo/banner/<?php echo $object->baner_url; ?>" height="150px"/></td>
										<td><?php echo $object->update_by; ?></td>
										<td><?php echo $object->create_at; ?></td>
										<td><a class="btn btn-danger" href="<?php echo base_url();?>admin/deletebanner/<?php echo $object->baner_id; ?>/<?php echo $object->baner_url; ?>">Delete</a></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!--/span-->
	<!--/span-->
</div>
<script>
	function getDiscount(){
		//alert()
		var retailPrice=document.getElementById("txtRetailPrice").value;
		var sellingPrice=document.getElementById("txtSellingPrice").value;

		
		var result=sellingPrice/retailPrice;
		var result=result*100;

		document.getElementById("txtDiscount").value=100-Math.floor(result);
	}
</script>