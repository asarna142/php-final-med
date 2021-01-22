drop database if exists IssueTracker;
create database if not exists IssueTracker;
use IssueTracker;

create table Users (
	id int unsigned auto_increment primary key,
    name_of_user nvarchar(255) not null,
    username nvarchar(30) not null,
    password nvarchar(50) not null
);

create table Issues (
	id int unsigned auto_increment primary key,
    user_id int unsigned not null,
    title_issue nvarchar(255) not null,
    description text,
    start_date date not null,
    end_date date not null
);

alter table Issues add constraint users_issue_fk foreign key (user_id) references Users(id) on delete cascade;

insert into Users (name_of_user, username, password) VALUES ("Alex Test","alex-test","pass-test");

# more to add with instances of this issue - i am not convinced i want to do it this way, but it is a start

create table IssueReoccurances (
	id int unsigned auto_increment primary key,
    issue_id int unsigned not null,
    reoccur_date date not null,
    notes text
);

alter table IssueReoccurances add constraint Issues_IssueReoccurances_fk foreign key (issue_id) references Issues(id) on delete cascade;