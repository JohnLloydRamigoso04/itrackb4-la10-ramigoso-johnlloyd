F1: Which column did you make nullable, and why that one and not another?
I made the metacritic_score column nullable. This was chosen deliberately because not every video game has a Metacritic score—new releases, early access titles, or small indie games often lack enough reviews to generate an aggregated score, whereas properties like title, developer, and release year are mandatory facts for any published game.

F2: Which step failed first for you, and what did the error say?
The first deliberate failure occurred in Tinker when attempting to create a record before setting up mass assignment. The terminal threw a Illuminate\Database\Eloquent\MassAssignmentException, explicitly stating that title was not fillable and directing me to add it to the $fillable property on the Game model.

F3: You changed no Blade file in Part D, yet your pages still work. Why not?
The Blade files didn't break because the database columns were named identically to the keys in my previous JSON array (title, developer, genre). Furthermore, Laravel's Eloquent models implement the ArrayAccess interface, meaning the Blade views can continue reading $game['title'] just as they did when the data was an actual PHP array, requiring zero syntax changes on the frontend.