<?php
/**
 * Modern skin, derived from monobook template.
 *
 * @todo document
 * @addtogroup Skins
 */

if( !defined( 'MEDIAWIKI' ) )
	die( -1 );

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @addtogroup Skins
 */
class SkinElgg extends SkinTemplate {
	function initPage( &$out ) {
		SkinTemplate::initPage( $out );
		$this->skinname  = 'elgg';
		$this->stylename = 'elgg';
		$this->template  = 'ElggTemplate';
	}
}

/**
 * @todo document
 * @addtogroup Skins
 */
class ElggTemplate extends QuickTemplate {
	/**
	 * Template filter callback for Modern skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {
		global $wgUser;
		$skin = $wgUser->getSkin();

		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="<?php $this->text('xhtmldefaultnamespace') ?>" <?php 
	foreach($this->data['xhtmlnamespaces'] as $tag => $ns) {
		?>xmlns:<?php echo "{$tag}=\"{$ns}\" ";
	} ?>xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
	<head>
		<meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
		<?php $this->html('headlinks') ?>
		<title><?php $this->text('pagetitle') ?></title>
		<style type="text/css" media="screen, projection">/*<![CDATA[*/
			@import "<?php $this->text('stylepath') ?>/common/shared.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";
			@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/main.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";
		/*]]>*/</style>
		<link rel="stylesheet" type="text/css" <?php if(empty($this->data['printable']) ) { ?>media="print"<?php } ?> href="<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/print.css?<?php echo $GLOBALS['wgStyleVersion'] ?>" />
		<!--[if lt IE 7]><meta http-equiv="imagetoolbar" content="no" /><![endif]-->
		
		<?php print Skin::makeGlobalVariablesScript( $this->data ); ?>
                
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath' ) ?>/common/wikibits.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"><!-- wikibits js --></script>
		<!-- Head Scripts -->
<?php $this->html('headscripts') ?>
<?php	if($this->data['jsvarurl'  ]) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl'  ) ?>"><!-- site js --></script>
<?php	} ?>
<?php	if($this->data['pagecss'   ]) { ?>
		<style type="text/css"><?php $this->html('pagecss'   ) ?></style>
<?php	}
		if($this->data['usercss'   ]) { ?>
		<style type="text/css"><?php $this->html('usercss'   ) ?></style>
<?php	}
		if($this->data['userjs'    ]) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs' ) ?>"></script>
<?php	}
		if($this->data['userjsprev']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>"><?php $this->html('userjsprev') ?></script>
<?php	}
		if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>
<style>
/*-----------------------------
	GLOBAL HEADER #00acf7
-----------------------------*/
#globalheader_wrapper {background-color:#00acf7; width: 100%;height: 30px;margin-left: auto;margin-right: auto;}
#globalheader {position:relative;width: 970px;margin-left: auto;margin-right: auto;}
#globalheader ul  {float:right; margin: 5px 0 0 0px;}
#globalheader li  {display:inline;list-style-type:none;padding: 0 0 0 30px;}
#globalheader li a {font-weight: normal;}
#globalheader li a.selected {font-weight: bold;}
/*.header {color: #f1f1f1;}*/
.header {color: black;}
.header:hover {color:black;text-decoration: none;}
.header.selected {color: white; font-weight: bold;}
</style>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20121988-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

	</head>
<body <?php if($this->data['body_ondblclick']) { ?>ondblclick="<?php $this->text('body_ondblclick') ?>"<?php } ?>
<?php if($this->data['body_onload'    ]) { ?>onload="<?php     $this->text('body_onload')     ?>"<?php } ?>
 class="mediawiki <?php $this->text('nsclass') ?> <?php $this->text('dir') ?> <?php $this->text('pageclass') ?>">


<div id="globalheader_wrapper">
	<div id="globalheader">
	<ul>
		<li><a href="http://elgg.org/index.php" target="_top" class="header">Home</a></li>
		<li><a href="http://elgg.org/about.php" target="_top" class="header">About</a></li>
		<li><a href="http://community.elgg.org" class="header" target="_top">Community</a></li>
		<li><a href="http://docs.elgg.org" class="header selected" target="_top">Docs</a></li>
		<li><a href="http://elgg.org/hosting.php" class="header" target="_top">Hosting</a></li>
		<li><a href="http://elgg.org/download.php" target="_top" class="header">Download</a></li>
	</ul>
	</div>
</div>
<div id="layout_header">
<div id="wrapper_header" style="text-align:left;width:950px;margin:auto;">
	<!-- <h1><?php echo $vars['config']->sitename; ?></h1> --> 
	<div id="logo"><img src="http://elgg.org/images/elgg_small.png" width="140px" border="0" alt="Elgg blog" /></div>
</div><!-- /#wrapper_header -->
</div><!-- /#layout_header -->
<div id="page-contents"><!-- start of page contents -->

<div id="personal_tools">
		<ul>
		<?php 	foreach($this->data['personal_urls'] as $key => $item) { ?>
				<li id="pt-<?php echo Sanitizer::escapeId($key) ?>"<?php
					if ($item['active']) { ?> class="active"<?php } ?>><a href="<?php
				echo htmlspecialchars($item['href']) ?>"<?php echo $skin->tooltipAndAccesskey('pt-'.$key) ?><?php
				if(!empty($item['class'])) { ?> class="<?php
				echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
				echo htmlspecialchars($item['text']) ?></a></li>
		<?php	} ?>
		</ul>
	</div>

<div id="column-content">
		<a name="top" id="top"></a>
		<?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
		<h1 class="firstHeading"><?php $this->data['displaytitle']!=""?$this->html('title'):$this->text('title') ?></h1>
		<div id="bodyContent">
			<!-- <h3 id="siteSub"><?php $this->msg('tagline') ?></h3> -->
			<!-- <div id="contentSub"><?php $this->html('subtitle') ?></div> -->
			<?php if($this->data['undelete']) { ?><div id="contentSub2"><?php     $this->html('undelete') ?></div><?php } ?>
			<?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
			<!-- <?php if($this->data['showjumplinks']) { ?><div id="jump-to-nav"><?php $this->msg('jumpto') ?> <a href="#column-one"><?php $this->msg('jumptonavigation') ?></a>, <a href="#searchInput"><?php $this->msg('jumptosearch') ?></a></div><?php } ?> -->
			<!-- start content -->
			<?php $this->html('bodytext') ?>
			<?php if($this->data['catlinks']) { ?><div id="catlinks"><?php       $this->html('catlinks') ?></div><?php } ?>
			<!-- end content -->
			<div class="visualClear"></div>
		</div>
</div><!-- end of column-content -->

<div id="column-one">

	<div class='portlet'>
		<h3>Navigation</h3>
		<ul>                     
			<li><a href="http://docs.elgg.org/wiki/Main_Page">Documentation front page</a></li>
			<li><a href="http://docs.elgg.org/wiki/Special:Recentchanges">Recent changes</a></li>     
           	</ul>
	</div>
       <div class="portlet">
	<h3>Search docs</h3>
	<div id="searchBody">
			<form action="<?php $this->text('searchaction') ?>" id="searchform"><div>
				<input id="searchInput" name="search" type="text" <?php
					if($this->haveMsg('accesskey-search')) {
						?>accesskey="<?php $this->msg('accesskey-search') ?>"<?php }
					if( isset( $this->data['search'] ) ) {
						?> value="<?php $this->text('search') ?>"<?php } ?> />
				<input type='submit' name="go" class="searchButton" id="searchGoButton"	value="<?php $this->msg('searcharticle') ?>" />&nbsp;
				<!-- <input type='submit' name="fulltext" class="searchButton" id="mw-searchButton" value="<?php $this->msg('searchbutton') ?>" /> -->
			</div>
			</form>
        	</div>   
	</div>
	<div id="p-cactions" class="portlet">
		<h3><?php $this->msg('views') ?></h3>
		<div class="pBody">
			<ul>
	<?php			foreach($this->data['content_actions'] as $key => $tab) { ?>
					 <li id="ca-<?php echo Sanitizer::escapeId($key) ?>"<?php
					 	if($tab['class']) { ?> class="<?php echo htmlspecialchars($tab['class']) ?>"<?php }
					 ?>><a href="<?php echo htmlspecialchars($tab['href']) ?>"><?php
					 echo htmlspecialchars($tab['text']) ?></a></li>
	<?php			 } ?>
			</ul>
		</div>
	</div>

	<div class="portlet" id="p-tb">
	<?php if($this->data['loggedin']) { ?>
		<h3><?php $this->msg('toolbox') ?></h3>
		<div class="pBody">
			<ul>
<?php
		if($this->data['notspecialpage']) { ?>
				<li id="t-whatlinkshere"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['whatlinkshere']['href'])
				?>"><?php $this->msg('whatlinkshere') ?></a></li>
<?php
			if( $this->data['nav_urls']['recentchangeslinked'] ) { ?>
				<li id="t-recentchangeslinked"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['recentchangeslinked']['href'])
				?>"><?php $this->msg('recentchangeslinked') ?></a></li>
<?php 		}
		}
		if(isset($this->data['nav_urls']['trackbacklink'])) { ?>
			<li id="t-trackbacklink"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['trackbacklink']['href'])
				?>"><?php $this->msg('trackbacklink') ?></a></li>
<?php 	}
		if($this->data['feeds']) { ?>
			<li id="feedlinks"><?php foreach($this->data['feeds'] as $key => $feed) {
					?><span id="feed-<?php echo Sanitizer::escapeId($key) ?>"><a href="<?php
					echo htmlspecialchars($feed['href']) ?>"><?php echo htmlspecialchars($feed['text'])?></a>&nbsp;</span>
					<?php } ?></li><?php
		}

		foreach( array('contributions', 'blockip', 'emailuser', 'upload', 'specialpages') as $special ) {

			if($this->data['nav_urls'][$special]) {
				?><li id="t-<?php echo $special ?>"><a href="<?php echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
				?>"><?php $this->msg($special) ?></a></li>
<?php		}
		}

		if(!empty($this->data['nav_urls']['print']['href'])) { ?>
				<li id="t-print"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['print']['href'])
				?>"><?php $this->msg('printableversion') ?></a></li><?php
		}

		if(!empty($this->data['nav_urls']['permalink']['href'])) { ?>
				<li id="t-permalink"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['permalink']['href'])
				?>"><?php $this->msg('permalink') ?></a></li><?php
		} elseif ($this->data['nav_urls']['permalink']['href'] === '') { ?>
				<li id="t-ispermalink"><?php $this->msg('permalink') ?></li><?php
		}

		wfRunHooks( 'MonoBookTemplateToolboxEnd', array( &$this ) );
?>
			</ul>
		</div>
	<?php } ?>	
	</div>
<?php
		if( $this->data['language_urls'] ) { ?>
	<div id="p-lang" class="portlet">
		<h3><?php $this->msg('otherlanguages') ?></h3>
		<div class="pBody">
			<ul>
<?php		foreach($this->data['language_urls'] as $langlink) { ?>
				<li class="<?php echo htmlspecialchars($langlink['class'])?>"><?php
				?><a href="<?php echo htmlspecialchars($langlink['href']) ?>"><?php echo $langlink['text'] ?></a></li>
<?php		} ?>
			</ul>
		</div>
	</div>
<?php	} ?>

</div><!-- end of the left (by default at least) column -->
			
<div class="visualClear"></div>

</div><!-- end of page contents div -->

<div id="footer">
	<p><a href="http://community.elgg.org/mod/reportedcontent/add.php?address=<?php echo urlencode('http://docs.elgg.org' . $_SERVER['REQUEST_URI']); ?>">Report Page</a> | Elgg is a <a href="http://www.curveriderhq.com" target="_blank">Curverider</a> project</p>
</div>

	<?php 
//$this->html('bottomscripts'); /* JS call to runBodyOnloadHook */ 
?>
<?php 
//$this->html('reporttime') 
?>
<?php if ( $this->data['debug'] ): 
?>
<!-- Debug output:
<?php //$this->text( 'debug' ); 
?>
-->
<?php endif; ?>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-3487311-5";
urchinTracker();

</script>
</body></html>
<?php
	wfRestoreWarnings();
	} // end of execute() method
} // end of class
?>
