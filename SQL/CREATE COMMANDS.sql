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
   username VARCHAR(45),
   password VARCHAR(200),
   users_first_name  VARCHAR(45) NULL,
   users_last_name  VARCHAR(45) NULL,
   users_address VARCHAR(45) NULL,
   users_contact_number  VARCHAR(12) NULL,
   users_email_address  VARCHAR(45) NULL,
   user_admin BOOLEAN NOT NULL,
  PRIMARY KEY ( users_id )
 
);


 CREATE TABLE bookings  (
   booking_id  INT NOT NULL,
   booking_date  DATETIME NULL,
   duration_of_stay  VARCHAR(10) NULL,
   check_in_date  DATETIME NULL,
   check_out_date  DATETIME NULL,
   booking_payment_type  VARCHAR(45) NULL,
   hotel_hotel_id  INT NOT NULL,
   users_user_id  INT NOT NULL,
   total_cost  DECIMAL(10,2) NULL,
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
  CONSTRAINT  fk_rooms_booked_rooms1 FOREIGN KEY ( rooms_room_id )REFERENCES rooms  ( room_id )
);


ALTER TABLE bookings
ADD COLUMN total_cost DECIMAL(10, 2) GENERATED ALWAYS AS (cost_per_night * duration_of_stay) STORED;

ALTER TABLE bookings
ADD COLUMN duration_of_stay INT GENERATED ALWAYS AS (DATEDIFF(check_out_date, check_in_date)) STORED;


