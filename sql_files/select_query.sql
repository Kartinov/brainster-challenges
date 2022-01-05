# 00 -> List all information from each table separately
SELECT * FROM `countries`;
SELECT * FROM `cities`;
SELECT * FROM `locations`;
SELECT * FROM `genres`;
SELECT * FROM `genre_movie`;
SELECT * FROM `movies`;
SELECT * FROM `films`;
SELECT * FROM `premieres`;
SELECT * FROM `oscars`;
SELECT * FROM `productions`;
SELECT * FROM `tv_series`;
SELECT * FROM `tv_channels`;
SELECT * FROM `directors`;
SELECT * FROM `expertise`;
SELECT * FROM `expertise_director`;
SELECT * FROM `roles`;
SELECT * FROM `actors`;
SELECT * FROM `actor_movie`;
SELECT * FROM `agents`;
SELECT * FROM `critics`;
SELECT * FROM `critic_movie`;
SELECT * FROM `critic_actor_movie`;

# 01 -> List information about the movies (name of film, premiere date, genre,
# 		country of origin, production, number of actors)
SELECT 
    `movies_info`.`movie`,
    `movies_info`.`first_premiere`,
    `movies_info`.`genre`,
    `movies_info`.`origin`,
    `movies_info`.`production`,
    COUNT(*) AS `actors_acting`
FROM
    (SELECT 
        `movies`.`id`,
            `movies`.`name` AS `movie`,
            `movies`.`premiere_date` AS `first_premiere`,
            GROUP_CONCAT(`genres`.`genre` SEPARATOR ' <-> ') AS `genre`,
            `countries`.`country` AS `origin`,
            `productions`.`name` AS `production`
    FROM
        `movies`
    JOIN `genre_movie` ON `movies`.`id` = `genre_movie`.`movie_id`
    JOIN `genres` ON `genre_movie`.`genre_id` = `genres`.`id`
    JOIN `locations` ON `movies`.`location_id` = `locations`.`id`
    JOIN `countries` ON `locations`.`country_id` = `countries`.`id`
    JOIN `productions` ON `movies`.`production_id` = `productions`.`id`
    GROUP BY `movies`.`id`
    ORDER BY `first_premiere` DESC) AS `movies_info`
        JOIN
    `actor_movie` ON `movies_info`.`id` = `actor_movie`.`movie_id`
GROUP BY `movies_info`.`id`;

# 02 -> List all information for the actors (first name, last name, nick name,
# 		date of birth, agent code and number of movies in which have acted)
SELECT 
    `firstname`,
    `lastname`,
    `nickname`,
    `dob`,
    `agent_code`,
    COUNT(*) AS `movie_acted`
FROM
    `actors`
        JOIN
    `actor_movie` ON `actors`.`id` = `actor_movie`.`actor_id`
GROUP BY `actors`.`id`
ORDER BY `movie_acted` DESC;

# 03 -> List all films with their information (premiere city, how much money
# 		they have made during the first week of premiere, and premiere format
#		(2D - 3D), ordered by premiere format
SELECT 
    GROUP_CONCAT(`cities`.`city` SEPARATOR ' -- ') AS `Premiere IN`,
    SUM(`earned`) AS `Earned first week`,
    `format`
FROM
    `premieres`
        JOIN
    `locations` ON `premieres`.`location_id` = `locations`.`id`
        JOIN
    `cities` ON `locations`.`city_id` = `cities`.`id`
        JOIN
    `films` ON `premieres`.`film_id` = `films`.`id`
GROUP BY `premieres`.`film_id`;

# 04 -> List all information about the oscar winners (for which movie they have
# 		won an oscar, for which role in that movie and in which year, as well as
# 		the name of the first name of the actor, last name, nick name, date of
# 		birth and agent code). List all this information sorted by the year in
# 		which they have won the oscar, so that the newest will be first.
SELECT 
    `actors`.`firstname`,
    `actors`.`lastname`,
    `actors`.`nickname`,
    `roles`.`role`,
    `movies`.`name` AS `movie`,
    `oscars`.`year` AS `year_won`,
    `actors`.`dob` AS `actor_birth`,
    `actors`.`agent_code`
FROM
    `oscars`
        JOIN
    `films` ON `oscars`.`film_id` = `films`.`id`
        JOIN
    `movies` ON `films`.`movie_id` = `movies`.`id`
        JOIN
    `actor_movie` ON `oscars`.`actor_id` = `actor_movie`.`actor_id`
        JOIN
    `actors` ON `oscars`.`actor_id` = `actors`.`id`
        JOIN
    `roles` ON `actor_movie`.`role_id` = `roles`.`id`
GROUP BY `oscars`.`actor_id`
ORDER BY `year_won` DESC;

# 05 -> List all information about the films, along with the actors that have
# 		acted in them and the directors which have directed them, ordered by
# 		the director's names.
SELECT 
    `movies`.`name` AS `movie`,
    CONCAT(`directors`.`firstname`,
            ' ',
            `directors`.`lastname`) AS `movie_directors`,
    `movies`.`premiere_date`,
    `countries`.`country`,
    `cities`.`city`,
    GROUP_CONCAT(CONCAT(`actors`.`firstname`, ' ', `actors`.`lastname`)
        SEPARATOR ' | ') AS `actors`
FROM
    `movies`
        JOIN
    `locations` ON `movies`.`location_id` = `locations`.`id`
        JOIN
    `countries` ON `locations`.`country_id` = `countries`.`id`
        JOIN
    `cities` ON `locations`.`city_id` = `cities`.`id`
        JOIN
    `actor_movie` ON `movies`.`id` = `actor_movie`.`movie_id`
        JOIN
    `actors` ON `actor_movie`.`actor_id` = `actors`.`id`
        JOIN
    `directors` ON `movies`.`director_id` = `directors`.`id`
GROUP BY `movies`.`id`
ORDER BY `directors`.`firstname`;
 
# 06 -> List all information about the actors who have a lower than average
# 		grade given by the critics, and order them from highest to lowest.

# 06.01 -> LOWER THAN TOTAL RATING
SELECT 
    `actors`.`firstname`,
    `actors`.`lastname`,
    `actors`.`nickname`,
    `actors`.`dob`,
    `actors`.`gender`,
    `actors`.`agent_code`,
    (`devotion` + `naturalness` + `expression` + `acting`) AS `total_rating`
FROM
    `critic_actor_movie`
        JOIN
    `actors` ON `critic_actor_movie`.`actor_id` = `actors`.`id`
HAVING `total_rating` < (SELECT 
        AVG((`devotion` + `naturalness` + `expression` + `acting`))
    FROM
        `critic_actor_movie`)
ORDER BY `total_rating` DESC;

# 06.02 -> LOWER THAN AVERAGE GRADE
SELECT 
    `actors`.`firstname`,
    `actors`.`lastname`,
    `actors`.`nickname`,
    `actors`.`dob`,
    `actors`.`gender`,
    `actors`.`agent_code`
FROM
    `critic_actor_movie` AS `cam`
        JOIN
    `actors` ON `cam`.`actor_id` = `actors`.`id`
WHERE
    `cam`.`devotion` < (SELECT 
            AVG(`devotion`)
        FROM
            `critic_actor_movie`)
        AND `cam`.`naturalness` < (SELECT 
            AVG(`naturalness`)
        FROM
            `critic_actor_movie`)
        AND `cam`.`expression` < (SELECT 
            AVG(`expression`)
        FROM
            `critic_actor_movie`)
        AND `cam`.`acting` < (SELECT 
            AVG(`acting`)
        FROM
            `critic_actor_movie`);

# 07 -> List all oscar winners who are older than the average age of all actors.
SELECT 
    CONCAT(`actors`.`firstname`,
            ' ',
            `actors`.`lastname`,
            ' AKA ',
            `nickname`) AS `Oscar winners`,
    `oscars`.`year` AS `year_won`,
    `actors`.`dob`,
    TIMESTAMPDIFF(YEAR,
        `actors`.`dob`,
        CURDATE()) AS `actor_age`
FROM
    `oscars`
        JOIN
    `actors` ON `oscars`.`actor_id` = `actors`.`id`
HAVING `actor_age` > (SELECT 
        AVG(TIMESTAMPDIFF(YEAR, `dob`, CURDATE()))
    FROM
        `actors`)
ORDER BY `actor_age` DESC;