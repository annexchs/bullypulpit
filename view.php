<?php
defined('C5_EXECUTE') or die("Access Denied.");
?>


	<div id="central" class="no-sidebar">

		<div id="body">
			<?php
			Loader::element('system_errors', array('error' => $error));
			print $innerContent;
			?>
		</div>

		<div class="spacer">&nbsp;</div>
	</div>