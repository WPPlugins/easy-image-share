<div class="wrap">
<h2>Easy Image Share</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<h3>Allow HTML textarea after a post with an image?</h3>
<p>Selecting "No" will disable the HTML textarea from being added into the end of a post.</p>
<p><input type="radio" name="eisallowhtml" id="eisallowhtml" value="yes" <?PHP if(get_option('eisallowhtml') == "yes") { echo 'checked="checked"}'; } ?> > Yes &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="eisallowhtml" id="eisallowhtml" value="no" <?PHP if(get_option('eisallowhtml') == "no") { echo 'checked="checked"}'; } ?> > No</p>

<h3>Allow BB Code textarea after a post with an image?</h3>
<p>Selecting "No" will disable the BB code textarea from being added into the end of a post.</p>
<p><input type="radio" name="eisallowbb" id="eisallowbb" value="yes" <?PHP if(get_option('eisallowbb') == "yes") { echo 'checked="checked"}'; } ?> > Yes &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="eisallowbb" id="eisallowbb" value="no" <?PHP if(get_option('eisallowbb') == "no") { echo 'checked="checked"}'; } ?> > No</p>


</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="eisallowhtml,eisallowbb" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
