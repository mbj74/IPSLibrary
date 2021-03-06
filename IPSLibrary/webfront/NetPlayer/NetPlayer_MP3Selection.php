<?php 
	/**@addtogroup netplayer
	 * @{
	 *
	 * @file          NetPlayer_MP3Selection.php
	 * @author        Andreas Brauneis
	 * @version
	 * Version 2.50.1, 31.01.2012<br/>
	 *
	 * File kann in das WebFront eingebunden werden (zB per iFrame) und ermöglicht die Navigation durch 
	 * Verzeichnisse mit MP3 Files.
	 *
	 */
	/** @}*/
?>
<html>
  <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="0">

		<link rel="stylesheet" type="text/css" href="NetPlayer.css" />
		<?
			IPSUtils_Include ("NetPlayer.inc.php", "IPSLibrary::app::modules::NetPlayer");
			include_once "NetPlayer_Sender.php";
			include_once "NetPlayer_Utils.php";
		?>
		<script  type="text/javascript">
			$(function(){$(".xxrc_mp_cdname").click(trigger_button);});
			$(function(){$(".xxrc_mp_cdnavi").click(trigger_button);});
			$(function(){$(".xxrc_mp_cdcat").click(trigger_button);});
		</script>
	</head>
  
	<body>
		<div id="containerSelection" class="containerSelection">
			<div id="containerControlLine0" class="containerControlLineBottom">
				<?php 
					$directoryList = array();
					$interpretList = array(); 
					$albumList     = array();
					NetPlayer_GetCDList (NP_COUNT_CDHTML, $directoryList, $interpretList, $albumList);
					
					foreach ($directoryList as $idx=>$directory) {
						echo '<div id="rc_cd'.$idx.'" class="containerControlButton containerControlSelect" ';
						echo '     cd_name="'.convert($directory).'">';
						echo '  <div class="containerControlSelectInterpret">'.convert($interpretList[$idx]).'</div>';
						echo '  <div class="containerControlSelectAlbum">'.convert($albumList[$idx]).'</div>';
						echo '</div>';
					}
				?>
			</div>

			<div id="containerControlLine2" class="containerControlLineSeparator"></div>

			<div id="containerControlLine8" class="containerControlLineTop">
				<div id="rc_mp_cdselectprev" class="containerControlButton"><<</div>
				<div id="rc_mp_cdselectnext" class="containerControlButton">>></div>
				<div id="rc_mp_cdselectback" class="containerControlButton">back</div>
				<?php 
					if (GetValue(NP_ID_CDCATEGORYNAME)<>"") echo '<div  id="rc_mp_cdselectroot" class="containerControlButton">Root</div>';
					$categoryList = NetPlayer_GetCategoryList();
					foreach ($categoryList as $idx=>$category) {
						echo '<div id="rc_cat'.$idx.'" class="containerControlButton" cd_cat="'.convert($category).'">'.str_replace('_','',$category).'</div>';
					}
				?>
			</div>
		 </div>
	</body>
</html>
