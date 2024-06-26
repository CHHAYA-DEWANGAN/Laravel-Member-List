Create Table


REATE TABLE Members (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    CreatedDate DATETIME NOT NULL,
    Name VARCHAR(50) NOT NULL,
    ParentId INT,
    CONSTRAINT FK_Parent FOREIGN KEY (ParentId) REFERENCES Members(Id)
);


Insert Dummy data 

INSERT INTO Members (CreatedDate, Name, ParentId) VALUES
('2024-01-01 10:00:00', 'John Doe', NULL),
('2024-01-01 11:00:00', 'Jane Doe', 1),
('2024-01-01 12:00:00', 'Jim Smith', 1),
('2024-01-01 13:00:00', 'Jessica Jones', 2),
('2024-01-01 14:00:00', 'Jack Brown', 2),
('2024-01-01 15:00:00', 'Julie White', 3),
('2024-01-01 16:00:00', 'Jason Black', 3),
('2024-01-01 17:00:00', 'Jill Green', 4),
('2024-01-01 18:00:00', 'Joe Blue', 5),
('2024-01-01 19:00:00', 'Janet Yellow', 6);
[22:06, 25/6/2024] Shadow Dewangan: C
