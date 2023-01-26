CREATE TABLE IF NOT EXISTS users (
    user_id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(10) NOT NULL,
    title VARCHAR(10) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender VARCHAR(6) NOT NULL,
    address1 VARCHAR(50) NOT NULL,
    address2 VARCHAR(50) NOT NULL,
    address3 VARCHAR(50) NOT NULL,
    postcode VARCHAR(10) NOT NULL,
    description VARCHAR(200) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telephone VARCHAR(15) NOT NULL,
    profile_url VARCHAR(100) NOT NULL,
    PRIMARY KEY (user_id)
);
CREATE TABLE event_details (
  event_id INT(11) NOT NULL AUTO_INCREMENT,
  event_name VARCHAR(100) NOT NULL,
  event_description VARCHAR(500),
  event_category VARCHAR(50),
  keywords VARCHAR(100),
  video_url VARCHAR(100),
  image_url VARCHAR(100),
  start_date DATE,
  end_date DATE,
  PRIMARY KEY (event_id)
);

ALTER TABLE event_details
ADD user_id INT(11) NOT NULL,
ADD FOREIGN KEY (user_id) REFERENCES events_users(user_id);
