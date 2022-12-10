<?php
$cate = array(
    // ID, C_Name
    array(1, 'Food'),
    array(2, 'Health'),
    array(3, 'Business'),
    array(4, 'Education'),
    array(5, 'Technology'),
    array(6, 'Sport'),
    array(7, 'Town & Country'),
    array(8, 'Travel'),
    array(9, 'Work'),
    array(10, 'Art'),
);

// * Difficulties:
    // Beginner
    // Elementary
    // Intermediate
    // Upper Intermediate
    // Advanced
    // Proficient

$test = array(
    // ID, T_Name, Level
    array(1, 'Food - Spelling', 2),
    array(2, 'Food - Gap fill', 4),
    array(3, 'Health - Proficient', 6),
    array(4, 'Health - Intermediate', 3),
);

$test_cate = array(
    // C_ID, T_ID
    array(1, 1),
    array(1, 2),
    array(2, 3),
    array(2, 4),
);

$ques = array(
    // T_ID, Content, Answer, Options
    array(1, 
            'Thousands of buildings were flattened in the San Francisco ____ of 1906.', 'B',
            'earthquack', 'earthquake', 'earthquaik'),
    array(1,
            'The ____ damaged properties all along the coast.', 'A',
            'hurricane', 'hurriccane', 'huriccane'),
    array(1,
            'A ____ struck the southern coast with tremendous force.', 'B',
            'tornadoe', 'tornado', 'tornaddo'),
    array(1,
            'The ____ caused immense damage in the regions along the coast.', 'C',
            'taifun', 'typhone', 'typhoo'),
    array(1,
            'The ____ has been dormant for years, but last month it showed signs of new life.', 'A',
            'volcano', 'vulcano', 'volcanoe'),
    array(1,
            'Several ____ were heard during the night as the army occupied the city', 'C',
            'explossions', 'explosiones', 'explosions'),
    array(1,
            'The American ____ of 1861-1865 was fought between the south 
            and the north.', 'A',
            'civil war', 'sivil war', 'civvil war'),
    array(1,
            'There has been a major ____ on the motorway.', 'B',
            'acident', 'accident', 'acciddent'),
    array(1,
            '____ rain has brought serious problems', 'A',
            'Torrential', 'Torential', 'Torrantial'),
    array(1,
            'The storm caused widespread ____ along the coast', 'C',
            'devvastation', 'devustation', 'devastation'),
    // Test 2
    array(2,
            'The disease ____ rapidly, killing everybody in its path.', 'A',
            'spread', 'erupted', 'survivors', 'suffering'),
    array(2,
            'The fire ____ through the slums, destroying everything.',
            'C',
            'broke out', 'erupted', 'spread', 'shook'),
    array(2,
            'When the volcano ____ , people panicked and tried to escape.', 'D',
            'relief', 'refugees', 'disaster', 'erupted'),
    array(2,
            'The ground ____ violently when the earthquake began.', 'D',
            'casualties', 'suffering', 'relief', 'shook'),
    array(2,
            'Fierce fighting ____ between government soldiers and rebel forces.', 'A',
            'broke out', 'survivors', 'casualties', 'erupted'),
    array(2,
            'A funeral was held for the ____ of the fire', 'B',
            'refugees', 'casualties', 'spread', 'relief'),
    array(2,
            'An aid convoy was sent to help ____ of the hurricane.', 'A',
            'survivors', 'suffering', 'relief', 'refugees'),
    array(2,
            '____ from the conflict in Mantagua have been fleeing across the border.', 'C',
            'broke out', 'erupted', 'refugees', 'disaster'),
    // Test 3
    array(3,
            'Mrs Brady has suffered from terrible "rheumatism" for years.', 'D',
            'Illnesses which affect the circulation of blood are particularly common with people who are overweight',
            'This is deposited on the walls of the arteries and can block them',
            'They can easily be spread from one person to another',
            'Pains or stiffness in the joints or muscles can be very difficult to live with'),
    array(3,
            'More women than men are affected by "arthritis".', 'A',
            'The painful inflammation of a joint may require surgery',
            'This is deposited on the walls of the arteries and can block them',
            "Once the body\'s cells start growing abnormally, a cure can be difficult to find",
            'However, the government denies it has made cutbacks to the National Health Service'),
    array(3,
            'Air conditioning units are often responsible for spreading "infections" around an office.', 'C',
            'Anyone who has caught the virus is reminded that it cannot be treated with antibiotics, and they should stay inside until the symptoms have passed',
            "They don\'t get enough exercise",
            'They can easily be spread from one person to another.',
            'The pressures of a high-powered job can cause nervous strain, which may require drugs'),
    array(3,
            '"Cardiovascular disease" is becoming more common in Britain.', 'A',
            'Illnesses which affect the circulation of blood are particularly common with people who are overweight',
            'Pains or stiffness in the joints or muscles can be very difficult to live with',
            'The painful inflammation of a joint may require surgery',
            "Once the body\'s cells start growing abnormally, a cure can be difficult to find"),
    array(3,
            'Too much exposure to the sun can cause skin "cancer".', 'B',
            'However there are drugs which can slow down its cell-destroying properties',
            "Once the body\'s cells start growing abnormally, a cure can be difficult to find",
            'This is because their immune system is not properly developed',
            'They can easily be spread from one person to another'),
    // Test 4
    array(4,
            'able to cure or relieve the disorder', 'C',
            'traditional medicines', 'holistic medicine', 'therapeutic', 'operation'),
    array(4,
            'food to eat', 'A',
            'a diet', 'debilitating', 'protein', 'vitamins'),
    array(4,
            'modern pills and tablets', 'B',
            'holistic medicine', 'conventional medicine', 'traditional medicines', 'vitamins'),
    array(4,
            'old-fashioned cures for illnesses', 'B',
            'holistic medicine', 'traditional medicines', 'conventional medicine', 'vitamins'),
    array(4,
            'treatments which involve the whole person, including their mental health, rather than just dealing with the symptoms of the illness', 'A',
            'holistic medicine', 'traditional medicines', 'conventional medicine', 'vitamins'),
    array(4,
            'medical specialist attached to a hospital', 'D',
            'operation', 'debilitating', 'diagnose', 'consultant'),
    array(4, 
            'doctor specializing in surgery', 'C',
            'operation', 'diagnose', 'surgeon', 'therapeutic'),
    array(4,
            'a compound which is an essential part of living cells, and which is essential to keep the human body working properly.', 'A',
            'protein', 'vitamins', 'welfare state', 'a diet'),
    array(4,
            'essential substances which are not synthesized by the body but are found in food and are needed for growth and health', 'A',
            'vitamins', 'a diet', 'protein', 'minerals'),
    array(4,
            'substances found in food', 'D',
            'protein', 'vitamins', 'a diet', 'minerals'),
    array(4,
            'energetic', 'C',
            'welfare state', 'debilitating', 'active', 'consultant'),
    array(4,
            'large amount of money which is spent to make sure they have adequate health services', 'B',
            'debilitating', 'welfare state', 'consultant', 'active'),
);

// * Add history sample
$his = array(
    // U_ID, T_ID, Score, Date
    array(2, 1, 9.75, '2022-11-04 03:04:05'),
    array(2, 2, 8.5,  '2022-10-24 22:22:22'),
    array(2, 3, 7.25, '2022-12-11 00:37:45'),
    array(2, 4, 7,    '2022-10-03 13:00:00'),
)

?>