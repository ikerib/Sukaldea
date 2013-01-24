set :application, "GureSare"
set :domain,      "192.168.1.1"
set :user,        "root"
set :deploy_to,   "/home/guresare"
set :app_path,    "app"

set :use_composer, true
set :scm,         :git
set :scm_verbose, true
set :branch,      "master"
set :repository,  "file:///Users/gitek/www/sukaldea"
set :deploy_via,  :copy
#set :deploy_via, :rsync_with_remote_cache
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`

set :model_manager, "doctrine"
# Or: `propel`

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Rails migrations will run

set  :use_sudo,         false
set  :keep_releases,    5
set  :shared_files,     ["app/config/parameters.yml"]
set  :shared_children,     [app_path + "/logs", web_path + "/uploads", "vendor"]
set  :php_bin,          "/usr/bin/php"
set  :update_vendors,   true
set  :dump_assetic_assets, true
default_run_options[:pty] = true

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL