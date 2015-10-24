<?php

if (!defined('FORUM')) exit;
define('FORUM_QJ_LOADED', 1);
$forum_id = isset($forum_id) ? $forum_id : 0;

?><form id="qjump" method="get" accept-charset="utf-8" action="http://localhost/punbb/viewforum.php">
	<div class="frm-fld frm-select">
		<label for="qjump-select"><span><?php echo $lang_common['Jump to'] ?></span></label><br />
		<span class="frm-input"><select id="qjump-select" name="id">
			<optgroup label="RealMadrid">
				<option value="2"<?php echo ($forum_id == 2) ? ' selected="selected"' : '' ?>>Komanda</option>
			</optgroup>
			<optgroup label="Test category">
				<option value="1"<?php echo ($forum_id == 1) ? ' selected="selected"' : '' ?>>Test forum</option>
			</optgroup>
		</select>
		<input type="submit" id="qjump-submit" value="<?php echo $lang_common['Go'] ?>" /></span>
	</div>
</form>
<?php

$forum_javascript_quickjump_code = <<<EOL
(function () {
	var forum_quickjump_url = "http://localhost/punbb/viewforum.php?id=$1";
	var sef_friendly_url_array = new Array(2);
	sef_friendly_url_array[2] = "komanda";
	sef_friendly_url_array[1] = "test-forum";

	PUNBB.common.addDOMReadyEvent(function () { PUNBB.common.attachQuickjumpRedirect(forum_quickjump_url, sef_friendly_url_array); });
}());
EOL;

$forum_loader->add_js($forum_javascript_quickjump_code, array('type' => 'inline', 'weight' => 60, 'group' => FORUM_JS_GROUP_SYSTEM));
?>
