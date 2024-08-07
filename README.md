(*) **Project Structure**  
-- app: handle system's logic  
|----- controllers: only use to directional (always note the route above the function)  
|----- middlewares: only use to process the pre-request  
|----- models: only use to mapping with database  
|----- pattern: pattern code only  
|----- repository: get the necessary data from database only  
|----- services: process the logical of the function    
|----- .htaccess  
-- config: handle system's configuration  
|----- DatabaseManager.php: connect to database only  
|----- .htaccess  
-- public: vendor for static informations  
|----- css: (main, base, responsive, grid,...)  
|----- font  
|----- img: divided by function  
|----- js: use 'module ES6' and Class Component  
|----- scss: scss code (please install node.js to get npm first 'https://nodejs.org/en')   
|------------- For more: https://sass-lang.com/ (please use SCSS syntax)  
|------------- Run these code below to install and map sass to css
```
npm i -g sass
sass -w public/scss/main.scss public/css/main.css
```
  
|----- video: divided by function  
-- route: redirect by router  
|----- .htaccess  
-- views: views only  
|----- .htaccess  
-- index.php  
-- .htaccess  