## Flashcards App

Creators:
	Colin Conduff,
	Benjamin Daniels,
	Nathan McFeeters,
	Kittipak Ratasukarom

To do:
	-Hide edit/delete buttons from users of other decks.
		Currently anyone can edit/delete anyone else's decks/flashcards/etc.
		See permissions section.
	-Implement forum.
		Use the browse controller, view, and routes as a reference when implementing the forum.
	-Implement the study function.  
	-Implement the permissions function.
		Show a user the permissions associated with their decks in the dashboard (ex: User8 is requesting permission to edit Deck10) 
		And allow them to change them (so we need a permissions controller and buttons on the dashboard calling those functions)
		Use middleware to allow some users certain privileges, while restricting access to other users.
