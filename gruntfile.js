module.exports = function (grunt) {
    grunt.initConfig({
        browserify: {
            //standalone browserify watch - do NOT use with grunt-watch
            watch: {
                src: ['assets/js/_src/**/*.js'],
                dest: 'assets/js/app.js',
                options: {
                    external: ['jQuery'],
                    watch: true
                }
            }
        },

        copy: {
            bootstrap: {
                expand: true,
                cwd: 'node_modules/bootstrap-sass/assets',
                src: '**',
                dest: 'assets/sass/bootstrap/'
            }
        },

        sass: {
            default: {
                options: {
                    sourceMap: true
                },
                files: {
                    'style.css': 'assets/sass/style.scss'
                }
            }
        },

        concat: {
            'assets/js/main.js': ['assets/js/*.js', '!assets/js/main.js']
        },

        jshint: {
            options: {
                curly: true, //Requiring curly brackets on conditional statements
                eqeqeq: true, //Requiring === instead of ==
                eqnull: true, //Enabling === null
                browser: true, //Enabling browser globals
                browserify: true, //Enabling browserify globals
                jquery: true //Enabling jQuery globals
            },
            src: ['assets/js/_src/**/*.js']
        },

        uglify: {
            dev: {},
            staging: {},
            prod: {
                files: {
                    'assets/js/main.js': 'assets/js/main.js'
                }
            }
        },

        watch: {
            concat: {
                //note that we target the OUTPUT file from watchClient, and don't trigger browserify
                //the module watching and rebundling is handled by watchify itself
                files: ['assets/js/app.js'],
                tasks: ['concat']
            },
            sass: {
                files: ['assets/sass/partials/**/_*.scss'],
                tasks: ['sass:default']
            }
        }
    });

    grunt.loadTasks('node_modules/grunt-browserify/tasks');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    var target = grunt.option('target') || 'dev';

    grunt.registerTask('default', [
        'browserify',
        'jshint',
        'concat',
        'sass',
        'uglify:' + target,
        'watch'
    ]);
};