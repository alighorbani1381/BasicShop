<?php/*
*  In The Name Of God :)
*	<<About This Validation Library
* 			Validation of Requestes (GET & POST) 
*  			This Code Write By Ali Ghorbani  (Telegram:alighorbani1381)
*   		Inspired by Laravel Validation :| but this code is KID VS Laravel Validation System :)
* 			Don't Completed Becuse This Validation it So Elementry
*  			You Can Use Repository for Set Request into ValidateParam function
* -- -- -- -- -- --- -- --- --- --- --- --- -- -- - -- -- - -- - -- - -- - - - - -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 
*	<< Staructure of File >>
*			This Library Create with 3 file (ValidationModel, Validation Settings, Validation Repository)
*				1) Validation Model: Main File inside this file Exist Many Function For  Validation DATA & Manage Error from SERVER
*				2) Validation Settings: Errros Create With Data From This File You Can Change Data From This File for Change Language of Error
*				3) Validation Repository: This File Save Your Validation Array Use From ValidaParm Function
*
* -- -- -- -- -- --- -- --- --- --- --- --- -- -- - -- -- - -- - -- - -- - - - - -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 
* 		How to Work this Validation System? 
* 			1) First Check Requested is Send => isset() but is doesn't Send to Server Automaticaly Redirect To BadgateWay Page :|
* 			2) Second Step Validation with Customize Parameter Admin (Developer) Selected
* 			3) Save Created Error in Array in The SESSISON and use this Array for Show Error to Client
* -- -- -- -- -- --- -- --- --- --- --- --- -- -- - -- -- - -- - -- - -- - - - - -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 
*		 How to Show Error to Client (User)??
*			For Show Error to User You Can to Ways:
*				1) Use Has_Error Method give two Parameter  ( [fieldName.ValidationType],"custom Error Message"  )
*				2) Use FirstError Method Check is Field Has Errors Show First Error for Creatred Error List
