INSERT INTO `musicmeetups`.`host`(`email`, `name`, `number`, `location`, `maxguests`, `description`) VALUES
('astratev@nvm.gg', 'Alexander Stratev', '0776543212', 'bul. Bulgaria, 24, Sofia', 30, 'Има пиене срещу заплащане! Може и собствен алкохол.'),
('akirkov@nvm.gg', 'Alexander Kirkov', '0776543211', 'Mladost 3, 29, Sofia', 10, 'Къщата не е много голяма. Носете си пиене. Имам и 2 кучета, но са много мили с хората :)'),
('avasileva@nvm.gg', 'Anna Vasileva', '0773213456', 'Rodopski Izvor, 49, Sofia', 25, 'Мястото е бар, има голям избор от алкохол.'),
('gpavlova@nvm.gg', 'Gergana Pavlova', '0777713465', 'Pavlovo, 40, Sofia', 27, 'След приключване на изпълнението, музиката е по желание на хората. Мястото е новоотворен бар.'),
('gnikolov@nvm.gg', 'Gencho Nikolov', '0775555466', 'bul. Gotse Delchev, 21, Sofia', 12, 'Ще има безплатна домашна ракия!');

INSERT INTO `musicmeetups`.`performer`(`email`, `name`, `number`, `description`) VALUES
('icochovek@nvm.gg', 'Hristo Hristov', '0775389677', 'Рапа е в кръвта ми! East Cost!!'),
('dim.angelov@nvm.gg', 'Dimitar Angelov', '0776588768', 'Свиря на електрическа китара от около 13 години. Нямам подготвена програма, всичко е по желание на хората :)'),
('dimodimo@nvm.gg', 'Dimo Gerov', '0775432221', 'Свиря на саксофон от много малък. Имам няколко подготвени изпълнения, след това може пож елание на хората.'),
('acho@nvm.gg', 'Angel Hristov', '07732216789', 'Водя и групата си с мен, носим си цялото оборудване.'),
('anel@nvm.gg', 'Anka Antonova', '0778997753', 'Занимавам се с народно пеене от 5 годишна.');

INSERT INTO `musicmeetups`.`attender` (`email`, `name`, `countoffriends`) VALUES
('penny@nvm.gg', 'Penka Penkova', 0),
('eyo@nvm.gg', 'Elka Yoneva', 1),
('jakimaki@nvm.gg', 'Jaklin Aneva', 2),
('aivan@nvm.gg', 'Ivan Ivanov', 2),
('rokiro@nvm.gg', 'Kiro Kirov', 0),
('atanov@nvm.gg', 'Atanas Asenov', 1),
('penata@nvm.gg', 'Pencho Dimov', 1),
('asenkaj@nvm.gg', 'Asenka Jileva', 1),
('asad@nvm.gg', 'Aneta Sadeva', 0);

#events without performer
INSERT INTO `musicmeetups`.`event` (`hostid`, `date`, `remainingplaces`) VALUES
(1, '27/01/2018 20:00', 30),
(3, '30/01/2018 19:30', 25),
(4, '23/01/2018 20:30', 27);

#ready events
INSERT INTO `musicmeetups`.`event` (`hostid`, `performerid`, `date`, `remainingplaces`, `minpayment`) VALUES
(1, 2, '26/01/2018 19:30', 30, 13),
(2, 1, '31/01/2018 20:00', 10, 10),
(3, 4, '07/02/2018 19:00', 25, 15),
(5, 5, '02/02/2018 17:30', 12, 10),
(5, 5, '16/02/2018 18:30', 12, 10);

INSERT INTO `musicmeetups`.`eventattender`(`eventid`, `attenderid`, `countoffriends`) VALUES
(4, 3, 2),
(4, 4, 2),
(4, 1, 0),
(5, 6, 1),
(5, 1, 0),
(6, 9, 0),
(6, 8, 1),
(6, 7, 1),
(7, 2, 1),
(7, 6, 1),
(7, 7, 1),
(7, 8, 1),
(8, 3, 2),
(8, 8, 1);
