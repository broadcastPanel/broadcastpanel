module.exports = function(grunt) {

    grunt.initConfig({

        // Sets up the watch on the above tasks
        watch: {
    
            file: {
                files: ['packages/**/*.coffee', 'packages/**/*.less', 'packages/**/*.css', 'packages/**/*.js'],
                tasks: ['shell']
            }

        },

        shell: {

            assets: {
                options: {
                    stdout: true
                },
                command: 'php artisan vendor:publish --force'
            }

        }

    });

    grunt.loadNpmTasks('grunt-shell');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['watch']);

}
