# itrackb4-la10-ramigoso-johnlloyd

G1: Which column did you turn into a table, and why that one and not another?
I extracted the genre column into its own genres lookup table. I chose this because a genre is a distinct entity drawn from a repeating, fixed list (like Action RPG or Sandbox) that applies to many rows, whereas columns like release_year or metacritic_score are just individual numerical data points unique to a specific game.

G2: What number did screenshot 6 show, and why exactly that number?
Screenshot 6 showed 6 queries. This happens due to the "N+1 query problem": Eloquent ran 1 query to fetch the list of 5 games, and then as the Blade file looped through the records, it ran 1 additional query for each game to fetch its associated genre from the database, resulting in 1 + 5 = 6 total queries.

G3: Your belongsTo method is named in the singular. What would break if you made it plural?
If I named the method genres() instead of genre(), Eloquent's relationship logic would break. Eloquent automatically takes the method name, appends _id, and looks for that column on the main table. A plural method would make it search for a non-existent genres_id column in the games table, causing an SQL error when loading the page.
