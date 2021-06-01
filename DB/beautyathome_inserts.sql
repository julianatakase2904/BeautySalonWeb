USE beautyathome;
INSERT INTO Service VALUES (1, 'Female Haircut', 100.00, 'Hair'), (2, 'Male Haircut', 80.00, 'Hair'),
(3, 'Shampoo & Styling', 40.00, 'Hair'), (4, 'Hair Botox', 200.00, 'Hair'), (5, 'Colour', 220.00, 'Hair'), 
(6, 'Highlight', 200.00, 'Hair'), (7, 'Manicure & Pedicure Combo', 70.00, 'Nails'), (8, 'Manicure', 35.00, 'Nails'),
(9, 'Pedicure', 45.00, 'Nails'), (10, 'Make-Up', 70.00, 'Face & Body'), (11, 'Brazilian Waxing - Full Legs', 60.00, 'Face & Body'),
(12, 'Facial Hydrolifting', 135.00, 'Face & Body'), (13, 'Massage Therapy', 155.00, 'Face & Body');

INSERT INTO User (firstName, lastName, username, email, address, password) VALUES ('admin', 'admin', 
'admin', 'admin@beautyathome.ca', '5510 Admiral Way', '$2y$10$X9F5tDCczLld8vX2T./UBOEgomELoetAEqtw.1G/z0EjgCL6nTWRS');