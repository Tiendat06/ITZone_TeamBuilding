(*) **Project Structure**  
-- app: handle system's logic  
|----- controllers: only use to directional  
|----- middlewares: only use to process the pre-request  
|----- models: only use to mapping with database  
|----- repository: get the necessary data from database only  
|----- services: process the logical of the function and design pattern code only  
|----- .htaccess  
-- config: handle system's configuration  
|----- database.php: connect to database only  
|----- .htaccess  
-- public: vendor for static informations  
|----- css: (main, base, responsive, grid,...)  
|----- font  
|----- img: divided by page  
|----- js: use 'module ES6' and Class Component  
|----- video: divided by page  
-- route: redirect by router  
|----- .htaccess  
-- views: views only  
|----- .htaccess  
-- index.php  
-- .htaccess  