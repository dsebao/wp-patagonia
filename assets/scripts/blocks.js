wp.domReady( () => {
	wp.blocks.registerBlockVariation(
		'core/group', {
			name: 'row-switcher',
			title: 'Row Switcher',
			category: 'design',
			scope: [ 'block', 'inserter', 'transform' ],
			keywords: [ 'row', 'columns', 'group' ],
			attributes: {
				className: 'is-style-row-switcher',
			},
		},
	);
	wp.blocks.registerBlockVariation(
		'core/group', {
			name: 'column-stack',
			title: 'Column Stack',
			category: 'design',
			scope: [ 'block', 'inserter', 'transform' ],
			keywords: [ 'row', 'columns', 'group' ],
			attributes: {
				layout: {
					type: 'flex'
				},
				className: 'is-style-column-stack',
			},
		},
	);

	wp.blocks.registerBlockVariation(
		'core/group', {
			name: 'no-padding',
			title: 'No spacing',
			category: 'design',
			scope: [ 'block', 'inserter', 'transform' ],
			keywords: [ 'row', 'columns', 'group' ],
			attributes: {
				className: 'is-style-no-spacing',
			},
		},
	);

	wp.blocks.registerBlockVariation(
		'core/image', {
			name: 'cover-image',
			title: 'Cover image',
			category: 'design',
			scope: [ 'image', 'inserter', 'transform' ],
			keywords: [ 'image', 'media'],
			attributes: {
				className: 'is-cover-image',
			},
		},
	);

	wp.blocks.registerBlockVariation(
		'core/categories', {
			name: 'categories-tags',
			title: 'Tags categories',
			category: 'design',
			scope: [ 'categories', 'inserter', 'transform' ],
			keywords: [ 'text', 'categories', 'tax'],
			attributes: {
				className: 'is-categories-tags',
			},
		},
	);

	wp.blocks.registerBlockVariation(
		'core/categories', {
			name: 'categories-columns',
			title: 'Columns categories',
			category: 'design',
			scope: [ 'categories', 'inserter', 'transform' ],
			keywords: [ 'text', 'categories', 'tax'],
			attributes: {
				className: 'is-categories-columns',
			},
		},
	);
} );