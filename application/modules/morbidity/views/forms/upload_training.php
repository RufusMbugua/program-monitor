<?php
$formAttr = array('enctype' => 'multipart/form-data', 'name' => 'upload_form', 'id' => "morbidity_upload_form");
echo form_open('morbidity/upload', $formAttr);
?>
<label>Training Sign Sheet</label>
<?php echo form_error('training_sign_sheet'); ?>
<div class="input-group">
	<?php $btnAttr = array('id' => 'upload_button', 'class' => 'btn btn-default', 'name' => 'file_1');
	echo form_upload($btnAttr);
	?>
</div>
<input type="hidden" id="activity_id" name= "activity_id" value="1">
<?php echo form_close(); ?>