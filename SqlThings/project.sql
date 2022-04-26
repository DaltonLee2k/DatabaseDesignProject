CREATE TABLE League (
    League_ID int(3),
    League_name varchar(20),
    Num_of_teams int,
    PRIMARY KEY (League_ID)
);


CREATE TABLE Team (
    Team_ID int(4) NOT NULL,
    City varchar(20),
    Team_name varchar(20),
    League_ID int(3) NOT NULL,
    FOREIGN KEY (League_ID) REFERENCES League (League_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (Team_ID)
);

CREATE TABLE Team_season (
    Team_ID int(4) NOT NULL,
    Season_year int,
    wins int,
    losses int,
    ties int,
    PRIMARY KEY (Team_ID, Season_year),
    FOREIGN KEY (Team_ID) REFERENCES Team (Team_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    CHECK (Season_year IN ('2022','2021','2020','2019')),
    CHECK (wins<=20 AND losses<=20)
);

CREATE TABLE Players (
    Player_ID int(5) NOT NULL,
    Team_ID int(4) NOT NULL,
    Player_name varchar(25),
    Position varchar(2) NOT NULL,
    Age int(2),
    Years_played int,
    PRIMARY KEY (Player_ID),
    FOREIGN KEY (Team_ID) REFERENCES Team (Team_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    CHECK (Position IN ('QB','HB','WR','TE','DL','LB','DB'))
);

CREATE TABLE Coaches (
    Coach_ID int(5) NOT NULL,
    Team_ID int(4),
    Coach_name varchar(20),
    Career_wins int DEFAULT 0,
    Career_losses int DEFAULT 0,
    Hire_date date,
    PRIMARY KEY (Coach_ID),
    FOREIGN KEY (Team_ID) REFERENCES Team (Team_ID) ON UPDATE CASCADE ON DELETE CASCADE

);

CREATE TABLE Games (
    Game_ID int(2),
    Team1_ID int(4),
    Team2_ID int(4),
    Team1_points int DEFAULT 0,
    Team2_points int DEFAULT 0,
    winner int(4) DEFAULT 0000,
    game_date date,
    PRIMARY KEY (Game_ID),
    FOREIGN KEY (Team1_ID) REFERENCES Team(Team_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (Team2_ID) REFERENCES Team(Team_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (winner) REFERENCES Team(Team_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    CHECK (Team1_points < 100),
    CHECK (Team2_points < 100)
);

CREATE TABLE Yearly_awards (
    Award_ID int(3),
    League_ID int(3),
    League_MVP int(5) NOT NULL,
    League_Champion int(4) NOT NULL,
    Season_year int(4),
    PRIMARY KEY (Award_ID),
    FOREIGN KEY (League_MVP) REFERENCES Players (Player_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (League_Champion) REFERENCES Team (Team_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (League_ID) REFERENCES League (League_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    CHECK (Season_year IN ('2022','2021','2020','2019'))
);

CREATE TABLE Stadiums (
    Stadium_ID int(3),
    Team_ID int(4),
    Capacity int,
    Stadium_name varchar(20),
    PRIMARY KEY (Stadium_ID),
    FOREIGN KEY (Team_ID) REFERENCES Team (Team_ID) ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE Season_off_stats (
    Player_ID int(5),
    Team_ID int(4),
    Pass_yards int DEFAULT 0,
    Rush_yards int DEFAULT 0,
    Recieving_yards int DEFAULT 0,
    Total_yards int DEFAULT 0,
    Total_TDs int DEFAULT 0,
    stat_year int,
    PRIMARY KEY (Player_ID, Team_ID, stat_year),
    FOREIGN KEY (Player_ID) REFERENCES Players (Player_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (Team_ID) REFERENCES Team (Team_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    CHECK (stat_year IN ('2022','2021','2020','2019'))

);

CREATE TABLE Season_def_stats (
    Player_ID int(5),
    Team_ID int(3),
    Tackles int DEFAULT 0,
    Sacks int DEFAULT 0,
    Takeaways int DEFAULT 0,
    Def_TDs int DEFAULT 0,
    stat_year int,
    PRIMARY KEY (Player_ID, Team_ID, stat_year),
    FOREIGN KEY (Player_ID) REFERENCES Players (Player_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (Team_ID) REFERENCES Team (Team_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    CHECK (stat_year IN ('2022','2021','2020','2019'))
);
