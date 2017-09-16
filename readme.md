<p align="center"><img src="https://es.habcdn.com/static/img/habitissimo-2013.2x.png"></p>

## Installation in Windows

- Install Xampp **[Composer](https://www.apachefriends.org/)** 
- Install **[Composer](https://getcomposer.org/download/)** 
- Download the project 

## Configuration

After download the project you must configure your environment

 - **Add the follow lines** at httpd-vhosts.conf located in C:\xampp\apache\conf\extra\httpd-vhosts.conf 

<VirtualHost laravel.dev:80>
  DocumentRoot "C:\xampp\htdocs\{project-name}\public"
  ServerAdmin laravel.dev
  <Directory "C:\xampp\htdocs\{project-name}">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
  </Directory>
</VirtualHost>

- **Update your host file** located in C:\Windows\System32\drivers\etc with the follow lines

# localhost name resolution is handled within DNS itself.
#	127.0.0.1       localhost
#	::1             localhost

127.0.0.1	laravel.dev


## API Calls

- **Base URL** http://laravel.dev/api/

### **Create a new budget request**

- Call: reqbudget
- Method: POST
- Required parameters: description, email, telephone, address
- Example call: http://laravel.dev/api/reqbudget
- Example of json payload: 

    {
    	"name" : "Mr. Habitissimo",
    	"description" : "I need some stuff",
        "email" : "user@mail.com",
        "telephone" : "654426262" ,
        "address" :"Calle secret"
    }

- Example success response:

	{
	    "success": true,
	    "data": {
	        "id": 95
	    }
	}
	
- Example not success response:

	{
	    "success": false,
	    "error_code": 102,
	    "error_message": "Info error"	        
	    
	}

### **Update a budget request**

- Call: reqbudget/$id
- Method: PUT
- Required parameters: none
- Example call: http://laravel.dev/api/reqbudget/5
- Example of json payload: 

    {
    	"title" : "Mr. Habitissimo",
    	"description" : "I need some stuff",
        "category_id": 2
    }
- Example success response:

	{
	    "success": true,
	    "data": {
	        "id": 5
	    }
	}
	
- Example not success response:

	{
	    "success": false,
	    "error_code": 102,
	    "error_message": "Info error"	        
	    
	}

### **Publish a budget request**

- Call: pubbudget/$id
- Method: PUT
- Required parameters: none
- Example call: http://laravel.dev/api/pubbudget/8
- Example success response:

	{
	    "success": true,
	    "data": {
	        "id": 8
	    }
	}

- Example not success response:

	{
	    "success": false,
	    "error_code": 102,
	    "error_message": "Info error"	        
	    
	}

### **Get the list of budget requests**

- Call: reqbudget
- Method: GET
- Required parameters: none
- Example call: http://laravel.dev/api/reqbudget
- Example of json payload: 

    {
    	"email" : "user@mail.com"
    }
- Example success response:

	{
	    "success": true,
	    "data": [
	        {
	            "id": 1,
	            "title": "Training data",
	            "description": "Presupuesto de colocación de 1 termo a gas-butano de 11 litros junker.",
	            "category_id": 1,
	            "state": "pending",
	            "user_id": 1,
	            "created_at": "2017-09-15 22:59:38",
	            "updated_at": "2017-09-15 22:59:38"
	        },
	        {
	            "id": 6,
	            "title": "Training data",
	            "description": "Instalacion de caldera tres cuartos, hol pasillo y comedor de calefacion.",
	            "category_id": 1,
	            "state": "pending",
	            "user_id": 1,
	            "created_at": "2017-09-15 22:59:38",
	            "updated_at": "2017-09-15 22:59:38"
	        },
	        {
	            "id": 7,
	            "title": "Training data",
	            "description": "Calefaccion en casa, necesitaria radiadores y calefactor ya que todo lo tengo a luz.",
	            "category_id": 1,
	            "state": "pending",
	            "user_id": 1,
	            "created_at": "2017-09-15 22:59:38",
	            "updated_at": "2017-09-15 22:59:38"
	        }
    	]
	}
- Example not success response:

	{
	    "success": false,
	    "error_code": 102,
	    "error_message": "Info error"	        
	    
	}

### **Get a suggest of category for a budget requests without category**

- Call: suggcategory/$id
- Method: GET
- Required parameters: none
- Example call: http://laravel.dev/api/reqbudget/5
- Example success response:

	{
	    "success": true,
	    "data": {
	        "Reforms Bathrooms": 3
	    }
	}
- Example not success response:

	{
	    "success": false,
	    "error_code": 102,
	    "error_message": "Info error"	        
	    
	}

### **Discard a budget request**

- Call: reqbudget/$id
- Method: DELETE
- Required parameters: none
- Example call: http://laravel.dev/api/reqbudget/5
- Example success response:

	{
	    "success": true,
	    "data": {
	        "id": 5
    	}
	}
- Example not success response:

	{
	    "success": false,
	    "error_code": 102,
	    "error_message": "Info error"	        
	    
	}


## Test battery

Open a Windows terminal and write the command: C:\xampp\htdocs\{project-name}> **vendor\bin\phpunit**

