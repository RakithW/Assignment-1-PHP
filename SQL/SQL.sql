CREATE TABLE pizzaPerson(
    id int not null auto_increment,
    fname varchar(255) not null,
    lname varchar(255) not null,
    email varchar(255) not null,
    phoneNum varchar(255) not null,
    address varchar(255) not null,
    pizzatype varchar(255) not null,
    primary key (id)
    );
INSERT INTO pizzaPerson(fname,lname,email,phoneNum,address,pizzatype)
VALUES
    ('Rocky','Bob','RockyBob@gmail.com','647-235-2495','123 Stoneylake ave','cheese pizza');