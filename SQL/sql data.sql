SET foreign_key_checks = 0;


INSERT INTO users (users_id, username, password, users_first_name, users_last_name, users_address, users_contact_number, users_email_address,user_admin)
VALUES 
(1, 'jdoe', 'mypass', 'John', 'Doe', '123 Main St, Anytown USA', '555-555-5555', 'johndoe@email.com','Yes'),
(2, 'janedoe', 'secret', 'Jane', 'Doe', '456 Park Ave, Anytown USA', '555-123-4567', 'janedoe@email.com','No'),
(3, 'bsmith', 'p@ssword', 'Bob', 'Smith', '789 Elm St, Anytown USA', '555-987-6543', 'bobsmith@email.com','No'),
(4, 'mjohnson', 'letmein', 'Mary', 'Johnson', '101 Oak St, Anytown USA', '555-111-2222', 'maryjohnson@email.com','No'),
(5, 'jwilliams', '123456', 'James', 'Williams', '345 Maple Ave, Anytown USA', '555-777-8888', 'jameswilliams@email.com','No'),
(6, 'alee', 'qwerty', 'Alice', 'Lee', '678 Pine St, Anytown USA', '555-222-3333', 'alicelee@email.com','No'),
(7, 'jchen', 'asdfgh', 'Jack', 'Chen', '901 Cedar Ln, Anytown USA', '555-444-5555', 'jackchen@email.com','No'),
(8, 'ksmith', 'pa$$word', 'Kelly', 'Smith', '234 Oak Ave, Anytown USA', '555-333-2222', 'kellysmith@email.com','No'),
(9, 'mbrown', 'monkey', 'Michael', 'Brown', '567 Main St, Anytown USA', '555-444-3333', 'michaelbrown@email.com','No'),
(10, 'rlee', 'iloveyou', 'Rachel', 'Lee', '890 Elm St, Anytown USA', '555-111-3333', 'rachellee@email.com','No'),
(11, 'tnguyen', 'dragon', 'Thomas', 'Nguyen', '123 Park Ave, Anytown USA', '555-555-4444', 'thomasnguyen@email.com','No'),
(12, 'lchan', '123abc', 'Lucy', 'Chan', '456 Main St, Anytown USA', '555-444-2222', 'lucychan@email.com','No'),
(13, 'pthomas', '1q2w3e', 'Peter', 'Thomas', '789 Oak Ave, Anytown USA', '555-222-1111', 'peterthomas@email.com','No'),
(14, 'sbrown', 'trustno1', 'Sarah', 'Brown', '901 Cedar St, Anytown USA', '555-333-4444', 'sarahbrown@email.com','Yes'),
(15, 'twhite', 'sunshine', 'Tyler', 'White', '234 Maple Ln, Anytown USA', '555-666-7777', 'tylerwhite@email.com','No'),
(16, 'jmorris', 'password', 'Jessica', 'Morris', '567 Elm Ave, Anytown USA', '555-777-2222', 'jessicamorris@email.com','No');


INSERT INTO hotel (hotel_id, hotel_name, hotel_address, hotel_contact_number, hotel_email_address, hotel_star_rating, hotel_website, hotel_description, hotel_floor_count, hotel_room_capacity, check_in_time, check_out_time)
VALUES
(1, 'Grand Hotel', '123 Main St, Anytown USA', '555-555-5555', 'info@grandhotel.com', 5, 'http://www.grandhotel.com', 'Luxury hotel with world-class amenities', 20, 500, '3:00 PM', '12:00 PM'),
(2, 'Majestic Hotel', '456 Park Ave, Anytown USA', '555-123-4567', 'reservations@majestichotel.com', 4, 'http://www.majestichotel.com', 'Historic hotel with classic charm', 10, 250, '2:00 PM', '11:00 AM'),
(3, 'Sunny Beach Resort', '789 Elm St, Anytown USA', '555-987-6543', 'info@sunnybeachresort.com', 3, 'http://www.sunnybeachresort.com', 'Family-friendly resort with lots of activities', 5, 1000, '4:00 PM', '10:00 AM'),
(4, 'Mountain View Lodge', '101 Oak St, Anytown USA', '555-111-2222', 'reservations@mountainviewlodge.com', 2, 'http://www.mountainviewlodge.com', 'Rustic lodge with stunning mountain views', 3, 50, '3:00 PM', '11:00 AM'),
(5, 'Island Retreat Hotel', '345 Maple Ave, Anytown USA', '555-777-8888', 'info@islandretreathotel.com', 3, 'http://www.islandretreathotel.com', 'Relaxing hotel on a tropical island', 7, 200, '3:00 PM', '11:00 AM'),
(6, 'City View Suites', '678 Pine St, Anytown USA', '555-222-3333', 'reservations@cityviewsuites.com', 4, 'http://www.cityviewsuites.com', 'Spacious suites with panoramic city views', 15, 100, '4:00 PM', '12:00 PM'),
(7, 'Seaside Inn', '901 Cedar Ln, Anytown USA', '555-444-5555', 'info@seasideinn.com', 2, 'http://www.seasideinn.com', 'Quaint inn with ocean views', 2, 20, '3:00 PM', '11:00 AM'),
(8, 'The Grand Resort', '234 Oak Ave, Anytown USA', '555-333-2222', 'reservations@thegrandresort.com', 5, 'http://www.thegrandresort.com', 'Luxury resort with world-class amenities', 25, 750, '4:00 PM', '12:00 PM'),
(9, 'Country Lodge', '567 Main St, Anytown USA', '555-444-3333', 'info@countrylodge.com', 2, 'http://www.countrylodge.com', 'Cozy lodge in a quiet country setting', 2, 30, '3:00 PM', '11:00 AM')
;

INSERT INTO room_type (room_type_id, room_type_name, room_cost, room_type_description, smoke_friendly, pet_friendly)
VALUES
(1, 'Standard Room', 100, 'Basic room with one bed', 'yes', 'no'),
(2, 'Double Room', 150, 'Room with two beds', 'yes', 'yes'),
(3, 'Deluxe Room', 200, 'Spacious room with upgraded amenities', 'no', 'yes'),
(4, 'Suite', 250, 'Large room with separate living area and kitchenette', 'no', 'no'),
(5, 'Family Suite', 300, 'Two connecting rooms with shared bathroom', 'yes', 'yes'),
(6, 'Honeymoon Suite', 350, 'Romantic room with king-sized bed and whirlpool tub', 'no', 'no'),
(7, 'Executive Suite', 400, 'Luxurious room with separate living and dining areas', 'no', 'no'),
(8, 'Penthouse Suite', 500, 'Top-floor room with stunning views and private balcony', 'no', 'no'),
(9, 'Studio Apartment', 200, 'Self-contained apartment with kitchen and living area', 'yes', 'yes'),
(10, 'One-Bedroom Apartment', 250, 'Apartment with separate bedroom and living area', 'no', 'yes'),
(11, 'Two-Bedroom Apartment', 300, 'Apartment with two separate bedrooms and living area', 'no', 'yes'),
(12, 'Presidential Suite', 1000, 'The most luxurious suite in the hotel', 'no', 'no'),
(13, 'Junior Suite', 300, 'Spacious room with separate sitting area', 'yes', 'yes'),
(14, 'Accessible Room', 150, 'Room with wheelchair-accessible features', 'yes', 'yes'),
(15, 'Pet Suite', 200, 'Room with special amenities for pets', 'no', 'yes'),
(16, 'Family Room', 250, 'Room with multiple beds for families or groups', 'yes', 'yes'),
(17, 'Jacuzzi Suite', 350, 'Room with a private Jacuzzi tub', 'no', 'no'),
(18, 'Pool View Room', 175, 'Room with a view of the hotel pool', 'yes', 'no'),
(19, 'Ocean View Room', 225, 'Room with a view of the ocean', 'no', 'no'),
(20, 'Garden View Room', 175, 'Room with a view of the hotel gardens', 'yes', 'yes');

INSERT INTO rooms (room_id, room_number, rooms_type_rooms_type_id, hotel_hotel_id)
VALUES
(1, 101, 1, 1),
(2, 102, 1, 1),
(3, 201, 2, 2),
(4, 202, 2, 2),
(5, 301, 3, 3),
(6, 302, 3, 3),
(7, 401, 4, 4),
(8, 402, 4, 4),
(9, 501, 5, 5),
(10, 502, 5, 5),
(11, 601, 6, 6),
(12, 602, 6, 6),
(13, 701, 7, 7),
(14, 702, 7, 7),
(15, 801, 8, 8),
(16, 802, 8, 8),
(17, 901, 9, 9),
(18, 902, 9, 9),
(19, 1001, 10, 1),
(20, 1002, 10, 1);


INSERT INTO bookings (booking_id, booking_date, duration_of_stay, check_in_date, check_out_date, booking_payment_type, total_rooms_booked, hotel_hotel_id, users_user_id, total_amount)
VALUES
(1, '2023-05-01', 5, '2023-05-05', '2023-05-10', 'Credit Card', 2, 1, 1, 500),
(2, '2023-05-02', 3, '2023-05-07', '2023-05-10', 'Cash', 1, 2, 2, 300),
(3, '2023-05-03', 2, '2023-05-09', '2023-05-11', 'Credit Card', 1, 3, 3, 200),
(4, '2023-05-04', 7, '2023-05-10', '2023-05-17', 'Credit Card', 3, 4, 4, 800),
(5, '2023-05-05', 1, '2023-05-08', '2023-05-09', 'Cash', 1, 5, 5, 100),
(6, '2023-05-06', 4, '2023-05-12', '2023-05-16', 'Credit Card', 2, 6, 6, 400),
(7, '2023-05-07', 2, '2023-05-15', '2023-05-17', 'Credit Card', 1, 7, 7, 200),
(8, '2023-05-08', 3, '2023-05-20', '2023-05-23', 'Cash', 1, 8, 8, 300),
(9, '2023-05-09', 6, '2023-05-18', '2023-05-24', 'Credit Card', 3, 9, 9, 600),
(10, '2023-05-10', 1, '2023-05-19', '2023-05-20', 'Cash', 1, 7, 10, 100),
(11, '2023-05-11', 4, '2023-05-21', '2023-05-25', 'Credit Card', 2, 1, 11, 400),
(12, '2023-05-12', 3, '2023-05-22', '2023-05-25', 'Credit Card', 1, 2, 12, 300),
(13, '2023-05-13', 2, '2023-05-24', '2023-05-26', 'Cash', 1, 3, 13, 200),
(14, '2023-05-14', 7, '2023-05-25', '2023-06-01', 'Credit Card', 3, 4, 14, 800),
(15, '2023-05-15', 1, '2023-05-28', '2023-05-29', 'Credit Card', 1, 5, 15, 100)


CREATE TABLE  hotel (
  hotel_id INT NOT NULL,
  hotel_name VARCHAR(45) NULL,
  hotel_address VARCHAR(45) NULL,
  hotel_contact_number VARCHAR(12) NULL,
  hotel_email_address VARCHAR(45) NULL,
  hotel_star_rating int(5) NULL,
  hotel_website VARCHAR(45) NULL,
  hotel_description VARCHAR(100) NULL,
  hotel_floor_count INT NULL,
  hotel_room_capacity INT NULL,
  check_in_time TIME NULL,
  check_out_time TIME NULL,
  PRIMARY KEY (hotel_id)
);


CREATE TABLE room_type (
  room_type_id INT NOT NULL,
  room_type_name VARCHAR(45) NULL,
  room_cost DECIMAL(10,2) NULL,
  room_type_description VARCHAR(100) NULL,
  smoke_friendly INT NULL,
  pet_friendly INT NULL,
  PRIMARY KEY (room_type_id)
);



CREATE TABLE rooms (
  room_id INT NOT NULL,
  room_number INT NULL,
  rooms_type_rooms_type_id INT NOT NULL,
  hotel_hotel_id INT NOT NULL,
  PRIMARY KEY (room_id, rooms_type_rooms_type_id, hotel_hotel_id),
  CONSTRAINT fk_rooms_rooms_type1 FOREIGN KEY (rooms_type_rooms_type_id) REFERENCES room_type (room_type_id),
  CONSTRAINT fk_rooms_hotel1 FOREIGN KEY (hotel_hotel_id) REFERENCES hotel (hotel_id)
   
);



CREATE TABLE  users  (
   users_id  INT NOT NULL,
   users_first_name  VARCHAR(45) NULL,
   users_last_name  VARCHAR(45) NULL,
   users_address VARCHAR(45) NULL,
   users_contact_number  VARCHAR(12) NULL,
   users_email_address  VARCHAR(45) NULL,
   users_credit_card  VARCHAR(45) NULL,
   users_id_proof  VARCHAR(45) NULL,
  PRIMARY KEY ( users_id )
 
);


 CREATE TABLE bookings  (
   booking_id  INT NOT NULL,
   booking_date  DATETIME NULL,
   duration_of_stay  VARCHAR(10) NULL,
   check_in_date  DATETIME NULL,
   check_out_date  DATETIME NULL,
   booking_payment_type  VARCHAR(45) NULL,
   total_rooms_booked  INT NULL,
   hotel_hotel_id  INT NOT NULL,
   users_user_id  INT NOT NULL,
   total_amount  DECIMAL(10,2) NULL,
  PRIMARY KEY ( booking_id ),
  CONSTRAINT  fk_bookings_hotel1 FOREIGN KEY ( hotel_hotel_id ) REFERENCES   hotel  ( hotel_id ),
  CONSTRAINT fk_bookings_guest1 FOREIGN KEY (users_user_id) REFERENCES users(users_id)
 
);


CREATE TABLE rooms_booked  (
   rooms_booked_id  INT NOT NULL,
   bookings_booking_id  INT NOT NULL,
   rooms_room_id  INT NOT NULL,
  PRIMARY KEY ( rooms_booked_id),
  CONSTRAINT  fk_rooms_booked_bookings1 FOREIGN KEY ( bookings_booking_id )REFERENCES  bookings  ( booking_id ) ,
  CONSTRAINT  fk_rooms_booked_rooms1 FOREIGN KEY ( rooms_room_id )REFERENCES rooms  ( room_id ),
     
      
);


