module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      my_target: {
        options: {
          sourceMap: true,
          preserveComments: 'some'
          /*sourceMapName: 'path/to/sourcemap.map'*/
        },
        files: {
          'processAndBuild/js/build/dest-min.js': ['processAndBuild/js/src/*.js'] // dest // output 
          // we need to remove all 3rd party scripts from my chris_sowerby.js and place them in a file called 3rd_party.js
        }
      }
    },
    sass: {
      options: {
        sourceMap: true,
         outputStyle: 'nested' //compressed or nested - compressed is buggy so we will use cssmin after compile.
      },
      dist: {
        files: {                         // Dictionary of files
          'processAndBuild/stylesheets/style.css': 'processAndBuild/sass/style.scss'     // 'destination': 'source'          
        }
      }
    },
    cssmin: {
      add_banner: {

        options: {
          expand: true,
          banner: '/* minified css file */'
        },
        files: {
          'processAndBuild/stylesheets/style.css': ['processAndBuild/stylesheets/style.css']
        }
      }
    },
    ftpush: {
      build: {
        auth: {
          host: '88.208.248.91',
          port: 21,
          authKey: 'key1'
        },
        src: './processAndBuild',
        dest: 'httpdocs/themes/theme_by_chris_sowerby/processAndBuild',
        simple:true // stops bugs with ftpush 3rd party library.
      }
    },
    notify_hooks: {
      options: {
        enabled: true,
        max_js_hint_notifications: 5,
        title: 'Cookiejar'
      }
    },
    shell: {
        reload: {
            command: 'start reload-chrome.ahk'
        }
    },
    notify: {
        done: {
            options: {
                title: 'Tasks Done',
                message: 'Refresh issued to chrome'
            }
        }
    },
    jshint: {
      all: ['Gruntfile.js','processAndBuild/js/src/1_chris_sowerby.js'] //, 'processAndBuild/js/src/chris_sowerby.js' Gruntfile.js
    },
    watch:{
      files: ['processAndBuild/**/*', '!**/node_modules/**'],
      tasks:['jshint', 'newer:uglify', 'newer:sass:dist', /*'cssmin',*/ 'ftpush', 'shell:reload', 'notify:done'] //'ftpush'
    }
  });
  
  // load all grunt tasks matching the `grunt-*` pattern
  require('load-grunt-tasks')(grunt);
  // This is required if you use any options.
  grunt.task.run('notify_hooks');
  //require('time-grunt')(grunt);
  grunt.registerTask('default', ['watch']); 
};