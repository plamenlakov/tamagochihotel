

## Hotel API based on Laravel

*Make sure to seed the database:*

> php artisan db:seed

**Tamagotchis**
> /api/tamagotchis - show all tamagotchis, receives a post request to create a new one
> /api/tamagotchis/{id} - show a particular tamagotchi, update it or delete it depending on request type 
Same methodology for bottom api routes:

**Rooms**
> /api/rooms
> /api/rooms/{id}


**Bookings**
> /api/bookings 
> /api/bookings/{id}


*Use the following CLI command to toggle night mode*
> php artisan toggle:nightMode
