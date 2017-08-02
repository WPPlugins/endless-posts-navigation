<?php global $epn_data; ?>
<div class="wrap epn_settings_div">
<?php

	if(
			!empty($_POST) 
		&& 
			isset($_POST['epn_settings'])
		&&
			!empty($_POST['epn_settings'])
	) {

		update_option('epn_settings', $_POST['epn_settings']);

	}
	
?>	

        

<div class="icon32" id="icon-options-general"><br></div><h2>Endless Posts Navigation <?php echo '('.$epn_data['Version'].')'; ?> - Settings</h2>


<h3>Use the following codes for the files:</h3>
<ol>
<li>single.php</li>
<li>content-page.php</li>
<li>and any custom post page you have...</li>
</ol>
<p>Note: It automatically sense the post type where it is implemented and provide the endless navigation from the same taxonomy/category. You don't need to worry about its order. It automatically manage alphabetical order for next and previous navigation.</p>
<form action="" method="post">

<div class="epn_input">
<input type="text" name="epn_settings[prev_text]" value="<?php echo epn_get('prev_text'); ?>" placeholder="Previous" />
<label for="enable_post_titles"><input value="1" <?php echo (epn_get('enable_post_titles')==1?'checked="checked"':''); ?> id="enable_post_titles" type="checkbox" name="epn_settings[enable_post_titles]" />Click here to enable post titles instead of "previous" & "next".</label>
<input type="text" class="next_text" name="epn_settings[next_text]" value="<?php echo epn_get('next_text'); ?>" placeholder="Next" />
</div>
<div class="epn_submit">
<input type="submit" value="Save Changes" />
</div>
</form>

<ol class="epn_methods">
<li>
<span>Method-1</span>
<code>&lt;?php epn_prev_post_link(true); ?&gt; 
</code>
<div class="epn_plus">+</div>
<code>
&lt;?php epn_next_post_link(true); ?&gt;
</code>
</li>
<li>
<span>Method-2</span>

<code style="text-align:left">
&lt;div class=&quot;epn_nav&quot;&gt;<br />
&lt;div class=&quot;epn_left&quot;&gt;<br />
&lt;?php epn_prev_post_link(true); ?&gt; <br />
&lt;/div&gt;&lt;div class=&quot;epn_right&quot;&gt;<br />
&lt;?php epn_next_post_link(true); ?&gt;  &lt;/div&gt;<br />
&lt;/div&gt; 
</code>
</li>
</ol>

 </div>