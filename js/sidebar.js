(function($) {
	var MenuView = function(menu) {
		var $el = $("<ul>");

		function process(node, $parent) {
			var id = node.id || 'root';

			var $li = $('<li>')
				.attr('id', id + '-item')
				.addClass('level-' + node.level)
				.appendTo($parent);

			if (node.section) {
				var $a = $('<a>')
					.html(node.section)
					.attr('id', id + '-link')
					.attr('href', '#' + node.id)
					.addClass('level-' + node.level)
					.appendTo($li);
			}

			if (node.items.length > 0) {
				var $ul = $('<ul>')
					.addClass('level-' + (node.level+1))
					.attr('id', id + '-list')
					.appendTo($li);

				node.items.forEach(function(item) {
					process(item, $ul);
				});
			}
		}

		process(menu, $el);
		return $el;
	};

	$(document).ready(function() {
		var $content = $('.content'),
		    $headers = $(':header', $content),
		    $menu    = $('[role="flatdoc-menu"]'),
		    data     = {};

		data.level = 0;
		data.items = [];

		var parent = data;

		$headers.each(function (index, elem) {
			var level = elem.tagName.substring(1);

			var item = {
				id:      elem.id,
				section: $(elem).html(),
				level:   parseInt(level),
				items:   [],
				parent:  parent,
			};

			while (level <= parent.level) {
				parent = parent.parent;
			}

			parent.items.push(item);

			parent = item;
		});

		$menu.append(MenuView(data));

		$(document).trigger('flatdoc:ready');
	});
})(jQuery);