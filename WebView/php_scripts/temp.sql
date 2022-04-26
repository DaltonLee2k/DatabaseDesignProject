SELECT League_name, Player_name AS MVP, Team_name AS League_Champion, Season_year
FROM Players AS P , Team AS T, League AS L, Yearly_awards AS A
WHERE (P.Player_ID = A.League_MVP) AND (T.Team_ID = A.League_Champion) AND (Season_Year = 2019)
AND (L.League_ID = A.League_ID);