### SEG 4910/11 Capstone Project 2024

## Members:
- Omar Khater
- Lina Raji
- Hiba Idrissi

## Client:
- name: Husam Khater
- Customer affiliation: Owner of FitLynk
- Customer email: husam.khater@gmail.com

## Description and goals:
Help with the implementation of new features, including:
- Redesigning the MyDiet , Runmate and Exercise applications
- Implement key features on MyDiet application

## Architecture and Design
XAMPP with Apache and PHP (Front-End):

We used XAMPP to run a local server environment which combined Apache, MySQL, PHP, and Perl. We also used it for testing and developing web applications on our devices.
Apache served as the web server that hosts the application, allowing us to access it through our browser.
PHP dynamically generates web pages which handles server-side logic. It connects with the back-end database to fetch, display, and process data.

PostgreSQL/pgAdmin (Back-End):
PostgreSQL is an OS relational database management system. It's robust and can handle complex queries and large-scale data.
pgAdmin is a management tool for PostgreSQL, allowing us to interact with the database through a GUI.

AWS Cloud Services:
The app uses AWS, it employs services like RDS for database hosting, EC2 for server hosting, or S3 for static file storage. AWS provides scalability web applications.

Connecting the Back-End with the Front-End:
The front end would interact with the back end using SQL queries (PHP).
When a user performs an action (e.g., logs their diet), the front end sends a request to the back-end server.
PHP scripts process this request, query the PostgreSQL database for the necessary data, and return the results to be displayed on the web page.
