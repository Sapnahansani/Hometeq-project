CREATE TABLE Product (
    prodId INT(4) NOT NULL AUTO_INCREMENT,
    prodName VARCHAR(30) NOT NULL,
    prodPicNameSmall VARCHAR(100) NOT NULL,
    prodPicNameLarge VARCHAR(100) NOT NULL,
    prodDescripShort VARCHAR(1000),
    prodDescripLong VARCHAR(3000),
    prodPrice DECIMAL(6,2) NOT NULL,
    prodQuantity INT(4) NOT NULL,
    PRIMARY KEY (prodId)
	
	INSERT INTO Product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES 
('Smart Speaker', 'speaker_small.jpg', 'speaker_large.jpg', 'Voice-controlled smart speaker.', 'This smart speaker connects to your home Wi-Fi and allows you to control your smart devices using voice commands.', 99.99, 50),
('Smart Thermostat', 'thermostat_small.jpg', 'thermostat_large.jpg', 'Energy-saving smart thermostat.', 'Control your home heating remotely and save energy with this smart thermostat.', 149.99, 30),
('Smart Security Camera', 'camera_small.jpg', 'camera_large.jpg', 'HD smart security camera.', 'Monitor your home remotely with this HD smart security camera.', 79.99, 20),
('Smart Watch', 'watch_small.jpg', 'watch_large.jpg', 'Fitness and health smart watch.', 'Track your fitness and health with this advanced smart watch.', 199.99, 15);
);