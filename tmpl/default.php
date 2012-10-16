<?php
/**
 * Bootstrap Carousel Module
 * @package     BoostrapCarousel
 * @subpackage  Modules
 * @copyright   Copyright (C) 2012 Rene Kreijveld
 * @author      Rene Kreijveld <email@renekreijvel.nl>
 *              Based on the original work of Christian Hent, www.zenjiapps.com
 * @license     GNU General Public License version 2 or later
 *
 * @version      1.1.8
 */
 
// no direct access
defined('_JEXEC') or die;
?>
<div id="bootstrapcarousel-<?php echo $module->id; ?>" class="carousel slide<?php echo $moduleclass_sfx ?>">
	<div class="carousel-inner">
		<?php $act = " active"; ?>
		<?php foreach ($list as $item) :  ?>
		<div class="item<?php echo $act;?>">
				<div>
				<?php if ($params->get('source') == 'imageleft') { ?>
				<div style="float:left;width:<?php echo $params->get('division');?>%;">
					<?php if ($params->get('image_source') == 0) : ?>
					<img src="<?php echo $item->params->get('image_intro') ?>" alt="<?php echo $item->title ?>">
					<?php else : ?>
					<img src="<?php echo $item->params->get('image_fulltext') ?>" alt="<?php echo $item->title ?>">
					<?php endif; ?>
				</div>
				<div style="float:left;width:<?php echo 100-$params->get('division');?>%;">
					<div class="slidetext">
						<?php if ($item->params->get('show_title') == 1) : ?>
						<h2><?php echo $item->title; ?></h2>
						<?php endif; ?>
						<?php echo $item->introtext; ?>
						<?php if ($params->get('show_link') == 1) : ?>
							<?php
							$urls = json_decode($item->urls);
							if ($urls->urla) {
								echo '<div class="readmore btn btn-mini ">';
								switch ($urls->targeta)
								{
									case 1:
										// open in a new window
										echo '<a href="'. $urls->urla .'" target="_blank"  rel="nofollow">' . $urls->urlatext . '</a>';
										break;
									case 2:
										// open in a popup window
										$attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=600';
										echo "<a href=\"" . $urls->urla . "\" onclick=\"window.open(this.href, 'targetWindow', '".$attribs."'); return false;\">" . $urls->urlatext . "</a>";
										break;
									case 3:
										// open in a modal window
										JHtml::_('behavior.modal', 'a.modal'); ?>
										<a class="modal" href="<?php echo $urls->urla; ?>"  rel="{handler: 'iframe', size: {x:600, y:600}}">
											<?php echo $urls->urlatext . '</a>';
										break;
									default:
										// open in parent window
										echo '<a href="'.  $urls->urla . '" rel="nofollow">'.
											$urls->urlatext . '</a>';
										break;
								}
								echo '</div>';
							}
							?>
						<?php endif; ?>
					</div>
				</div>
				<?php } ?>
				<?php if ($params->get('source') == 'contentleft') { ?>
				<div style="float:left;width:<?php echo $params->get('division');?>%;">
					<div class="slidetext">
						<h2><?php echo $item->title; ?></h2>
						<?php echo $item->introtext; ?>
						<?php if ($params->get('show_link') == 1) : ?>
							<?php
							$urls = json_decode($item->urls);
							if ($urls->urla) {
								echo '<div class="readmore btn btn-mini ">';
								switch ($urls->targeta)
								{
									case 1:
										// open in a new window
										echo '<a href="'. $urls->urla .'" target="_blank"  rel="nofollow">' . $urls->urlatext . '</a>';
										break;
									case 2:
										// open in a popup window
										$attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=600';
										echo "<a href=\"" . $urls->urla . "\" onclick=\"window.open(this.href, 'targetWindow', '".$attribs."'); return false;\">" . $urls->urlatext . "</a>";
										break;
									case 3:
										// open in a modal window
										JHtml::_('behavior.modal', 'a.modal'); ?>
										<a class="modal" href="<?php echo $urls->urla; ?>"  rel="{handler: 'iframe', size: {x:600, y:600}}">
											<?php echo $urls->urlatext . '</a>';
										break;
									default:
										// open in parent window
										echo '<a href="'.  $urls->urla . '" rel="nofollow">'.
											$urls->urlatext . '</a>';
										break;
								}
								echo '</div>';
							}
							?>
						<?php endif; ?>
					</div>
				</div>
				<div style="float:left;width:<?php echo 100-$params->get('division');?>%;">
					<?php if ($params->get('image_source') == 0) : ?>
					<img src="<?php echo $item->params->get('image_intro') ?>" alt="<?php echo $item->title ?>">
					<?php else : ?>
					<img src="<?php echo $item->params->get('image_fulltext') ?>" alt="<?php echo $item->title ?>">
					<?php endif; ?>
				</div>
				<?php } ?>
				<?php if ($params->get('source') == 'justimages') { ?>
				<div style="width:100%;">
					<?php if ($params->get('image_source') == 0) : ?>
					<img src="<?php echo $item->params->get('image_intro') ?>" alt="<?php echo $item->title ?>">
					<?php else : ?>
					<img src="<?php echo $item->params->get('image_fulltext') ?>" alt="<?php echo $item->title ?>">
					<?php endif; ?>
				</div>
				<?php } ?>
				<?php if ($params->get('source') == 'justcontent') { ?>
				<div style="width:100%;">
					<div class="slidetext">
						<h2><?php echo $item->title; ?></h2>
						<?php echo $item->introtext; ?>
						<?php if ($params->get('show_link') == 1) : ?>
							<?php
							$urls = json_decode($item->urls);
							if ($urls->urla) {
								echo '<div class="readmore btn btn-mini ">';
								switch ($urls->targeta)
								{
									case 1:
										// open in a new window
										echo '<a href="'. $urls->urla .'" target="_blank"  rel="nofollow">' . $urls->urlatext . '</a>';
										break;
									case 2:
										// open in a popup window
										$attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=600';
										echo "<a href=\"" . $urls->urla . "\" onclick=\"window.open(this.href, 'targetWindow', '".$attribs."'); return false;\">" . $urls->urlatext . "</a>";
										break;
									case 3:
										// open in a modal window
										JHtml::_('behavior.modal', 'a.modal'); ?>
										<a class="modal" href="<?php echo $urls->urla; ?>"  rel="{handler: 'iframe', size: {x:600, y:600}}">
											<?php echo $urls->urlatext . '</a>';
										break;

									default:
										// open in parent window
										echo '<a href="'.  $urls->urla . '" rel="nofollow">'.
											$urls->urlatext . '</a>';
										break;
								}
								echo '</div>';
							}
							?>
						<?php endif; ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php $act = ""; ?>
		<?php endforeach; ?>
	</div>
	<?php if ($params->get('showcontrols') == 'yes') : ?>
	<a class="left carousel-control" style="top:50%;margin-top:-30px;" href="#bootstrapcarousel-<?php echo $module->id; ?>" data-slide="prev">‹</a>
	<a class="right carousel-control" style="top:50%;margin-top:-30px;" href="#bootstrapcarousel-<?php echo $module->id; ?>" data-slide="next">›</a>
	<?php endif; ?>
</div>

<script type="text/javascript">
(function() {
	if (window.addEventListener) {
		// normal
		window.addEventListener('load', jQueryCheck, false);
	}
	else if (window.attachEvent) {
		// m$
		window.attachEvent('onload', jQueryCheck);
	}
	function jQueryCheck() {
		if (typeof jQuery === "undefined") {
			alert('jQuery is NOT available! Please include the jQuery lib.');
		}else {
			startCarousel();
		}
	}

	function startCarousel() {
		(function($) {
			$(document).ready(function(){
				$('#bootstrapcarousel-<?php echo $module->id; ?>').carousel({
					interval: <?php echo (int)$params->get('interval')?>,
					pause: '<?php echo $params->get('pause')?>'
				});
				$('#bootstrapcarousel-<?php echo $module->id; ?>').bind('slide',function(){
					//do something here on slide event
				});
				$('#bootstrapcarousel-<?php echo $module->id; ?>').bind('slid',function(){
					//do something here on slid event
				});
			});
		})(jQuery);
	}
})();
</script>