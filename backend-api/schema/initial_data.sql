create table users (
   id char(16) not null primary key,
   name varchar(191) not null,
   email varchar(191) not null,
   password varchar(191) not null,
   created_at timestamp default current_timestamp() not null,
   updated_at timestamp default current_timestamp() not null
);

create table pins (
    id char(16) not null primary key,
    user_id char(16) not null,
    constraint foreign key (user_id) references users(id) on delete cascade,
    name varchar(191) not null,
    description varchar(191) not null,
    content char(16) not null,
    constraint foreign key (user_id) references users(id) on delete cascade,
    created_at timestamp default current_timestamp() not null,
   updated_at timestamp default current_timestamp() not null
);

create table contents (
     id char(16) not null primary key,
     name varchar(191) not null,
     type ENUM('IMAGE', 'URL') not null default 'IMAGE',
     url varchar(191) not null,
     created_at timestamp default current_timestamp() not null,
     updated_at timestamp default current_timestamp() not null
);

create table pin_content (
    pin_id char(16) not null,
    constraint foreign key (pin_id) references pins(id) on delete cascade,
    content_id char(16) not null,
    constraint foreign key (content_id) references contents(id) on delete cascade,
    created_at timestamp default current_timestamp() not null,
    updated_at timestamp default current_timestamp() not null,
    unique(pin_id, content_id)
);
