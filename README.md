# ITRACKB4 - Laboratory Activity 6

**Student:** John Lloyd R. Ramigoso  
**Block:** 4C  
**Topic:** Video Games  

---

### Questions & Answers

#### Q1: You added a second filter without adding a single route. Explain why no new route was needed. Your answer should say something about what the router actually looks at.
The HTTP router only inspects the URL path segment (such as `/games`) to determine which controller action handles the incoming request. It completely ignores query string key-value pairs (everything following the `?` character). Because query strings modify the request payload rather than identifying a new resource path, a single `/games` route handles all possible filter combinations (`?genre=Action RPG`, `?developer=Nintendo`, or both combined).

#### Q2: Suppose you had built both filters as route parameters instead. Describe what the URL for 'year 4 only, no course filter' would have to look like, and why.
If both filters were built as positional route parameters (such as `/games/{genre}/{developer}`), filtering by developer without specifying a genre would require a placeholder value in the URL path (for example, `/games/all/FromSoftware` or `/games/_/FromSoftware`). This is necessary because route parameters are position-dependent; skipping the first parameter shifts the second parameter into its slot, causing the router to mistake "FromSoftware" for a genre parameter unless an explicit dummy value occupies the first position.

#### Q3: Your navigation link stays marked on a detail page and also when a filter is applied. Only one of those two needed a change to your pattern. Say which one, and why the other needed nothing.
Only the detail page path required a pattern change by utilizing a wildcard match like `request()->is('games*')`. This change was necessary because the detail page appends a path segment (`/games/2`), altering the URI path structure. In contrast, applying query string filters (`/games?genre=Action RPG`) leaves the URI path as `/games`, so the base route pattern `request()->is('games')` matches automatically without any modification.

#### Q4: You deleted your old filter method but kept the empty store and update methods, even though none of the three can be reached by a URL. Explain the difference between them.
The old filter method was deleted because its query parameter approach replaced it entirely, rendering it obsolete dead code. Keeping it would maintain redundant, dead code in the project. Conversely, the empty `store` and `update` methods represent upcoming features in future lab activities that have not been implemented yet. Leaving these empty resource stubs intact documents the planned application architecture without exposing dead logic.