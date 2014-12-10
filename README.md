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