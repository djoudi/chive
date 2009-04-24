<?php CHtml::$idPrefix = 'r' . substr(md5(microtime()), 0, 3); ?>
<?php if($isSubmitted && !$schema->isNewRecord): ?>
	<script type="text/javascript">
	var idPrefix = '<?php echo CHtml::$idPrefix; ?>';
	var row = $('#' + idPrefix).closest("tr").prev();
	row.effect("highlight", {}, 2000);
	row.find("td dfn.collation").html("<?php echo $schema->DEFAULT_COLLATION_NAME; ?>").attr("title", "<?php echo Collation::getDefinition($schema->DEFAULT_COLLATION_NAME); ?>");
	$('#' + idPrefix).parent().slideUp(500, function() {
		$('#' + idPrefix).parents("tr").remove();
	});
	</script>
<?php endif; ?>

<?php echo CHtml::form('', 'post', array('id' => CHtml::$idPrefix)); ?>
	<h1>
		<?php echo Yii::t('database', ($schema->isNewRecord ? 'addSchema' : 'editSchema')); ?>
	</h1>
	<?php echo CHtml::errorSummary($schema, false); ?>
	<fieldset style="float: left; width: 200px">
		<legend><?php echo CHtml::activeLabel($schema,'SCHEMA_NAME'); ?></legend>
		<?php echo CHtml::activeTextField($schema, 'SCHEMA_NAME', ($schema->isNewRecord ? array() : array('disabled' =>  true))); ?>
	</fieldset>
	<fieldset style="float: left; width: 200px">
		<legend><?php echo CHtml::activeLabel($schema,'DEFAULT_COLLATION_NAME'); ?></legend>
		<?php echo CHtml::activeDropDownList($schema, 'DEFAULT_COLLATION_NAME', CHtml::listData($collations, 'COLLATION_NAME', 'COLLATION_NAME', 'collationGroup')); ?>
	</fieldset>
	<div style="clear: left; padding-top: 5px">
		<?php echo CHtml::submitButton(Yii::t('action', ($schema->isNewRecord ? 'create' : 'save')), array('class'=>'icon save')); ?>
		<?php echo CHtml::button(Yii::t('action', 'cancel'), array('class'=>'icon delete', 'onclick'=>'$(this.form).slideUp(500, function() { $(this).parents("tr").remove(); })')); ?>
	</div>
</form>