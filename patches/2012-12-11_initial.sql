-- Create the users table
DROP TABLE IF EXISTS thymely_users;
CREATE TABLE IF NOT EXISTS thymely_users (
    user_id   int primary key auto_increment,
    email     varchar(255) not null unique,
    password  varchar(255) not null,
    firstname varchar(127) not null,
    lastname  varchar(127) not null,
    date_created  timestamp not null default current_timestamp,
    date_modified timestamp not null default 0,
    date_deleted  timestamp not null default 0
);

DROP TABLE IF EXISTS thymely_timings;
CREATE TABLE IF NOT EXISTS thymely_timings (
    timing_id bigint primary key auto_increment,
    parent_timing_id bigint default null,
    user_id int not null,
    title varchar(255) not null default 0,
    date_created  timestamp not null default current_timestamp,
    date_modified timestamp not null default 0,
    date_deleted  timestamp not null default 0
    
);