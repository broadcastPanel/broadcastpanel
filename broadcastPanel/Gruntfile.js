module.exports = function(grunt) {

    grunt.initConfig({
        
        // Compile the coffeescript within the application
        coffee: {

            compile: {
                options: {
                    sourceMap: false
                },
                files: {
                    'public/assets/js/app.js' : ['public/**/*.coffee']
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
                    'public/assets/css/style.css' : ['public/assets/less/app.less']
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
                    cwd: 'public/assets/css',
                    src: ['*.css', '!*.min.css'],
                    dest: 'public/assets/css',
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
                    'public/assets/js/app.min.js' : ['public/assets/js/app.js'],
                }
            },

        },

        // Sets up the watch on the above tasks
        watch: {
    
            scripts: {
                files: ['public/assets/coffee/*.coffee'],
                tasks: ['coffee', 'uglify']
            },

            styles: {
                files: ['public/assets/less/*.less'],
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
