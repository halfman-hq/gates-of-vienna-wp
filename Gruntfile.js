module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    
    sass: {
      dev: {
        options: {
          style: 'expanded'
        },
        files: {
          'app/wp-content/themes/gates-of-vienna/style.css' : 'app/wp-content/themes/gates-of-vienna/style.scss'
        }
      },
      prod: {
        options: {
          style: 'compressed'
        },
        files: {
          'dist/wp-content/themes/gates-of-vienna/style.css' : 'app/wp-content/themes/gates-of-vienna/style.scss'
        }
      }
    },

    uglify: {
      dist: {
        options: {
          preserveComments: 'some'
        },
        files: {
          'dist/wp-content/themes/gates-of-vienna/js/plugins.min.js' : ['app/wp-content/themes/gates-of-vienna/js/plugins.js'],
          'dist/wp-content/themes/gates-of-vienna/js/script.min.js' : ['app/wp-content/themes/gates-of-vienna/js/script.js']
        }
      }
    },

    watch: {
      css: {
        files: 'app/wp-content/themes/gates-of-vienna/css/*.scss',
        tasks: ['sass:dev']
      }
    }

  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default',['watch']);

  grunt.registerTask('prod',['uglify', 'sass:prod']);


};