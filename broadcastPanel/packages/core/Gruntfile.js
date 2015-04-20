module.exports = function(grunt) {

    grunt.initConfig({
        
        // Compile the coffeescript within the application
        coffee: {

            compile: {
                options: {
                    sourceMap: false
                },
                files: {
                    'assets/js/core-core.js' : ['assets/**/*.coffee']
                }
            },

        },

        // Compile any less stylesheets
        less: {

            development: {
                options: {
                    cleancss: true,
                },
                files: {
                    'assets/css/core-core.css' : ['assets/less/**/*.less']
                }
            }

                    
        },

        // Minify any stylesheets
        cssmin: {

            options: {
                shorthandCompacting: true,
            },
            target: {
                files: [{
                    expand: true,
                    cwd: 'assets/css',
                    src: ['*.css', '!*.min.css'],
                    dest: 'assets/css',
                    ext: '.min.css'
                }],
            }

        },

        // Uglify and minify both the javascript and the stylesheets
        uglify: {
            
            options: {
                mangle: true,
                sourceMap: true
            },
            my_target: {
                files: {
                    'assets/js/core-core.min.js' : ['assets/js/core-core.js'],
                }
            },

        },

        // Sets up the watch on the above tasks
        watch: {
    
            scripts: {
                files: ['assets/coffee/*.coffee'],
                tasks: ['coffee', 'uglify']
            },

            styles: {
                files: ['assets/less/*.less'],
                tasks: ['less', 'cssmin']
            }

        }

    });

    grunt.loadNpmTasks('grunt-contrib-coffee');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['coffee', 'less', 'cssmin', 'uglify', 'watch']);
    grunt.registerTask('production', ['coffee', 'less', 'cssmin', 'uglify']);

}
