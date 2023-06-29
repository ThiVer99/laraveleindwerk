## Installation Laravel Project

Make sure composer and node.js are installed on your machine.

1. git clone repo <directory>
2. cd <directory>
3. npm install
4. composer install, Appserviceprovider all count variables in comments!
5. Copy .env.example to **.env** and put all necessary settings inside
   mail, database, ...
6. php artisan key:generate
7. Open project in editor and DELETE assets folder completely inside public folder if it exists (public/assets)
8. php artisan storage:link (setting storage link for images)
9. Start your wamp, mamp or xamp server
10. Create inside the server your databasename
11. php artisan migrate:fresh --seed
12. npm run dev
13. php artisan serve (then click on localhost) 
14. AppServiceprovider (activate all count variables again)
15. To activate the webhook this is the command 
`stripe listen --forward-to http://127.0.0.1:8000/webhook` the http link being the url to the application with /webhook

## That's all folks, application is running

# laraveleindwerk
