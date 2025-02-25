	var albums_grid = [],
			albums_item = {},
			grid_container = jQuery('.portfolio_grid_isotope'),
			grid_post_per_page = jQuery('.portfolio_grid').attr('data-perload'),
			show_share = jQuery('.portfolio_grid').attr('data-showshare'),
			already_showed = 0;
	albums_item = {};
	albums_item.slide_type = "image";
	albums_item.img = "assets/img/featured_img.jpg";
	albums_item.thmb = "assets/img/featured_img-960x632.jpg";
	albums_item.title = "";
	albums_item.categ = "";
	albums_item.url = "#";
	albums_grid.push(albums_item);


	jQuery(document).on("click", ".albums_load_more", function() {
			var what_to_append = '',
					allposts = albums_grid.length;
			if (already_showed >= allposts) {
					jQuery(this).slideUp(300);
			} else {
					var now_step = already_showed + parseInt(grid_post_per_page) - 1;
					if (now_step < allposts) {
							var limit = now_step;
					} else {
							var limit = allposts - 1;
							jQuery(this).slideUp(300);
					}
					for (var i = already_showed; i <= limit; i++) {
							if (albums_grid[i].slide_type == 'video') {
									var thishref = albums_grid[i].src,
											thisvideoclass = 'video_zoom';
							} else {
									var thishref = albums_grid[i].img,
											thisvideoclass = '';
							}
							what_to_append = what_to_append + '\
<div class="portfolio_grid_item element anim_el loading ' + albums_grid[i].categ + '" data-category="' + albums_grid[i].categ + '">\
<div class="portfolio_grid_item_wrapper">\
<div class="img_block wrapped_img fs_port_item gallery_item_wrapper">\
<img width="960" class="img2preload" height="632" src="' + albums_grid[i].thmb + '" alt="' + albums_grid[i].title + '" />\
<div class="gallery_fadder"></div>\
</div>\
<div class="portfolio_grid_content">\
<div class="pgc_left_part">\
<h6 class="portfolio_grid_title">' + albums_grid[i].title + '</h6>\
</div>\
<div class="pgc_right_part">\
<div class="post_info">\
			<div class="post_share">\
<a href="#">share</a>\
<div class="share_wrap">\
	<ul>\
		<li><a target="_blank" href="https://twitter.com/intent/tweet?text=' + albums_grid[i].title + '&amp;url=' + albums_grid[i].url + '"><span class="icon-Twitter"></span></a></li>\
		<li><a target="_blank" href="https://www.facebook.com/share.php?u=' + albums_grid[i].url + '"><span class="icon-Facebook"></span></a></li>\
		<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=' + albums_grid[i].url + '&media=' + albums_grid[i].img + '"><span class="icon-Pinterest"></span></a></li>\
	</ul>\
</div>\
</div>\
	</div><!-- .post_info -->\
<div class="clear"></div>\
</div>\
<div class="clear"></div>\
</div>\
<a href="' + thishref + '" class="portfolio_grid_href swipebox ' + thisvideoclass + '" title="' + albums_grid[i].title + '"></a>\
</div><!-- .portfolio_grid_item_wrapper -->\
</div><!-- .portfolio_grid_item -->';
							already_showed++;
					}
					var $newItems = jQuery(what_to_append);
					grid_container.isotope('insert', $newItems, function() {
							grid_container.ready(function() {
									grid_container.isotope('reLayout');
							});
					});
					var set_pad = jQuery('.portfolio_grid').attr('data-pad');
					jQuery('.portfolio_grid').css({
							'padding-left': jQuery('.portfolio_grid').attr('data-pad'),
							'margin-top': '-' + set_pad
					});
					jQuery('.portfolio_grid').find('.portfolio_grid_item').css({
							'padding-right': set_pad,
							'padding-top': set_pad
					});
					setTimeout("animateList()", 500);
			}

			jQuery('.portfolio_grid_isotope').isotope("reLayout");
			setTimeout(function() {
					jQuery('.portfolio_grid_isotope').isotope("reLayout");
			}, 1500);
	});
