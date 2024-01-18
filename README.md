## Installation Laravel Project

Make sure composer and node.js are installed on your machine.

1. git clone repo <directory>
2. cd to laraveleindwerk
3. npm install
4. composer install
5. Copy .env.example to **.env** and put all necessary settings inside
   mail, database, ...
6. php artisan key:generate
7. Open project in editor and DELETE assets folder completely inside public folder if it exists (public/assets)
8. Create map 'public' storage/app if this directory does not exist
9. php artisan storage:link (setting storage link for images)
10. Start your wamp, mamp or xamp server
11. Create inside the server your databasename
12. php artisan migrate:fresh --seed
13. npm run dev
14. php artisan serve (then click on localhost) 
15. To activate the webhook this is the command 
`stripe listen --forward-to http://127.0.0.1:8000/webhook` the http link being the url to the application with /webhook

## That's all folks, application is running

# laraveleindwerk
