Gates of Vienna
==========

## Getting Started ##
###1. Install Dependencies###

####Node  ####
```npm install```

#### Bower  ####
```bower install```


###2. Setup Virtual Host###
```sudo pico /etc/hosts```  

Add in a record for...  
```127.0.0.1    gatesofvienna.local```

In your ```httpd-vhosts.conf``` file, add in the following...  
```
<VirtualHost *:80>
    DocumentRoot "/path/to/gatesofvienna.com/app/"
    ServerName gatesofvienna.local
</VirtualHost>
```


###3. Setup database###
Create a database called ```gates-of-vienna```. Import the latest databse in the ```_db``` folder of the solution.


###4. Editing SASS###
To edit the SASS, you'll need to have [Grunt](http://gruntjs.com/) installed. Once you do, run `grunt` from the command line to start watching for SASS changes. Once you edit the `main.scss` file, Grunt will automatically recompile the SASS files. This file is located in `app/wp-content/themes/gates-of-vienna/css/`. The colors are at the top, and you can change these at any time.

Once this is done, you'll need to commit and push your changes.
