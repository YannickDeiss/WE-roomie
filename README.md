# **Roomie, Web Engineering Project Spring Semester 2018**

- [Introduction](#introduction)
  - [Overview](#overview)
  - [Requirement Analysis](#requirement-analysis)
  - [Use case](#use-case)
- [Design](#design)
  - [Mockups](#mockups)
  - [Entity Relationship Diagram](#entity-relationship-diagram)
  - [Domain Model](#domain-model)
  - [Data Access Model](#data-access-model)
- [Implementation](#implementation)
  - [Stage 1: Structure](#stage-1-structure)
  - [Stage 2: Autoloader and Routing](#stage-2-autoloader-and-routing)
  - [Stage 3: Database](#stage-3-database)
  - [Stage 4: Database Access and Domain Objects](#stage-4-database-access-and-domain-objects)
  - [Stage 5: Business Service](#stage-5-business-services)
  - [Stage 6: Register/Login](#stage-6-registerlogin)
  - [Stage 7: Course offerings view frontend](#stage-7-course-offerings-view-frontend)
  - [Stage 8: PDF creation](#stage-8-pdf-creation)
  - [Stage 9: Email Service](#stage-9-email-service)
- [Deployment](#deployment)


### Introduction
###### Overview
The goal of this project was it, to create a website that connects people that are looking for a room in a shared apartment to people, that are offering a room in a shared apartment in a very pragmatic and simple way.

###### Contributors:
* Loris Grether (database, front-end)
* Hermann Grieder (server-side, front-end, GUI)
* Tobias Gerhard (GUI, Documentation, front-end)

###### The following requirements were defined:
1. Authentication
   * If the password is forgotten, it should be possible to get a new one using email
   * The password is securely stored
2. Content management by users
   * Room offerers upload the ads for their room by themselves, using the provided online form
3. Administration
   * Deleting/updating user data
   * Change/delete ads
   * Ads will be deleted automatically after a certain time period
4. Room listing
   * The website provides a list with all the currently available rooms
5. User registration
   * User can create an account using email
   * User can login
   * User can logout
6. Search function
   * The website provides a search function so that user can search for ads with specific criteria
7. Export function
   * Ads can be printed
   * Ads can be exported as PDF
8. GUI
   * The GUI is enhanced with CSS and JavaScript to improve usability and make the appearance more appealing
   * The GUI is responsive, meaning it adapts to the screen size
9. Minimized error rate
   * The website should be as error-prone as possible
###### Optional requirements:
1. Messaging function
   * Users can get in touch with an advertiser using an integrated message function
2. Gallery
   * Users can upload pictures with their ads
3. Google Maps integration
   * Google Maps API is used in order to display the place of the room
4. Facebook login
   * Users can login with their Facebook credentials via Facebook API

### Use Case Diagram
After the requirements have been designed, a use case diagram was created. The following diagram illustrates the use cases. 

![Use Case Diagram](https://github.com/Yardie83/WE-roomie/blob/master/UseCaseDiagram.jpeg "Use Case Diagram")

Most use cases have already been shortly explained in the requirements section. However, hereafter, each of the use cases is explained more in detail.
* **Register**: unregistered users can create an account which allows them to create ads for a room that they like to offer.
* **User Login**: registered user that are currently logged out can log in using their credentials (email and password).
* **Logout**: logged-in users can logout, what terminates the current session.
* **Search entry**: registered users can search for rooms with specific requirements (room size, price, etc.).
* **Contact advertiser**: logged-in users can contact an advertiser using a contact form.
* **Delete user**: the admin can fully delete user from the database.
* **Change profile**: users can change their profile data with regards to email and username
* **Create entry**: users can create ads through a online form. These ads appear on the website, which displays all the available rooms.
* **Edit entry**: entries (ads) can be edited with respect to description text, address etc.
* **Delete entry**: entries (ads) can be fully deleted, so that they do not appear in the database anymore.

The image above illustrates the use cases that were defined at the very beginning. However, during implementation, certain changes took place:
* Being an unregistered user does not keep the user from looking at and searching for ads.
* There is no "admin"; registered users are capable to make adjustments to their entries themselves. However, having full access to the database makes us (the creators) somewhat of the admins.
* The optional functionalities were not implemented.

### Wireframes
In order to have a general idea of the GUI, 4 simple mockups were created. These wireframes can be found hereafter.
![Available Rooms](https://github.com/Yardie83/roomie/blob/master/AvailableRoomsMockup.png "Available Rooms")
![Registration](https://github.com/Yardie83/roomie/blob/master/RegistrationMockup.png "Registration")
![Room Details](https://github.com/Yardie83/roomie/blob/master/RoomDetailMockup.png "Room Details")
![Search Page](https://github.com/Yardie83/roomie/blob/master/SearchPageMockup.png "Search Page")

### Database Model
To store the data, a PostgreSQL database was created. The database contains 3 tables; authtoken, ListingAppartments, users.
* **authtoken**: used for the remember-me and password-reset functionality.
* **ListingAppartments**: this table stores data about the apartments that are visible as ads.
* **users**: the RegisteredUsers table stores the data about the users; id, username, mail, as well as the encrypted password.

### Implementation
As foundation of the implemented code acts the framework that was developed during classes. It has been adjusted and extended to our needs. Subsequently, important classes are described.
* **Router**: The router routes the requests to the correct resource/destination.
* **View**: The view folder contains all the HTML pages that are necessary for the website, including headers and the footer as well as CSS files.
* **Controller**: The controller folder contains the controller files in order to manipulate the view, or the model respectively.
* **ListingDAO and UserDAO**: The corresponding class handles the database requests and manipulates the data stored in the respective table.
* **Listing**: Holds the data for an apartment.
* **User**: Holds the data for the user.

### Conclusion
To be mentioned:
- The welcome page displays the newest 3 entries
