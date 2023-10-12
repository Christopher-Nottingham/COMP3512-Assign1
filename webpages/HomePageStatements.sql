-- Top Generes
SELECT 

-- Top Artist

SELECT COUNT (songs.artist_id), title, songs.artist_id, artist_name
FROM songs INNER JOIN artists on songs.artist_id = artists.artist_id
GROUP BY title
ORDER BY COUNT (songs.artist_id) DESC;

-- Most popular songs 

--ONE hit wonders


-- Longest Acoustic Song
SELECT title FROM songs
WHERE acousticness > 40
ORDER BY duration; 



-- At the club
SELECT title FROM songs
WHERE danceability > 85
ORDER BY ABS(danceability*1.6+energy*1.4) DESC;

-- Running
SELECT title FROM songs 
WHERE bpm BETWEEN 120 AND 125
ORDER BY ABS(energy  * 1.3 + valence * 1.6) DESC;


-- Studyung
SELECT title from songs
WHERE bpm BETWEEN 100 AND 115 AND speechiness BETWEEN 1 AND 20
ORDER BY ABS((acousticness * 0.8) + (100-speechiness) + (100-valence)) DESC ;