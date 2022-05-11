INSERT INTO users (
    name,
    mail,
    password
) VALUES (
    'yamada',
    'test@test.jp',
    'test'
);

-- travels Table
CREATE TABLE travels (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    destination_id INT NOT NULL,
    title VARCHAR(255),
    sub_title VARCHAR(255),
    release_flg INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;

INSERT INTO travels (
    destination_id,
    title,
    sub_title
) VALUES (
    '1',
    '函館旅行!!',
    ''
);

-- travel note Table
CREATE TABLE travel_note (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    travel_id INT NOT NULL,
    title VARCHAR(255),
    body VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;

INSERT INTO travel_note (
    travel_id,
    title,
    body
) VALUES (
    '2',
    '持ち物',
    '携帯、財布'
);

-- travel_brochures Table
CREATE TABLE travel_brochures (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    travel_id INT NOT NULL,
    date DATE,
    traffic_method VARCHAR(10),
    time TIME,
    title VARCHAR(255),
    body VARCHAR(3000),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;

INSERT INTO travel_brochures (
    travel_id,
    date,
    traffic_method,
    time,
    title,
    body
) VALUES (
    '3',
    '2022-09-20',
    'バス',
    '8:05',
    '湯の川温泉着',
    '料金1000円'
);

-- users_travels Table
CREATE TABLE users_travels (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT UNIQUE KEY NOT NULL,
    travel_id INT UNIQUE KEY NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;

INSERT INTO users_travels (
    user_id,
    travel_id
) VALUES (
    '2',
    '1'
);

-- goods Table
CREATE TABLE goods (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT UNIQUE KEY NOT NULL,
    travel_id INT UNIQUE KEY NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;

INSERT INTO goods (
    user_id,
    travel_id
) VALUES (
    '2',
    '1'
);

-- 旅行先一覧テーブル
CREATE TABLE travel_destinations (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    country INT DEFAULT 0 NOT NULL,
    location_name VARCHAR(100) NOT NULL UNIQUE KEY,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;



UPDATE travel_brochures SET prefecture= '' WHERE id = 3;

-- POST数
SELECT des.location_name, c.post
FROM travel_destinations des
LEFT JOIN
(
    SELECT destination_id, COUNT(destination_id) as post
    FROM travels
    GROUP BY destination_id
)c ON c.destination_id = des.id
ORDER BY des.id;

-- 県名
SELECT *
FROM travels t
JOIN travel_destinations des ON t.destination_id = des.id;

-- 自分が投稿した旅のしおり
SELECT *
FROM travels
WHERE user_id = 1;

-- 削除
delete u, t, b, n from users u
LEFT JOIN travels t ON u.id = t.user_id
LEFT JOIN travel_brochures b ON b.travel_id = t.id
LEFT JOIN travel_note n ON n.travel_id = t.id
WHERE u.id = 2;

SELECT t.title, t.sub_title, t.message, n.title, n.body, b.date, b.traffic_method, b.time, b.title, b.body FROM travels t
JOIN travel_note n ON t.id = n.travel_id
JOIN travel_brochures b ON t.id = b.travel_id
WHERE t.id = 2;

select * from travels t
LEFT JOIN travel_note as n on n.travel_id = t.id
LEFT JOIN travel_brochures as b on b.travel_id = t.id
where t.id = 45;

DB::table('travels as t')
                ->leftJoin('travel_note as n', 'n.travel_id', '=', 't.id')
                ->leftJoin('travel_brochures as b', 'b.travel_id', '=', 't.id')
                ->where('t.id', '=', $travel_id)
                ->delete();
