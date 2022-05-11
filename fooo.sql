INSERT INTO travel_destinations (location_name) VALUE
    ('北海道'),
    ('青森'),
    ('岩手'),
    ('宮城'),
    ('秋田'),
    ('山形'),
    ('福島'),
    ('茨城'),
    ('栃木'),
    ('群馬'),
    ('埼玉'),
    ('千葉'),
    ('東京'),
    ('神奈川'),
    ('新潟'),
    ('富山'),
    ('石川'),
    ('福井'),
    ('山梨'),
    ('長野'),
    ('岐阜'),
    ('静岡'),
    ('愛知'),
    ('三重'),
    ('滋賀'),
    ('京都'),
    ('大阪'),
    ('兵庫'),
    ('奈良'),
    ('和歌山'),
    ('鳥取'),
    ('島根'),
    ('岡山'),
    ('広島'),
    ('山口'),
    ('徳島'),
    ('香川'),
    ('愛媛'),
    ('高知'),
    ('福岡'),
    ('佐賀'),
    ('長崎'),
    ('熊本'),
    ('大分'),
    ('宮崎'),
    ('鹿児島'),
    ('沖縄')


INSERT INTO travel_brochures (
    travel_id,
    destination_id,
    date,
    traffic_method,
    time,
    title,
    body
) VALUES (
    '1',
    '1',
    '2022-04-11',
    '飛行機',
    '15:00',
    '成田空港発',
    'おすすめお弁当 ・崎陽軒シュウマイ弁当'
);

INSERT INTO travel_brochures (
    travel_id,
    destination_id,
    date,
    traffic_method,
    time,
    title,
    body
) VALUES (
    '1',
    '1',
    '2022-04-11',
    '',
    '17:30',
    '札幌空港発',
    '3番出口 札幌方面行バス 37番'
);

INSERT INTO travel_brochures (
    travel_id,
    destination_id,
    date,
    traffic_method,
    time,
    title,
    body
) VALUES (
    '2',
    '27',
    '2022-04-11',
    '',
    '8:30',
    '東京駅発',
    '金額1万5000円 所要時間2時間'
);

INSERT INTO travel_note (
    travel_id,
    title,
    body
) VALUES (
    '4',
    '持ち物一覧',
    'スマホ、地図、薬'
);
