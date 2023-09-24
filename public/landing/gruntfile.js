module.exports = function(grunt) {
	// Configure
	grunt.initConfig({

		uglify: {
			my_target: {
			  files: {
					'build/scripts.min.js': [
						'js/chat.js',
						'js/jquery.min.js',
						'js/bootstrap.min.js',
						'js/scrolling-nav.js',
	
						'js/waypoints.min.js',
						'js/jquery.counterup.min.js',
						'js/number-c.js', //Time to count,
						// --------------------------------------// 
					
						// -------------------// 
						'bower_components/scrollmagic/scrollmagic/minified/ScrollMagic.min.js',
						'bower_components/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js',
						// Animation.css Scripts after scroll
						'js/wow.min.js',
						'js/animate.js',
						// --------------------------------// 
						// Professional Parallax editing
						'js/parallax-background.js',
						'js/smoothscroll.js', // Smooth Scroll Script + time to Scroll,			
						'js/check_box.js',
						'js/active_property.js',
						'js/pointer_navigatior.js',
						'js/notify.js',
						'js/parallax.js',
						'js/particular_library_downloaded.js',
						 //Pointer Navigation Middle
						'js/main.js',
						'bower_components/owl.carousel/dist/owl.carousel.min.js',
					],
			  }
			}
		},
		cssmin: {
			target: {
			  files: {
				'build/styles.css': ['css/**/*.css']
			  }
			}
		  },
		watch: {
		  scripts: {
		    files: ['css/**/*.css'],
		    tasks: ['cssmin' ,'uglify'],
		    options: {
		      spawn: false,
		    },
		  },
		},
	});

	//  Load Plugins
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	// Register tasks
	grunt.registerTask('default', ['watch', 'cssmin']);
	// grunt.registerTask('concat-css', ['concat:css']);




};