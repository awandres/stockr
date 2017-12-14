# Hatch Take Home

We here at Stockr<sup>TM</sup> pride ourselves on connecting our users with the best stocks possible! Recently it has come to our attention that a new craze called "social media" is making its way onto the scene - we think it's time for Stockr<sup>TM</sup> to pivot!

 So far the Stockr<sup>TM</sup> experience has been a very isolating one, this must change! Of course we don't want to lose what has made us successful thus far - the ability for our users to search and find data on stocks they want to follow - but now we want to also allow users to see which stocks their friends are interested in as well.

As the newest developer to join the Stockr<sup>TM</sup> team, your task is to create a new page at `/users` where logged in members can look through the other users of Stockr<sup>TM</sup>, allow users to view the portfolios of others, and select specific users to "follow".

As a user I should be able to navigate to `/users` once I am logged in and view a list of all users on the platform. From here I should be able to click into an individual user's profile and view what stocks they have in their portfolio (and obviously not be able to alter it!). From either of these views I should also be able to toggle whether or not I'm following the given user and see a list of just those users.

Tech is an ever changing world and we need this implemented ASAP! Please get this feature implemented and returned within 72 hours.

***
## Technical Details / Helpful Hints
- The app is already using a css framework [MaterializeCSS](http://materializecss.com/) - check out the documentation and use it to make your life easier when it comes to styling
- Be sure to run `php artisan migrate` and `php artisan db:seed` this will ensure your database is set up correctly and you have stocks/test users from the start
- You will most likely have to modify the database so make sure to look up how to run migrations in Laravel.
- You should have received some set up instructions ahead of the take home, but just to be sure, here are some steps you might want to make sure you've done:
  - Make sure you have `PHP(>=5.6.4)` installed on your local machine
  - Make sure you have [composer installed](https://getcomposer.org/doc/00-intro.md) and have run `composer install` in the root directory of the app.
  - Make sure MYSQL is [installed](https://dev.mysql.com/downloads/installer/) and running on your local machine - you don't have to use MYSQL, any SQL database will do, but the app is currently configured for it so it will make your life easier.
  - Create and fill in you `.env` file following the `.env.example` included with the code (mostly just to make sure you can connect to your local database)
  - Finally, run either `npm install` or `yarn install` (your preference) to install the frontend dependencies and serve the app locally using `php artisan serve` (should appear on [localhost:8000](localhost:8000)). If you don't have npm or yarn installed on your local machine [here are the docs to install nodejs](https://nodejs.org/en/download/package-manager/) - npm comes with Node.
