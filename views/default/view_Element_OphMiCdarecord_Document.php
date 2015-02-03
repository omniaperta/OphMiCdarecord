<?php
/**
 * @package  OpenEyes-OphMiCdarecord
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

?>

<div class="element-data">
	<div class="row data-row cda">
		<div class="large-12 column end"><div class="data-value"><iframe srcdoc='<?php echo $this->getHTMLCDA($element); ?>' scrolling="no" width="100%" onload="iframeLoaded(this);"> </iframe></div></div>
	</div>
</div>
<script type="text/javascript">
	function iframeLoaded(obj) {
		obj.height = "";
		obj.height = obj.contentWindow.document.body.scrollHeight + "px";
	}
</script>