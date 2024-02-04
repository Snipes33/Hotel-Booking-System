-- How many distinct guest have made bookings for a particular month?
	SELECT users_first_name, users_last_name,users_contact_number
	FROM users
	WHERE users_id IN 
		( SELECT distinct users_user_id 		
		  FROM bookings
		  WHERE MONTH(check_in_date) = 6);
          
          
-- How many bookings has a customer made in one year?
	SELECT count(*) AS 'Total Bookings' 	
	FROM bookings
	WHERE YEAR(booking_date) = 2023 AND users_user_id = 31;
    

-- How many rooms are booked in a particular hotel on a given date? 
	SELECT COUNT(*) AS 'Total Rooms Booked'
	FROM bookings b
	INNER JOIN rooms_booked rb ON b.booking_id = rb.bookings_booking_id
	WHERE b.booking_date = '2023-06-11'
  AND b.hotel_hotel_id = 1;
  
  
-- How many rooms are available in a given hotel? 
	 SELECT h.hotel_room_capacity - COUNT(rb.rooms_room_id) AS 'Available Rooms'
	FROM hotel h
	LEFT JOIN rooms r ON h.hotel_id = r.hotel_hotel_id
	LEFT JOIN rooms_booked rb ON r.room_id = rb.rooms_room_id
	WHERE h.hotel_id = 1;
    
    
-- List all the hotels that have a URL available.
	SELECT * 
	FROM  hotel  
	WHERE hotel_website IS NOT NULL;
    
    
-- Retrieve top 5 users who have booked the most number of rooms

	SELECT u.users_id, u.username, u.users_first_name, u.users_last_name, COUNT(rb.rooms_booked_id) AS total_rooms_booked
	FROM users u
	JOIN bookings b ON u.users_id = b.users_user_id
	JOIN rooms_booked rb ON b.booking_id = rb.bookings_booking_id
	GROUP BY u.users_id, u.username, u.users_first_name, u.users_last_name
	ORDER BY total_rooms_booked DESC
	LIMIT 5;
    
    
   -- Retrieve the top 5 users who have spent the most amount of money

	SELECT u.users_id, u.username, u.users_first_name, u.users_last_name, SUM(b.total_cost) AS total_amount_spent
	FROM users u
	JOIN bookings b ON u.users_id= b.users_user_id
	GROUP BY u.users_id, u.username, u.users_first_name, u.users_last_name
	order by total_amount_spent DESC
	LIMIT 5;
    
    
    -- Favourite room booked by guests along with all the information about the room

SELECT r.room_id, r.room_number, rt.room_type_name,rt.room_cost, rt.room_type_description, rt.smoke_friendly, rt.pet_friendly
FROM rooms r
JOIN room_type rt  ON r.rooms_type_rooms_type_id= rt.room_type_id
JOIN rooms_booked rb ON r.room_id = rb.rooms_room_id
GROUP BY r.room_id, r.room_number, rt.room_type_name, rt.room_cost, rt.room_type_description, rt.smoke_friendly, rt.pet_friendly
ORDER BY COUNT(rb.rooms_booked_id) DESC
LIMIT 1;


-- How much income for a certain hotel. Show the hotel name and the total booked amount by the hotel.

	SELECT h.hotel_name, SUM(b.total_cost) AS total_booked_amount
	FROM bookings b
	INNER JOIN hotel h ON b.hotel_hotel_id = h.hotel_id
	WHERE h.hotel_id = 1
	GROUP BY h.hotel_name;
    

-- Search for a room based on a room type  
	SELECT r.room_id, r.room_number, rt.room_type_name
	FROM rooms r
	INNER JOIN room_type rt ON r.rooms_type_rooms_type_id = rt.room_type_id
	WHERE rt.room_type_name = 'Standard room';
    
    
-- To search for a room within a price range 
	SELECT r.room_id, r.room_number, rt.room_type_name, rt.room_cost
	FROM rooms r
	INNER JOIN room_type rt ON r.rooms_type_rooms_type_id = rt.room_type_id
	WHERE rt.room_cost >= '50' AND rt.room_cost <= '100';
    
    
-- Query for retrieving the upcoming bookings for a specific guest: 

SELECT t.users_first_name, t.users_last_name, b.booking_id, b.check_in_date, b.check_out_date, h.hotel_name
FROM bookings b
INNER JOIN hotel h ON b.hotel_hotel_id = h.hotel_id 
INNER JOIN users t ON b.users_user_id = t.users_id
WHERE b.check_in_date >= CURRENT_DATE();


-- Function that returns the cost per night for a specific booking_id
SELECT show_cost_per_night(61);


-- View that shows us all bookings done with the first and last names of the users, as well as the type of room they booked and the numbers of the rooms
SELECT * FROM bookings_view;


-- Function that checks for a given check in date and check out date if a booking exists  

SELECT check_for_bookings('2023-06-06', '2023-06-12');


-- Function that shows us all available rooms for a certain date
 Select get_available_rooms2('2023-06-06','2023-06-13');
 
 
 -- PROCEDURE THAT FOR A INPUTED PHONE NUMBER SHOWS ALL BOOKINGS MADE BY THE PERSON THE PHONE NUMBER BELONGS TO
CALL GetBookingDetailsByPhoneNo('555-333');


-- This query will retrieve all rows from the users table where the uppercase version of the users_first_name column starts with 'aDi'. 
-- The % wildcard matches any sequence of characters following 'aDi'.
SELECT *
FROM users
WHERE UPPER(users_first_name) LIKE 'aDi%';


-- Show the room types that have been booked for a total cost greater than $500

SELECT rt.room_type_name, SUM(b.cost_per_night) as total_cost
FROM room_type rt
INNER JOIN rooms r ON rt.room_type_id = r.rooms_type_rooms_type_id
INNER JOIN rooms_booked rb ON r.room_id = rb.rooms_room_id
INNER JOIN bookings b ON rb.bookings_booking_id = b.booking_id
GROUP BY rt.room_type_name
HAVING total_cost > 100;


-- Show all users which have a contact number longer than 4 digits

SELECT users_id, users_first_name, users_last_name, users_contact_number
FROM users
GROUP BY users_id, users_first_name, users_last_name, users_contact_number
HAVING LENGTH(users_contact_number) > 4;


    
    
    
    
    
    
    
    
 
    
    
  
  
  