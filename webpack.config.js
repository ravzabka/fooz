/**
 * External Dependencies
 */
const path = require( 'path' );

/**
 * WordPress Dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );

module.exports = {
	...defaultConfig,
	...{
		entry: {
			'styles/theme': path.resolve( process.cwd(), 'assets/styles', 'theme.scss' ),
			'js/scripts': path.resolve( process.cwd(), 'assets/js', 'scripts.js' )
		},
	},
	plugins: [ 
		...defaultConfig.plugins
	]
};
