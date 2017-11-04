<ul class="breadcrumb">
	<li>
		<a href="<?php echo base_url(); ?>admin/welcome">Home</a>
	</li>
	<li>
		<a href="#">About Us</a>
	</li>
</ul>
</div>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
						
<?php

//File Input Attribute
$fileImage=array(
	'name' => 'fileImage',
	'class' => 'form-control',
	'id' => 'fileImage',
	'required' => 'required'
);

//Button Submit Attribute
$buttonAttribute=array(
	'name' => 'btnSubmit',
	'value' => 'Update Background',
	'class' => 'btn btn-default btn-lg'
	);
?>
<div class="row">
	<div class="box col-md-12">
		<div class="box-inner homepage-box" style="height: 1050px;">
			<div class="box-header well">
				<h2><i class="glyphicon glyphicon-th"></i> Tabs</h2>

			</div>
			<div class="box-content">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a href="#info">Update About</a></li>
				</ul>

				<div id="myTabContent" class="tab-content">
					<div class="tab-pane active" id="info">
						<h3>About Us
							<small>Update About</small>
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
						<?php echo form_open_multipart('admin/manage_about'); ?>
						
							
								<!-- <div class="form-group col-md-12 text-center">
									<?php //echo form_label('Select Image', 'fileImage'); ?>
									<?php 
										//echo form_upload($fileImage);;
									 ?>
								</div> -->

								<div class="form-group col-md-12 text-center">
									<label for="txtScroller">Scroller Text</label>
									<input type="text" name="txtScroller" id="txtScroller" class="form-control" placeholder="Enter Scroller Text" required value="<?php echo $about_data[0]['scroll_text']; ?>">
									
								</div>

								<div class="form-group col-md-12 text-center">
									<label for="txtYoutubeURL">Youtube URL</label>
									<input type="text" name="txtYoutubeURL" id="txtYoutubeURL" class="form-control" placeholder="Enter Youtube URL" required value="<?php echo $about_data[0]['youtube_url']; ?>">
									
								</div>

								<div class="form-group col-md-12 text-center">
									<label for="txtAboutContent">Enter Content</label>
									<textarea name="txtAboutContent" class="col-sm-12" id="txtAboutContent" rows="10"><?php echo $about_data[0]['about_content']; ?></textarea>
									
								</div>

								<div class="form-group col-md-12 text-center">
								<?php
									
									echo form_submit($buttonAttribute);
								?>
								</div>

								<? echo form_close(); ?>

								<br><br/> <br>

							</div>
							<!-- <div class="tab-pane" id="custom">
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
							</div> -->
							
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