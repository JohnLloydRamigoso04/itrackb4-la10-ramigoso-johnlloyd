
F1: Which column did you make nullable, and why that one and not another?
I made the metacritic_score column nullable. This was chosen deliberately because not every video game has a Metacritic score—new releases, early access titles, or small indie games often lack enough reviews to generate an aggregated score, whereas properties like title, developer, and release year are mandatory facts for any published game.

F2: Which step failed first for you, and what did the error say?
The first deliberate failure occurred in Tinker when attempting to create a record before setting up mass assignment. The terminal threw a Illuminate\Database\Eloquent\MassAssignmentException, explicitly stating that title was not fillable and directing me to add it to the $fillable property on the Game model.

F3: You changed no Blade file in Part D, yet your pages still work. Why not?
The Blade files didn't break because the database columns were named identically to the keys in my previous JSON array (title, developer, genre). Furthermore, Laravel's Eloquent models implement the ArrayAccess interface, meaning the Blade views can continue reading $game['title'] just as they did when the data was an actual PHP array, requiring zero syntax changes on the frontend.

# itrackb4-la10-ramigoso-johnlloyd

G1: Which column did you turn into a table, and why that one and not another?
I extracted the genre column into its own genres lookup table. I chose this because a genre is a distinct entity drawn from a repeating, fixed list (like Action RPG or Sandbox) that applies to many rows, whereas columns like release_year or metacritic_score are just individual numerical data points unique to a specific game.

G2: What number did screenshot 6 show, and why exactly that number?
Screenshot 6 showed 6 queries. This happens due to the "N+1 query problem": Eloquent ran 1 query to fetch the list of 5 games, and then as the Blade file looped through the records, it ran 1 additional query for each game to fetch its associated genre from the database, resulting in 1 + 5 = 6 total queries.

G3: Your belongsTo method is named in the singular. What would break if you made it plural?
If I named the method genres() instead of genre(), Eloquent's relationship logic would break. Eloquent automatically takes the method name, appends _id, and looks for that column on the main table. A plural method would make it search for a non-existent genres_id column in the games table, causing an SQL error when loading the page.

